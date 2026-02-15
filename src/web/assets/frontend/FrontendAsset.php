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
        parent::registerAssetFiles($view);

        $settings = CodeHighlighter::$plugin->getSettings();
        $prismBundle = Craft::$app->getView()->getAssetManager()->getBundle(PrismAsset::class);

        // Register toolbar CSS/JS from PrismAsset if copy button is enabled
        if ($settings->enableCopyButton) {
            $view->registerCssFile(
                $prismBundle->baseUrl . '/css/prism-toolbar.css',
                ['depends' => [PrismAsset::class]]
            );
            $view->registerJsFile(
                $prismBundle->baseUrl . '/js/prism-toolbar.min.js',
                ['depends' => [PrismAsset::class]]
            );
        }
    }
}
