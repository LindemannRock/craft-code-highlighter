<?php

/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2026 LindemannRock
 */

namespace lindemannrock\codehighlighter\web\assets\frontend;

use craft\web\AssetBundle;

/**
 * Frontend Language Asset Bundle
 *
 * Asset bundle for Prism language components on the frontend.
 *
 * @author    LindemannRock
 * @package   CodeHighlighter
 * @since     5.0.0
 */
class FrontendLanguageAsset extends AssetBundle
{
    // Base languages that many others extend from (always loaded)
    public const BASE_LANGUAGES = ['clike', 'markup', 'javascript', 'json'];

    public function init(): void
    {
        $this->sourcePath = '@lindemannrock/codehighlighter/web/assets/prism/js/components';

        $this->depends = [
            FrontendAsset::class,
        ];

        // Always load base languages first
        foreach (self::BASE_LANGUAGES as $lang) {
            $this->js[] = "prism-{$lang}.min.js";
        }

        parent::init();
    }
}
