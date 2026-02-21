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
use lindemannrock\codehighlighter\CodeHighlighter;
use lindemannrock\codehighlighter\variables\CodeHighlighterVariable;
use lindemannrock\codehighlighter\web\assets\frontend\FrontendAsset;
use lindemannrock\codehighlighter\web\assets\frontend\FrontendLanguageAsset;
use lindemannrock\codehighlighter\web\assets\prism\PrismAsset;

/**
 * Asset Service
 *
 * Handles smart loading of Prism.js assets
 *
 * @since 5.0.0
 */
class AssetService extends Component
{
    private const ALLOWED_CSS_VARS = [
        '--copy-btn-bg',
        '--copy-btn-color',
        '--copy-btn-hover-bg',
        '--copy-btn-success-bg',
        '--copy-btn-border-color',
        '--copy-btn-padding-inline',
        '--copy-btn-padding-block',
        '--copy-btn-border-radius',
        '--copy-btn-min-width',
        '--copy-btn-font-size',
        '--copy-btn-font-family',
        '--copy-btn-focus-color',
        '--copy-btn-focus-offset',
        '--toolbar-top',
        '--toolbar-right',
        '--toolbar-opacity',
    ];

    private bool $coreRegistered = false;
    private array $loadedLanguages = [];
    private array $loadedThemes = [];
    private array $loadedPlugins = [];

    /**
     * Register Prism assets for a language on frontend
     *
     * @param string $language Language to load
     * @param array $options Options (theme override, etc.)
     */
    public function register(string $language, array $options = []): void
    {
        // Register core once (without theme)
        if (!$this->coreRegistered) {
            $this->registerCore();
            $this->coreRegistered = true;
        }

        // Register theme (can be called multiple times for different themes)
        $this->registerTheme($options);

        // Register Prism plugins requested by per-call options
        $this->registerRequestedPlugins($options);

        // Register language if not already loaded
        // (inline-color JS is appended to the language bundle inside registerLanguage)
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
            $this->registerCopyButtonCssVars($settings->copyButtonStyles);
        }
    }

    /**
     * Register Prism plugins on demand when per-call options request features
     * that aren't enabled in global settings.
     *
     * This ensures consuming plugins (e.g. docs-manager) can pass options like
     * showCopy: true or matchBraces: true and the required assets are loaded,
     * even if the global code-highlighter settings have them disabled.
     *
     * @param array $options Per-call options from highlight()
     * @since 5.4.0
     */
    protected function registerRequestedPlugins(array $options): void
    {
        $view = Craft::$app->getView();
        $settings = CodeHighlighter::$plugin->getSettings();
        $prismBundle = Craft::$app->getView()->getAssetManager()->getBundle(PrismAsset::class);

        // Copy button: needs toolbar plugin + copy-button.js
        if (!empty($options['showCopy']) && !$settings->enableCopyButton && !in_array('toolbar', $this->loadedPlugins)) {
            $min = Craft::$app->config->general->devMode ? '' : '.min';

            $view->registerCssFile($prismBundle->baseUrl . '/css/prism-toolbar.css');
            $view->registerJsFile($prismBundle->baseUrl . '/js/prism-toolbar.min.js');

            // Register copy-button.js from FrontendAsset bundle
            $frontendBundle = Craft::$app->getView()->getAssetManager()->getBundle(FrontendAsset::class);
            $view->registerJsFile($frontendBundle->baseUrl . "/js/copy-button{$min}.js");

            // Inject CSS variables if custom styles configured
            if (!empty($settings->copyButtonStyles)) {
                $this->registerCopyButtonCssVars($settings->copyButtonStyles);
            }

            $this->loadedPlugins[] = 'toolbar';
        }

        // Match braces
        if (!empty($options['matchBraces']) && !$settings->enableMatchBraces && !in_array('match-braces', $this->loadedPlugins)) {
            $view->registerCssFile($prismBundle->baseUrl . '/css/prism-match-braces.min.css');
            $view->registerJsFile($prismBundle->baseUrl . '/js/prism-match-braces.min.js');
            $this->loadedPlugins[] = 'match-braces';
        }

        // Inline color CSS (JS loaded after language bundles by registerInlineColorJs)
        if (!empty($options['inlineColor']) && !$settings->enableInlineColor && !in_array('inline-color', $this->loadedPlugins)) {
            $view->registerCssFile($prismBundle->baseUrl . '/css/prism-inline-color.min.css');
            $this->loadedPlugins[] = 'inline-color';
        }
    }

    /**
     * Register theme CSS for the page
     */
    protected function registerTheme(array $options): void
    {
        $view = Craft::$app->getView();
        $prismBundle = Craft::$app->getView()->getAssetManager()->getBundle(PrismAsset::class);

        // Get page theme from Variable (set via craft.codeHighlighter.setTheme())
        $variable = new CodeHighlighterVariable();
        $theme = $variable->getTheme();

        // Only register once per page (all code blocks use same theme)
        if (empty($this->loadedThemes)) {
            // Determine theme file extension
            $coreThemes = ['default', 'dark', 'funky', 'okaidia', 'twilight', 'coy', 'solarizedlight', 'tomorrow'];
            $themeExtension = in_array($theme, $coreThemes) ? '.min.css' : '.css';

            // Register theme CSS from PrismAsset (themes live in the shared prism bundle)
            // Note: No 'depends' option — it silently fails on frontend views
            $view->registerCssFile(
                $prismBundle->baseUrl . "/css/themes/prism-{$theme}{$themeExtension}"
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
        /** @var FrontendLanguageAsset $languageBundle */
        $languageBundle = $view->registerAssetBundle(FrontendLanguageAsset::class);

        // Get dependencies via PrismService (single source of truth)
        $dependencies = CodeHighlighter::$plugin->prism->getLanguageDependencies($language);

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

        // Append inline-color plugin JS AFTER all language files.
        // css-extras extends Prism.languages.css, so it must load after the CSS
        // language component. Adding to the bundle (not registerJsFile) ensures
        // correct ordering since bundle files render together in array order.
        $this->appendInlineColorToBundle($languageBundle);

        // Initialize and publish
        $languageBundle->init();
        $languageBundle->publish($assetManager);
    }

    /**
     * Ensure inline-color JS files are at the END of the language bundle.
     *
     * css-extras extends Prism.languages.css, so it must load after ALL
     * language components. This method removes any existing entries and
     * re-appends them, ensuring they're always last even when new languages
     * are added by subsequent registerLanguage() calls.
     *
     * Both files live in the components/ directory (same sourcePath as
     * FrontendLanguageAsset), so they're published alongside language files.
     */
    private function appendInlineColorToBundle(FrontendLanguageAsset $bundle): void
    {
        $settings = CodeHighlighter::$plugin->getSettings();

        // Check global setting OR per-call override (already flagged in loadedPlugins)
        if (!$settings->enableInlineColor && !in_array('inline-color', $this->loadedPlugins)) {
            return;
        }

        // css-extras extends Prism.languages.css — only load when CSS language is present.
        // Without CSS loaded, css-extras crashes trying to access undefined properties.
        $hasCss = in_array('prism-css.min.js', $bundle->js) || in_array('css', $this->loadedLanguages);
        if (!$hasCss) {
            return;
        }

        // Remove if already present (position may be wrong after new languages added)
        $bundle->js = array_values(array_filter(
            $bundle->js,
            static fn(string $f): bool => $f !== 'prism-css-extras.min.js' && $f !== 'prism-inline-color.min.js',
        ));

        // Append at end — always after all language files
        $bundle->js[] = 'prism-css-extras.min.js';
        $bundle->js[] = 'prism-inline-color.min.js';
    }

    /**
     * Register sanitized copy button CSS variables
     *
     * Validates variable names against an allowlist to prevent CSS injection.
     *
     * @param array<string, string> $styles CSS variable name => value pairs
     */
    private function registerCopyButtonCssVars(array $styles): void
    {
        // Skip inline variable injection when using the CSS Variables theme —
        // all styling is managed via the CSS cascade (e.g. docs theme vars)
        $variable = new CodeHighlighterVariable();
        if ($variable->getTheme() === 'css-variables') {
            return;
        }

        $cssVars = [];

        foreach ($styles as $var => $value) {
            if (in_array($var, self::ALLOWED_CSS_VARS, true)) {
                // Strip characters that could enable CSS injection in values
                $safeValue = preg_replace('/[{}();\\\\]/', '', (string) $value);
                $cssVars[] = "{$var}: {$safeValue}";
            }
        }

        if (!empty($cssVars)) {
            Craft::$app->getView()->registerCss(':root { ' . implode('; ', $cssVars) . '; }');
        }
    }
}
