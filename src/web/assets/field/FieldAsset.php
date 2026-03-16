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

        $this->css = [
            'dist/css/field.css',
        ];

        $this->js = [
            // bililiteRange v4.01 (MIT License)
            'dist/js/lib/bililiteRange.js',
            'dist/js/lib/history.js',           // historystack — required by undo
            'dist/js/lib/bililiteRange.undo.js',
            'dist/js/lib/bililiteRange.lines.js',

            // Our field implementation
            'dist/js/field.js',
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
        $theme = CodeHighlighter::$plugin->getSettings()->defaultTheme;

        // Determine theme file extension (core themes use .min.css, extended use .css)
        $coreThemes = ['default', 'dark', 'funky', 'okaidia', 'twilight', 'coy', 'solarizedlight', 'tomorrow'];
        $themeExtension = in_array($theme, $coreThemes) ? '.min.css' : '.css';

        $view->registerCssFile($prismBundle->baseUrl . "/css/themes/prism-{$theme}{$themeExtension}");
    }
}
