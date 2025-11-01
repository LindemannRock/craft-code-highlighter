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
use lindemannrock\codehighlighter\CodeHighlighter;

/**
 * Frontend Asset Bundle
 *
 * Asset bundle for Prism.js on the frontend
 */
class FrontendAsset extends AssetBundle
{
    public function init(): void
    {
        // Set source path to our resources directory
        $this->sourcePath = '@lindemannrock/codehighlighter/resources';

        $settings = CodeHighlighter::$plugin->getSettings();

        // Determine if we should use minified assets
        $min = Craft::$app->config->general->devMode ? '' : '.min';

        // Load CSS (theme CSS is registered dynamically per code block)
        $this->css = [
            'css/prism-line-numbers.css',
            "css/frontend{$min}.css", // Custom styling with CSS variables
        ];

        // Load core JS and line numbers plugin
        $this->js = [
            'js/prism-core.min.js',
            'js/prism-line-numbers.min.js',
        ];

        // Add copy button if enabled (uses our accessible implementation)
        if ($settings->enableCopyButton) {
            $this->css[] = 'css/prism-toolbar.css';
            $this->js[] = 'js/prism-toolbar.min.js';
            $this->js[] = "js/copy-button{$min}.js"; // Our accessible copy button
        }

        parent::init();
    }
}
