<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2026 LindemannRock
 */

namespace lindemannrock\codehighlighter\traits;

use Craft;
use lindemannrock\codehighlighter\CodeHighlighter;
use lindemannrock\codehighlighter\variables\CodeHighlighterVariable;

/**
 * Code Highlighter Trait
 *
 * Provides code highlighting functionality for plugin services.
 * Wraps the Code Highlighter plugin API with graceful degradation
 * when the plugin is not installed or enabled.
 *
 * Usage:
 * ```php
 * class MyService extends Component
 * {
 *     use CodeHighlighterTrait;
 *
 *     public function renderCode(string $code): string
 *     {
 *         return $this->highlightCode($code, 'php', [
 *             'lineNumbers' => true,
 *             'showCopy' => true,
 *         ]);
 *     }
 *
 *     public function getThemeOptions(): array
 *     {
 *         return $this->getAvailableThemes();
 *     }
 * }
 * ```
 *
 * @author LindemannRock
 * @since 5.4.0
 */
trait CodeHighlighterTrait
{
    private ?CodeHighlighter $_codeHighlighterPlugin = null;
    private bool $_codeHighlighterChecked = false;

    /**
     * Check if the Code Highlighter plugin is available
     */
    protected function isCodeHighlighterAvailable(): bool
    {
        return $this->getCodeHighlighterPlugin() !== null;
    }

    /**
     * Highlight code with syntax highlighting
     *
     * Returns highlighted HTML when Code Highlighter is available,
     * or plain `<pre><code>` fallback when it is not.
     *
     * @param string $code The source code to highlight
     * @param string $language Language identifier (e.g. 'php', 'javascript', 'twig')
     * @param array{lineNumbers?: bool, wordWrap?: bool, matchBraces?: bool, showCopy?: bool, fontSize?: int} $options Display options
     * @return string Highlighted HTML
     */
    protected function highlightCode(string $code, string $language = 'php', array $options = []): string
    {
        $plugin = $this->getCodeHighlighterPlugin();

        if ($plugin === null) {
            $escapedCode = htmlspecialchars($code, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            $escapedLanguage = htmlspecialchars($language, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

            return sprintf('<pre><code class="language-%s">%s</code></pre>', $escapedLanguage, $escapedCode);
        }

        return $plugin->prism->highlight($code, $language, $options);
    }

    /**
     * Set the code theme for the current page/request
     *
     * @param string $theme Theme handle (e.g. 'dracula', 'tomorrow', 'nord')
     */
    protected function applyCodeTheme(string $theme): void
    {
        if (!$this->isCodeHighlighterAvailable()) {
            return;
        }

        $variable = new CodeHighlighterVariable();
        $variable->setTheme($theme);
    }

    /**
     * Get the current code theme
     *
     * @return string Theme handle, or 'default' when plugin unavailable
     */
    protected function currentCodeTheme(): string
    {
        if (!$this->isCodeHighlighterAvailable()) {
            return 'default';
        }

        $variable = new CodeHighlighterVariable();

        return $variable->getTheme();
    }

    /**
     * Get all available themes
     *
     * @return array<string, string> Theme handle => label (e.g. ['dracula' => 'Dracula', ...])
     */
    protected function getAvailableThemes(): array
    {
        $plugin = $this->getCodeHighlighterPlugin();

        if ($plugin === null) {
            return [];
        }

        return $plugin->getSettings()->getAvailableThemes();
    }

    /**
     * Get all supported languages
     *
     * @return array<string, string> Language handle => label (e.g. ['php' => 'PHP', ...])
     */
    protected function getAllLanguages(): array
    {
        $plugin = $this->getCodeHighlighterPlugin();

        if ($plugin === null) {
            return [];
        }

        return $plugin->getSettings()->getAllPrismLanguages();
    }

    /**
     * Get languages filtered by plugin settings
     *
     * @return array<string, string> Language handle => label
     */
    protected function getFilteredLanguages(): array
    {
        $plugin = $this->getCodeHighlighterPlugin();

        if ($plugin === null) {
            return [];
        }

        return $plugin->getSettings()->getFilteredLanguages();
    }

    /**
     * Get the Code Highlighter plugin instance (lazy, cached)
     */
    private function getCodeHighlighterPlugin(): ?CodeHighlighter
    {
        if (!$this->_codeHighlighterChecked) {
            $this->_codeHighlighterChecked = true;
            $plugin = Craft::$app->getPlugins()->getPlugin('code-highlighter');

            if ($plugin instanceof CodeHighlighter) {
                $this->_codeHighlighterPlugin = $plugin;
            }
        }

        return $this->_codeHighlighterPlugin;
    }
}
