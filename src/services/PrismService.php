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
 *
 * @since 5.0.0
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

        // Build CSS classes (escape language for use in class attribute)
        $safeLanguage = htmlspecialchars($language, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $classes = ['language-' . $safeLanguage];

        // Add line numbers class (null/unset = use plugin setting)
        $lineNumbers = $options['lineNumbers'] ?? $settings->enableLineNumbers;
        if ($lineNumbers) {
            $classes[] = 'line-numbers';
        }

        // Add word wrap class if enabled
        $wordWrap = $options['wordWrap'] ?? false;
        if ($wordWrap) {
            $classes[] = 'wrap-lines';
        }

        // Add match braces class if enabled
        $matchBraces = $options['matchBraces'] ?? $settings->enableMatchBraces;
        if ($matchBraces) {
            $classes[] = 'match-braces';
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

        // Only inline font-size when explicitly passed in options
        // (CSS fallback chain in frontend.css handles defaults via --code-font-size)
        $fontSize = $options['fontSize'] ?? null;

        // Only inline font-family when explicitly passed in options
        $fontFamily = $options['fontFamily'] ?? null;

        // Build inline styles for CSS variables
        $styles = [];
        if ($fontSize) {
            $styles[] = sprintf('--code-highlighter-font-size: %dpx', $fontSize);
        }
        if ($fontFamily) {
            // Strip characters that could enable CSS injection
            $safeFontFamily = preg_replace('/[{}();\\\\]/', '', $fontFamily);
            $styles[] = sprintf('--code-highlighter-font-family: %s', htmlspecialchars($safeFontFamily, ENT_QUOTES));
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

    /**
     * Get dependencies for a language (recursively)
     *
     * @param string $language Language identifier
     * @return string[] Ordered list of dependency language identifiers
     */
    public function getLanguageDependencies(string $language): array
    {
        static $componentsData = null;

        // Load components.json once
        if ($componentsData === null) {
            $componentsPath = Craft::getAlias('@lindemannrock/codehighlighter/web/assets/prism/js/components.json');
            if (file_exists($componentsPath)) {
                $componentsData = json_decode(file_get_contents($componentsPath), true);
            } else {
                $componentsData = [];
            }
        }

        $dependencies = [];
        $visited = [];
        $this->resolveDependencies($language, $componentsData, $dependencies, $visited);

        return $dependencies;
    }

    /**
     * Recursively resolve dependencies in correct load order
     */
    private function resolveDependencies(string $language, array $componentsData, array &$resolved, array &$visited): void
    {
        // Guard against circular dependencies
        if (in_array($language, $visited, true)) {
            return;
        }

        $visited[] = $language;

        // Get language definition
        $languageDef = $componentsData['languages'][$language] ?? null;

        if ($languageDef && isset($languageDef['require'])) {
            $requirements = is_array($languageDef['require'])
                ? $languageDef['require']
                : [$languageDef['require']];

            // First resolve dependencies of requirements
            foreach ($requirements as $requirement) {
                $this->resolveDependencies($requirement, $componentsData, $resolved, $visited);
            }

            // Then add requirements if not already added
            foreach ($requirements as $requirement) {
                if (!in_array($requirement, $resolved, true)) {
                    $resolved[] = $requirement;
                }
            }
        }
    }
}
