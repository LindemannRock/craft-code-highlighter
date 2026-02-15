<?php

/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2026 LindemannRock
 */

namespace lindemannrock\codehighlighter\web\assets\field;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;
use lindemannrock\codehighlighter\CodeHighlighter;
use lindemannrock\codehighlighter\web\assets\prism\PrismAsset;

/**
 * Field Asset Bundle
 *
 * Asset bundle for the Code Highlighter field in the Control Panel.
 *
 * @author    LindemannRock
 * @package   CodeHighlighter
 * @since     5.0.0
 */
class FieldAsset extends AssetBundle
{
    public function init(): void
    {
        $this->sourcePath = __DIR__;

        $this->depends = [
            CpAsset::class,
            PrismAsset::class,
        ];

        // Determine if we should use minified assets
        $min = Craft::$app->config->general->devMode ? '' : '.min';

        $this->css = [
            "css/field{$min}.css",
        ];

        $this->js = [
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
     * @inheritdoc
     */
    public function registerAssetFiles($view): void
    {
        parent::registerAssetFiles($view);

        // Register theme CSS from the shared PrismAsset bundle
        $prismBundle = Craft::$app->getView()->getAssetManager()->getBundle(PrismAsset::class);
        $settings = CodeHighlighter::$plugin->getSettings();
        $theme = $settings->defaultTheme;

        // Determine theme file extension (core themes use .min.css, extended use .css)
        $coreThemes = ['default', 'dark', 'funky', 'okaidia', 'twilight', 'coy', 'solarizedlight', 'tomorrow'];
        $themeExtension = in_array($theme, $coreThemes) ? '.min.css' : '.css';

        $view->registerCssFile(
            $prismBundle->baseUrl . "/css/themes/prism-{$theme}{$themeExtension}",
            ['depends' => [PrismAsset::class]]
        );
    }
}
