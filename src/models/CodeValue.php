<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\models;

use craft\helpers\Template;
use lindemannrock\codehighlighter\CodeHighlighter;
use Twig\Markup;

/**
 * Code Value
 *
 * Stores code and language, auto-highlights when output
 * Extends Twig Markup to prevent HTML escaping
 *
 * @since 5.0.0
 */
class CodeValue extends Markup
{
    public string $code;
    public string $language;
    public ?bool $lineNumbers;
    public bool $wordWrap;
    public ?bool $showCopy;
    public ?bool $matchBraces;

    public function __construct(
        string $code,
        string $language,
        ?bool $lineNumbers = null,
        bool $wordWrap = false,
        ?bool $showCopy = null,
        ?bool $matchBraces = null,
    ) {
        $this->code = $code;
        $this->language = $language;
        $this->lineNumbers = $lineNumbers;
        $this->wordWrap = $wordWrap;
        $this->showCopy = $showCopy;
        $this->matchBraces = $matchBraces;

        // Pass raw code to parent so count()/jsonSerialize() return correct values.
        // __toString() is overridden to return highlighted HTML instead.
        parent::__construct($code, 'UTF-8');
    }

    /**
     * Auto-highlight when output as string
     */
    public function __toString(): string
    {
        if (empty($this->code)) {
            return '';
        }

        $options = [
            'wordWrap' => $this->wordWrap,
        ];

        // Only pass nullable options when explicitly set (null = use plugin default)
        if ($this->lineNumbers !== null) {
            $options['lineNumbers'] = $this->lineNumbers;
        }
        if ($this->showCopy !== null) {
            $options['showCopy'] = $this->showCopy;
        }
        if ($this->matchBraces !== null) {
            $options['matchBraces'] = $this->matchBraces;
        }

        $html = CodeHighlighter::$plugin->prism->highlight($this->code, $this->language, $options);

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

        // Build base options from field settings (null = use plugin default)
        $baseOptions = [];

        if ($this->lineNumbers !== null) {
            $baseOptions['lineNumbers'] = $this->lineNumbers;
        }
        if ($this->showCopy !== null) {
            $baseOptions['showCopy'] = $this->showCopy;
        }
        if ($this->matchBraces !== null) {
            $baseOptions['matchBraces'] = $this->matchBraces;
        }

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
