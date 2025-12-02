<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\helpers\Html;
use lindemannrock\codehighlighter\assetbundles\FieldAsset;
use lindemannrock\codehighlighter\assetbundles\LanguageAsset;
use lindemannrock\codehighlighter\CodeHighlighter;
use lindemannrock\codehighlighter\models\CodeValue;
use yii\db\Schema;

/**
 * Code Highlighter Field Type
 *
 * Stores code as plain text, provides highlighting via Twig filter
 *
 * @author    LindemannRock
 * @package   CodeHighlighter
 * @since     1.0.0
 */
class CodeHighlighterField extends Field
{
    /**
     * @var string Language (empty = use default from settings)
     */
    public string $language = '';

    /**
     * @var array Available languages (empty = use plugin settings)
     */
    public array $availableLanguages = [];

    /**
     * @var bool Show language switcher in editor
     */
    public bool $showLanguageDropdown = false;

    /**
     * @var bool Enable line numbers
     */
    public bool $lineNumbers = true;

    /**
     * @var bool Enable word wrapping for long lines
     */
    public bool $wordWrap = false;

    /**
     * @var int Number of rows (each row = 21px)
     */
    public int $editorRows = 10;

    /**
     * @var int Tab width in spaces
     */
    public int $tabWidth = 4;

    /**
     * @var int Font size in pixels (0 = use default from settings)
     */
    public int $fontSize = 0;

    /**
     * @var string Default code to populate field
     */
    public string $defaultValue = '';

    /**
     * Backward compatibility setter
     */
    public function __set($name, $value)
    {
        // Backward compatibility: editorHeight -> editorRows
        if ($name === 'editorHeight') {
            // Convert old pixel height to rows (21px per row)
            $this->editorRows = max(1, (int)round($value / 21));
            return;
        }

        // Backward compatibility: theme (no longer used, ignore)
        if ($name === 'theme') {
            // Theme is now controlled at page-level via craft.codeHighlighter.setTheme()
            // Ignore old theme setting from database
            return;
        }

        // Backward compatibility: enableLineNumbers (removed from settings)
        if ($name === 'enableLineNumbers') {
            // Removed from plugin settings, ignore
            return;
        }

        parent::__set($name, $value);
    }

    // Static Methods
    public static function displayName(): string
    {
        return Craft::t('code-highlighter', 'Code Highlighter');
    }

    public static function icon(): string
    {
        return '@appicons/code.svg';
    }

    public static function dbType(): string
    {
        return Schema::TYPE_TEXT;
    }

    // Public Methods
    protected function defineRules(): array
    {
        $rules = parent::defineRules();

        $rules[] = ['language', 'string'];
        $rules[] = ['language', 'default', 'value' => ''];
        $rules[] = ['availableLanguages', 'safe'];
        $rules[] = ['availableLanguages', 'ensureDefaultLanguageIncluded'];
        $rules[] = ['showLanguageDropdown', 'boolean'];
        $rules[] = ['showLanguageDropdown', 'default', 'value' => false];
        $rules[] = ['lineNumbers', 'boolean'];
        $rules[] = ['lineNumbers', 'default', 'value' => true];
        $rules[] = ['wordWrap', 'boolean'];
        $rules[] = ['wordWrap', 'default', 'value' => false];
        $rules[] = ['editorRows', 'integer', 'min' => 1, 'max' => 50];
        $rules[] = ['editorRows', 'default', 'value' => 10];
        $rules[] = ['tabWidth', 'integer', 'min' => 1, 'max' => 8];
        $rules[] = ['tabWidth', 'default', 'value' => 4];
        $rules[] = ['fontSize', 'integer', 'min' => 0, 'max' => 32];
        $rules[] = ['fontSize', 'default', 'value' => 0];
        $rules[] = ['defaultValue', 'string'];

        return $rules;
    }

    public function getSettingsHtml(): ?string
    {
        $settings = CodeHighlighter::$plugin->getSettings();

        // Set defaults from plugin settings (only for new fields)
        if (!$this->id) {
            // Line numbers default to true (no plugin setting for this)
            // fontSize defaults to 0 (use plugin default)
            // availableLanguages defaults to empty (use plugin default dynamically)
        }

        return Craft::$app->getView()->renderTemplate('code-highlighter/fields/_settings', [
            'field' => $this,
            'languages' => $settings->getAllPrismLanguages(),
            'settings' => $settings,
        ]);
    }

    /**
     * Get editor height in pixels (rows * 21px)
     */
    public function getEditorHeight(): int
    {
        return $this->editorRows * 21;
    }

    /**
     * Get the effective language (field setting or plugin default)
     */
    public function getEffectiveLanguage(): string
    {
        if (!empty($this->language)) {
            return $this->language;
        }

        $settings = CodeHighlighter::$plugin->getSettings();
        return $settings->defaultLanguage;
    }

    /**
     * Get available languages for this field (field override or plugin setting)
     */
    public function getAvailableLanguagesForField(): array
    {
        $settings = CodeHighlighter::$plugin->getSettings();
        $allLanguages = $settings->getAllPrismLanguages();

        // If field has specific available languages, use those
        if (!empty($this->availableLanguages)) {
            $filtered = [];
            foreach ($this->availableLanguages as $key) {
                if (isset($allLanguages[$key])) {
                    $filtered[$key] = $allLanguages[$key];
                }
            }
            return $filtered;
        }

        // Otherwise use plugin's filtered list
        return $settings->getFilteredLanguages();
    }

    /**
     * Before validation - normalize data
     */
    public function beforeValidate(): bool
    {
        if (!parent::beforeValidate()) {
            return false;
        }

        $settings = CodeHighlighter::$plugin->getSettings();

        // Handle Craft's "Select All" value for availableLanguages
        if (is_array($this->availableLanguages) && in_array('*', $this->availableLanguages)) {
            // Replace '*' with all available languages from plugin settings
            $this->availableLanguages = array_keys($settings->getFilteredLanguages());
        }

        return true;
    }

    /**
     * Ensure field's default language is always in availableLanguages
     */
    public function ensureDefaultLanguageIncluded($attribute, $params): void
    {
        $defaultLang = $this->getEffectiveLanguage();

        // Ensure availableLanguages is an array
        if (!is_array($this->availableLanguages)) {
            $this->availableLanguages = [];
        }

        // Add default language if not present
        if ($defaultLang && !in_array($defaultLang, $this->availableLanguages)) {
            $this->availableLanguages[] = $defaultLang;
        }

        // Remove duplicates
        $this->availableLanguages = array_unique($this->availableLanguages);
    }

    /**
     * Get the effective font size (field setting or plugin default)
     */
    public function getEffectiveFontSize(): int
    {
        if ($this->fontSize > 0) {
            return $this->fontSize;
        }

        $settings = CodeHighlighter::$plugin->getSettings();
        return $settings->defaultFontSize;
    }

    protected function inputHtml(mixed $value, ?ElementInterface $element, bool $inline): string
    {
        // Register Prism core assets for CP
        $view = Craft::$app->getView();
        $view->registerAssetBundle(FieldAsset::class);

        // Register language asset bundle
        $assetManager = Craft::$app->getAssetManager();
        $languageBundle = $view->registerAssetBundle(LanguageAsset::class);

        // Get effective language (field setting or plugin default)
        $effectiveLanguage = $this->getEffectiveLanguage();

        // Get language dependencies in correct order
        $dependencies = $this->getLanguageDependencies($effectiveLanguage);

        // Merge dependencies with the language itself
        $languagesToLoad = array_merge($dependencies, [$effectiveLanguage]);

        // Filter out base languages (already loaded by LanguageAsset init)
        $languagesToLoad = array_diff($languagesToLoad, LanguageAsset::BASE_LANGUAGES);

        // Add remaining languages
        foreach ($languagesToLoad as $lang) {
            $filename = "prism-{$lang}.min.js";
            if (!in_array($filename, $languageBundle->js)) {
                $languageBundle->js[] = $filename;
            }
        }

        // Initialize and publish the language bundle
        $languageBundle->init();
        $languageBundle->publish($assetManager);

        // CRITICAL: Get raw string, NOT CodeValue object
        // CodeValue is for front-end output only, not CP editing
        if ($value instanceof CodeValue) {
            $value = $value->code; // Direct property access, not method
        }

        // Ensure it's a plain string
        $value = (string) ($value ?? '');

        // Use default value if field is empty and default value is set
        if (empty($value) && !empty($this->defaultValue)) {
            $value = $this->defaultValue;
        }

        $id = Html::id($this->handle);
        $namespacedId = $view->namespaceInputId($id);

        return $view->renderTemplate('code-highlighter/fields/_input', [
            'id' => $id,
            'namespacedId' => $namespacedId,
            'name' => $this->handle,
            'value' => $value,
            'field' => $this,
        ]);
    }

    /**
     * Get dependencies for a language (recursively)
     */
    private function getLanguageDependencies(string $language): array
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
    private function resolveDependencies(string $language, array $componentsData, array &$resolved): void
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

    public function normalizeValue(mixed $value, ?ElementInterface $element = null): mixed
    {
        if ($value === null || $value === '') {
            return null;
        }

        // If already a CodeValue object, return it
        if ($value instanceof CodeValue) {
            return $value;
        }

        // Try to decode as JSON (new format)
        if (is_string($value) && str_starts_with($value, '{')) {
            $decoded = json_decode($value, true);
            if (is_array($decoded)) {
                $code = $decoded['code'] ?? '';
                $language = $decoded['language'] ?? $this->getEffectiveLanguage();

                return new CodeValue(
                    (string) $code,
                    $language,
                    $this->lineNumbers,
                    $this->wordWrap
                );
            }
        }

        // Handle new format submitted from form: array with 'code' and 'language'
        if (is_array($value)) {
            $code = $value['code'] ?? '';
            $language = $value['language'] ?? $this->getEffectiveLanguage();

            return new CodeValue(
                (string) $code,
                $language,
                $this->lineNumbers,
                $this->wordWrap
            );
        }

        // Handle old format: just a string (backward compatibility)
        return new CodeValue(
            (string) $value,
            $this->getEffectiveLanguage(),
            $this->lineNumbers,
            $this->wordWrap
        );
    }

    public function serializeValue(mixed $value, ?ElementInterface $element = null): mixed
    {
        // Convert CodeValue to JSON with code + language
        if ($value instanceof CodeValue) {
            return json_encode([
                'code' => $value->getRaw(),
                'language' => $value->getLanguage(),
            ]);
        }

        return $value;
    }

    protected function searchKeywords(mixed $value, ElementInterface $element): string
    {
        if ($value instanceof CodeValue) {
            return $value->getRaw();
        }

        return (string) $value;
    }
}
