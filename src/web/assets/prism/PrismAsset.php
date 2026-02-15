<?php

/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2026 LindemannRock
 */

namespace lindemannrock\codehighlighter\web\assets\prism;

use craft\web\AssetBundle;

/**
 * Prism Asset Bundle
 *
 * Shared Prism.js core files used by both CP field and frontend bundles.
 * Loads the core JS engine, line-numbers plugin JS and CSS.
 *
 * @author    LindemannRock
 * @package   CodeHighlighter
 * @since     5.0.0
 */
class PrismAsset extends AssetBundle
{
    public function init(): void
    {
        $this->sourcePath = __DIR__;

        $this->css = [
            'css/prism-line-numbers.css',
        ];

        $this->js = [
            'js/prism-core.min.js',
            'js/prism-line-numbers.min.js',
        ];

        parent::init();
    }
}
