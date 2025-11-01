<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\assetbundles;

use craft\web\AssetBundle;

/**
 * Language Asset Bundle
 *
 * Separate bundle for Prism language components
 */
class LanguageAsset extends AssetBundle
{
    // Base languages that many others extend from (always loaded)
    public const BASE_LANGUAGES = ['clike', 'markup', 'javascript', 'json'];

    public function init(): void
    {
        $this->sourcePath = '@lindemannrock/codehighlighter/resources/js/components';

        $this->depends = [
            FieldAsset::class,
        ];

        // Always load base languages first
        foreach (self::BASE_LANGUAGES as $lang) {
            $this->js[] = "prism-{$lang}.min.js";
        }

        parent::init();
    }
}
