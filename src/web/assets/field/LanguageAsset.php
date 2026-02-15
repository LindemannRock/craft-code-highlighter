<?php

/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2026 LindemannRock
 */

namespace lindemannrock\codehighlighter\web\assets\field;

use craft\web\AssetBundle;

/**
 * Language Asset Bundle
 *
 * Separate bundle for Prism language components in the CP.
 *
 * @author    LindemannRock
 * @package   CodeHighlighter
 * @since     5.0.0
 */
class LanguageAsset extends AssetBundle
{
    // Base languages that many others extend from (always loaded)
    public const BASE_LANGUAGES = ['clike', 'markup', 'javascript', 'json'];

    public function init(): void
    {
        $this->sourcePath = '@lindemannrock/codehighlighter/web/assets/prism/js/components';

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
