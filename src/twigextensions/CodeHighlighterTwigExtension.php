<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\twigextensions;

use Craft;
use lindemannrock\codehighlighter\CodeHighlighter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Twig Extension for Code Highlighting
 */
class CodeHighlighterTwigExtension extends AbstractExtension
{
    /**
     * Return extension name
     */
    public function getName(): string
    {
        return 'Code Highlighter';
    }

    /**
     * Register Twig filters
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('highlight', [$this, 'highlightFilter'], ['is_safe' => ['html']]),
            new TwigFilter('prism', [$this, 'highlightFilter'], ['is_safe' => ['html']]), // Alias
        ];
    }

    /**
     * Highlight code with Prism
     *
     * Usage: {{ code|highlight('php') }}
     * Usage: {{ code|prism('php', {lineNumbers: true, theme: 'dark'}) }}
     *
     * @param string $code Code to highlight
     * @param string $language Language identifier (php, bash, twig, etc.)
     * @param array $options Optional overrides
     * @return string Highlighted HTML
     */
    public function highlightFilter(string $code, string $language = 'php', array $options = []): string
    {
        return CodeHighlighter::$plugin->prism->highlight($code, $language, $options);
    }
}
