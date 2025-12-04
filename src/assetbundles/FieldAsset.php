<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\assetbundles;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;
use lindemannrock\codehighlighter\CodeHighlighter;

/**
 * Field Asset Bundle
 *
 * Asset bundle for the Code Highlighter field in the Control Panel
 *
 * @since 5.0.0
 */
class FieldAsset extends AssetBundle
{
    public function init(): void
    {
        // Set source path to our resources directory
        $this->sourcePath = '@lindemannrock/codehighlighter/resources';

        $this->depends = [
            CpAsset::class,
        ];

        // Get settings to determine which theme to load
        $settings = CodeHighlighter::$plugin->getSettings();
        $theme = $settings->defaultTheme;

        // Determine theme file extension (core themes use .min.css, extended use .css)
        $coreThemes = ['default', 'dark', 'funky', 'okaidia', 'twilight', 'coy', 'solarizedlight', 'tomorrow'];
        $themeExtension = in_array($theme, $coreThemes) ? '.min.css' : '.css';

        // Determine if we should use minified assets
        $min = Craft::$app->config->general->devMode ? '' : '.min';

        // Load theme CSS
        $this->css = [
            "css/themes/prism-{$theme}{$themeExtension}",
            'css/prism-line-numbers.css',
            "css/field{$min}.css", // Custom field overrides
        ];

        // Load core JS and plugins (NO autoloader - we manually load dependencies)
        $this->js = [
            'js/prism-core.min.js',
            'js/prism-line-numbers.min.js',

            // bililiteRange library for contenteditable handling (MIT License)
            'js/lib/bililiteRange.js',
            'js/lib/bililiteRange.fancytext.js',
            'js/lib/bililiteRange.undo.js',
            'js/lib/bililiteRange.util.js',
            'js/lib/jquery.sendkeys.js',

            // Our field implementation
            "js/field{$min}.js",
        ];

        parent::init();
    }

    /**
     * Register language component dynamically
     *
     * @param string $language Language to load
     */
    public function registerLanguage(string $language): void
    {
        $view = Craft::$app->getView();

        // Register the language component
        $view->registerJsFile(
            $this->baseUrl . "/js/components/prism-{$language}.min.js",
            ['depends' => [self::class]]
        );
    }
}
