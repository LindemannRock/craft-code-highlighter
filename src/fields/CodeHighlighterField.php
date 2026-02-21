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
use lindemannrock\codehighlighter\CodeHighlighter;
use lindemannrock\codehighlighter\models\CodeValue;
use lindemannrock\codehighlighter\web\assets\field\FieldAsset;
use lindemannrock\codehighlighter\web\assets\field\LanguageAsset;
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
     * @var bool|null Show line numbers on frontend (null = use plugin setting)
     */
    public ?bool $lineNumbers = null;

    /**
     * @var bool Enable word wrapping for long lines
     */
    public bool $wordWrap = false;

    /**
     * @var bool|null Show copy button on frontend (null = use plugin setting)
     * @since 5.4.0
     */
    public ?bool $showCopyButton = null;

    /**
     * @var bool|null Highlight matching braces on frontend (null = use plugin setting)
     * @since 5.4.0
     */
    public ?bool $matchBraces = null;

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
        $rules[] = ['lineNumbers', 'default', 'value' => null];
        $rules[] = ['wordWrap', 'boolean'];
        $rules[] = ['wordWrap', 'default', 'value' => false];
        $rules[] = ['showCopyButton', 'boolean'];
        $rules[] = ['showCopyButton', 'default', 'value' => null];
        $rules[] = ['matchBraces', 'boolean'];
        $rules[] = ['matchBraces', 'default', 'value' => null];
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
     * Get the effective line numbers setting (field setting or plugin default)
     *
     * @since 5.4.0
     */
    public function getEffectiveLineNumbers(): bool
    {
        if ($this->lineNumbers !== null) {
            return $this->lineNumbers;
        }

        $settings = CodeHighlighter::$plugin->getSettings();
        return $settings->enableLineNumbers;
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

        // Normalize tri-state selects ('' → null, '1' → true, '0' → false)
        $this->lineNumbers = $this->normalizeTriState($this->lineNumbers);
        $this->showCopyButton = $this->normalizeTriState($this->showCopyButton);
        $this->matchBraces = $this->normalizeTriState($this->matchBraces);

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
        // Extract saved language and raw code from CodeValue
        $savedLanguage = null;
        if ($value instanceof CodeValue) {
            $savedLanguage = $value->language;
            $value = $value->code;
        }

        // Ensure it's a plain string
        $value = (string) ($value ?? '');

        // Use default value if field is empty and default value is set
        if (empty($value) && !empty($this->defaultValue)) {
            $value = $this->defaultValue;
        }

        // Active language: saved value takes priority, then field/plugin default
        $effectiveLanguage = $this->getEffectiveLanguage();
        $activeLanguage = $savedLanguage ?: $effectiveLanguage;

        // Register Prism core assets for CP
        $view = Craft::$app->getView();
        $view->registerAssetBundle(FieldAsset::class);

        // Register language asset bundle
        $assetManager = Craft::$app->getAssetManager();
        $languageBundle = $view->registerAssetBundle(LanguageAsset::class);

        // Load Prism component for the active language (+ dependencies)
        $dependencies = CodeHighlighter::$plugin->prism->getLanguageDependencies($activeLanguage);
        $languagesToLoad = array_merge($dependencies, [$activeLanguage]);

        // Filter out base languages (already loaded by LanguageAsset init)
        $languagesToLoad = array_diff($languagesToLoad, LanguageAsset::BASE_LANGUAGES);

        // Add language files to bundle
        foreach ($languagesToLoad as $lang) {
            $filename = "prism-{$lang}.min.js";
            if (!in_array($filename, $languageBundle->js)) {
                $languageBundle->js[] = $filename;
            }
        }

        // Initialize and publish the language bundle
        $languageBundle->init();
        $languageBundle->publish($assetManager);

        $id = Html::id($this->handle);
        $namespacedId = $view->namespaceInputId($id);

        return $view->renderTemplate('code-highlighter/fields/_input', [
            'id' => $id,
            'namespacedId' => $namespacedId,
            'name' => $this->handle,
            'value' => $value,
            'field' => $this,
            'activeLanguage' => $activeLanguage,
        ]);
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

        // Try to decode as JSON (new format: {"code":"...","language":"..."})
        if (is_string($value) && str_starts_with($value, '{')) {
            $decoded = json_decode($value, true);
            if (is_array($decoded) && array_key_exists('code', $decoded)) {
                $code = $decoded['code'] ?? '';
                $language = $decoded['language'] ?? $this->getEffectiveLanguage();

                return new CodeValue(
                    (string) $code,
                    $language,
                    $this->lineNumbers,
                    $this->wordWrap,
                    $this->showCopyButton,
                    $this->matchBraces,
                );
            }
            // Not our envelope format — fall through to plain string handling
        }

        // Handle new format submitted from form: array with 'code' and 'language'
        if (is_array($value)) {
            $code = $value['code'] ?? '';
            $language = $value['language'] ?? $this->getEffectiveLanguage();

            return new CodeValue(
                (string) $code,
                $language,
                $this->lineNumbers,
                $this->wordWrap,
                $this->showCopyButton,
                $this->matchBraces,
            );
        }

        // Handle old format: just a string (backward compatibility)
        return new CodeValue(
            (string) $value,
            $this->getEffectiveLanguage(),
            $this->lineNumbers,
            $this->wordWrap,
            $this->showCopyButton,
            $this->matchBraces,
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

    /**
     * Normalize a tri-state value from form select ('' → null, '1' → true, '0' → false)
     */
    private function normalizeTriState(mixed $value): ?bool
    {
        if ($value === '' || $value === null) {
            return null;
        }

        return (bool) $value;
    }

    protected function searchKeywords(mixed $value, ElementInterface $element): string
    {
        if ($value instanceof CodeValue) {
            return $value->getRaw();
        }

        return (string) $value;
    }
}
