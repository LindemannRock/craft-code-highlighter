<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\variables;

use lindemannrock\codehighlighter\CodeHighlighter;

/**
 * Code Highlighter Variable
 *
 * Provides template variables for controlling code highlighting
 *
 * @since 5.0.0
 */
class CodeHighlighterVariable
{
    private static ?string $pageTheme = null;

    /**
     * Set theme for current page
     *
     * Usage: {% do craft.codeHighlighter.setTheme('dracula') %}
     *
     * @param string $theme Theme name
     */
    public function setTheme(string $theme): void
    {
        self::$pageTheme = $theme;
    }

    /**
     * Get the current page theme (or plugin default)
     *
     * @return string
     */
    public function getTheme(): string
    {
        if (self::$pageTheme !== null) {
            return self::$pageTheme;
        }

        $settings = CodeHighlighter::$plugin->getSettings();
        return $settings->defaultTheme;
    }
}
