<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\models;

use Craft;
use lindemannrock\codehighlighter\CodeHighlighter;
use craft\helpers\Template;
use Twig\Markup;

/**
 * Code Value
 *
 * Stores code and language, auto-highlights when output
 * Extends Twig Markup to prevent HTML escaping
 */
class CodeValue extends Markup
{
    public string $code;
    public string $language;
    public bool $lineNumbers;
    public bool $wordWrap;

    public function __construct(string $code, string $language, bool $lineNumbers = true, bool $wordWrap = false)
    {
        $this->code = $code;
        $this->language = $language;
        $this->lineNumbers = $lineNumbers;
        $this->wordWrap = $wordWrap;

        // Initialize parent Markup with empty content (will be generated on __toString)
        parent::__construct('', 'UTF-8');
    }

    /**
     * Auto-highlight when output as string
     */
    public function __toString(): string
    {
        if (empty($this->code)) {
            return '';
        }

        $html = CodeHighlighter::$plugin->prism->highlight($this->code, $this->language, [
            'lineNumbers' => $this->lineNumbers,
            'wordWrap' => $this->wordWrap,
        ]);

        // Return raw HTML (won't be escaped because we extend Markup)
        return $html;
    }

    /**
     * Get raw code without highlighting
     */
    public function getRaw(): string
    {
        return $this->code;
    }

    /**
     * Get language
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * Render with custom options (override field settings)
     *
     * @param array $options Options to override (lineNumbers, language, etc.)
     * @return Markup
     */
    public function render(array $options = []): Markup
    {
        if (empty($this->code)) {
            return Template::raw('');
        }

        // Build base options from field settings
        $baseOptions = [
            'lineNumbers' => $this->lineNumbers,
        ];

        // Merge with provided options (provided options take precedence)
        $mergedOptions = array_merge($baseOptions, $options);

        $html = CodeHighlighter::$plugin->prism->highlight(
            $this->code,
            $options['language'] ?? $this->language,
            $mergedOptions
        );

        return Template::raw($html);
    }
}
