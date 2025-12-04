<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\services;

use Craft;
use craft\base\Component;
use lindemannrock\codehighlighter\assetbundles\FrontendAsset;
use lindemannrock\codehighlighter\assetbundles\FrontendLanguageAsset;
use lindemannrock\codehighlighter\CodeHighlighter;
use lindemannrock\codehighlighter\variables\CodeHighlighterVariable;

/**
 * Asset Service
 *
 * Handles smart loading of Prism.js assets
 *
 * @since 5.0.0
 */
class AssetService extends Component
{
    private bool $coreRegistered = false;
    private array $loadedLanguages = [];
    private array $loadedThemes = [];

    /**
     * Register Prism assets for a language on frontend
     *
     * @param string $language Language to load
     * @param array $options Options (theme override, etc.)
     */
    public function register(string $language, array $options = []): void
    {
        $view = Craft::$app->getView();
        $settings = CodeHighlighter::$plugin->getSettings();

        // Register core once (without theme)
        if (!$this->coreRegistered) {
            $this->registerCore();
            $this->coreRegistered = true;
        }

        // Register theme (can be called multiple times for different themes)
        $this->registerTheme($options);

        // Register language if not already loaded
        if (!in_array($language, $this->loadedLanguages)) {
            $this->registerLanguage($language);
            $this->loadedLanguages[] = $language;
        }
    }

    /**
     * Register Prism core (JS only, no theme)
     */
    protected function registerCore(): void
    {
        $view = Craft::$app->getView();
        $settings = CodeHighlighter::$plugin->getSettings();

        // Register core asset bundle once (JS only)
        $view->registerAssetBundle(FrontendAsset::class);

        // Inject CSS variables if copy button is enabled AND custom styles configured
        if ($settings->enableCopyButton && !empty($settings->copyButtonStyles)) {
            $cssVars = [];
            foreach ($settings->copyButtonStyles as $var => $value) {
                $cssVars[] = "{$var}: {$value}";
            }
            $cssVarsString = implode('; ', $cssVars);

            $view->registerCss(":root { {$cssVarsString}; }");
        }
    }

    /**
     * Register theme CSS for the page
     */
    protected function registerTheme(array $options): void
    {
        $view = Craft::$app->getView();
        $bundle = Craft::$app->getView()->getAssetManager()->getBundle(FrontendAsset::class);

        // Get page theme from Variable (set via craft.codeHighlighter.setTheme())
        $variable = new CodeHighlighterVariable();
        $theme = $variable->getTheme();

        // Only register once per page (all code blocks use same theme)
        if (empty($this->loadedThemes)) {
            // Determine theme file extension
            $coreThemes = ['default', 'dark', 'funky', 'okaidia', 'twilight', 'coy', 'solarizedlight', 'tomorrow'];
            $themeExtension = in_array($theme, $coreThemes) ? '.min.css' : '.css';

            // Register theme CSS
            $view->registerCssFile(
                $bundle->baseUrl . "/css/themes/prism-{$theme}{$themeExtension}",
                ['depends' => FrontendAsset::class]
            );

            $this->loadedThemes[] = $theme;
        }
    }

    /**
     * Register specific language with dependencies for frontend
     */
    protected function registerLanguage(string $language): void
    {
        $view = Craft::$app->getView();
        $assetManager = Craft::$app->getAssetManager();

        // Register language bundle
        $languageBundle = $view->registerAssetBundle(FrontendLanguageAsset::class);

        // Get dependencies
        $dependencies = $this->getLanguageDependencies($language);

        // Merge dependencies with the language itself
        $languagesToLoad = array_merge($dependencies, [$language]);

        // Filter out base languages (already loaded by FrontendLanguageAsset init)
        $languagesToLoad = array_diff($languagesToLoad, FrontendLanguageAsset::BASE_LANGUAGES);

        // Add remaining languages
        foreach ($languagesToLoad as $lang) {
            $filename = "prism-{$lang}.min.js";
            if (!in_array($filename, $languageBundle->js)) {
                $languageBundle->js[] = $filename;
            }
        }

        // Initialize and publish
        $languageBundle->init();
        $languageBundle->publish($assetManager);
    }

    /**
     * Get dependencies for a language (recursively)
     */
    protected function getLanguageDependencies(string $language): array
    {
        static $componentsData = null;

        // Load components.json once
        if ($componentsData === null) {
            $componentsPath = Craft::getAlias('@lindemannrock/codehighlighter/resources/js/components.json');
            if (file_exists($componentsPath)) {
                $componentsData = json_decode(file_get_contents($componentsPath), true);
            } else {
                $componentsData = [];
            }
        }

        $dependencies = [];
        $this->resolveDependencies($language, $componentsData, $dependencies);

        return $dependencies;
    }

    /**
     * Recursively resolve dependencies in correct load order
     */
    protected function resolveDependencies(string $language, array $componentsData, array &$resolved): void
    {
        // Get language definition
        $languageDef = $componentsData['languages'][$language] ?? null;

        if ($languageDef && isset($languageDef['require'])) {
            $requirements = is_array($languageDef['require'])
                ? $languageDef['require']
                : [$languageDef['require']];

            // First resolve dependencies of requirements
            foreach ($requirements as $requirement) {
                $this->resolveDependencies($requirement, $componentsData, $resolved);
            }

            // Then add requirements if not already added
            foreach ($requirements as $requirement) {
                if (!in_array($requirement, $resolved, true)) {
                    $resolved[] = $requirement;
                }
            }
        }
    }
}
