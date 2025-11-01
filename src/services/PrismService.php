<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2025 LindemannRock
 */

namespace lindemannrock\codehighlighter\services;

use Craft;
use craft\base\Component;
use lindemannrock\codehighlighter\CodeHighlighter;

/**
 * Prism Service
 *
 * Handles code highlighting using Prism.js
 */
class PrismService extends Component
{
    /**
     * Highlight code with Prism
     *
     * @param string $code Code to highlight
     * @param string $language Language identifier
     * @param array $options Optional overrides (lineNumbers, theme)
     * @return string HTML output
     */
    public function highlight(string $code, string $language = 'php', array $options = []): string
    {
        $settings = CodeHighlighter::$plugin->getSettings();

        // Register assets for this language (theme determined by Variable)
        CodeHighlighter::$plugin->assets->register($language, $options);

        // Escape HTML entities in code
        $escapedCode = htmlspecialchars($code, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

        // Build CSS classes
        $classes = ['language-' . $language];

        // Add line numbers class if specified in options
        // Note: When outputting a field, lineNumbers comes from field settings
        // When using manual filter, it defaults to true if not specified
        $lineNumbers = $options['lineNumbers'] ?? true;
        if ($lineNumbers) {
            $classes[] = 'line-numbers';
        }

        // Add word wrap class if enabled
        $wordWrap = $options['wordWrap'] ?? false;
        if ($wordWrap) {
            $classes[] = 'wrap-lines';
        }

        $classString = implode(' ', $classes);

        // Build wrapper classes
        $wrapperClasses = ['code-highlighter-wrapper'];

        // Add no-copy class if copy button should be hidden
        $showCopy = $options['showCopy'] ?? $settings->enableCopyButton;
        if (!$showCopy) {
            $wrapperClasses[] = 'no-copy';
        }

        $wrapperClassString = implode(' ', $wrapperClasses);

        // Determine font size (from options, config, or default)
        $fontSize = $options['fontSize'] ?? null;
        if (!$fontSize) {
            $config = Craft::$app->config->getConfigFromFile('code-highlighter');
            $fontSize = $config['defaultFontSize'] ?? $settings->defaultFontSize;
        }

        // Determine font family (from config or settings)
        $fontFamily = null;
        $config = Craft::$app->config->getConfigFromFile('code-highlighter');
        if (!empty($config['fontFamily'])) {
            $fontFamily = $config['fontFamily'];
        } elseif (!empty($settings->fontFamily)) {
            $fontFamily = $settings->fontFamily;
        }

        // Build inline styles for CSS variables
        $styles = [];
        if ($fontSize) {
            $styles[] = sprintf('--code-highlighter-font-size: %dpx', $fontSize);
        }
        if ($fontFamily) {
            $styles[] = sprintf('--code-highlighter-font-family: %s', htmlspecialchars($fontFamily, ENT_QUOTES));
        }

        $style = !empty($styles) ? sprintf('style="%s"', implode('; ', $styles)) : '';

        // Return formatted HTML wrapped for styling
        return sprintf(
            '<div class="%s" %s><pre class="%s"><code class="%s">%s</code></pre></div>',
            $wrapperClassString,
            $style,
            $classString,
            $classString,
            $escapedCode
        );
    }

    /**
     * Get all supported Prism languages
     */
    public function getAllLanguages(): array
    {
        $settings = CodeHighlighter::$plugin->getSettings();
        return $settings->getAllPrismLanguages();
    }
}

