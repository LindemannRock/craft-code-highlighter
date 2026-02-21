<?php

/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2026 LindemannRock
 */

namespace lindemannrock\codehighlighter\web\assets\frontend;

use Craft;
use craft\web\AssetBundle;
use lindemannrock\codehighlighter\CodeHighlighter;
use lindemannrock\codehighlighter\web\assets\prism\PrismAsset;

/**
 * Frontend Asset Bundle
 *
 * Asset bundle for Prism.js on the frontend.
 *
 * @author    LindemannRock
 * @package   CodeHighlighter
 * @since     5.0.0
 */
class FrontendAsset extends AssetBundle
{
    public function init(): void
    {
        $this->sourcePath = __DIR__;

        $this->depends = [
            PrismAsset::class,
        ];

        $settings = CodeHighlighter::$plugin->getSettings();

        // Determine if we should use minified assets
        $min = Craft::$app->config->general->devMode ? '' : '.min';

        $this->css = [
            "css/frontend{$min}.css",
        ];

        // Add copy button if enabled (uses our accessible implementation)
        if ($settings->enableCopyButton) {
            $this->js = [
                "js/copy-button{$min}.js",
            ];
        }

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view): void
    {
        $settings = CodeHighlighter::$plugin->getSettings();
        $prismBundle = Craft::$app->getView()->getAssetManager()->getBundle(PrismAsset::class);

        // Register Prism plugins BEFORE parent (which outputs copy-button.js).
        // copy-button.js requires Prism.plugins.toolbar to exist at execution time.
        // Using registerJsFile without 'depends' — PrismAsset bundle is already
        // resolved as a dependency, so its baseUrl is available.

        // Toolbar (required for copy button)
        if ($settings->enableCopyButton) {
            $view->registerCssFile($prismBundle->baseUrl . '/css/prism-toolbar.css');
            $view->registerJsFile($prismBundle->baseUrl . '/js/prism-toolbar.min.js');
        }

        // Match Braces plugin
        if ($settings->enableMatchBraces) {
            $view->registerCssFile($prismBundle->baseUrl . '/css/prism-match-braces.min.css');
            $view->registerJsFile($prismBundle->baseUrl . '/js/prism-match-braces.min.js');
        }

        // Inline Color plugin CSS (JS loaded after language bundles by AssetService)
        if ($settings->enableInlineColor) {
            $view->registerCssFile($prismBundle->baseUrl . '/css/prism-inline-color.min.css');
        }

        // Now output bundle files (frontend.css + copy-button.js)
        parent::registerAssetFiles($view);
    }
}
