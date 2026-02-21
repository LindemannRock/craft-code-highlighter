<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2026 LindemannRock
 */

namespace lindemannrock\codehighlighter\twigextensions;

use lindemannrock\codehighlighter\CodeHighlighter;

/**
 * Plugin Name Helper
 *
 * Provides display name properties for Twig templates via {{ codeHelper.fullName }} etc.
 *
 * @since 5.1.0
 */
class PluginNameHelper
{
    private const ALLOWED_PROPS = ['displayName', 'pluralDisplayName', 'fullName', 'lowerDisplayName', 'pluralLowerDisplayName'];

    public function getDisplayName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getDisplayName();
    }

    public function getPluralDisplayName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getPluralDisplayName();
    }

    public function getFullName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getFullName();
    }

    public function getLowerDisplayName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getLowerDisplayName();
    }

    public function getPluralLowerDisplayName(): string
    {
        return CodeHighlighter::$plugin->getSettings()->getPluralLowerDisplayName();
    }

    public function __get(string $name): ?string
    {
        if (!in_array($name, self::ALLOWED_PROPS, true)) {
            return null;
        }

        $method = 'get' . ucfirst($name);

        return $this->$method();
    }
}
