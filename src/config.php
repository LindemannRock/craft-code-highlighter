<?php
/**
 * Code Highlighter config.php
 *
 * Configuration file for Code Highlighter plugin
 *
 * Copy to config/code-highlighter.php to override default settings
 */

return [
    '*' => [
        // ========================================
        // GENERAL
        // ========================================

        'pluginName' => 'Code Highlighter',


        // ========================================
        // EDITOR DEFAULTS
        // ========================================

        // Theme (site-wide, can be overridden per page via craft.codeHighlighter.setTheme())
        'defaultTheme' => 'tomorrow',

        // Default language for new fields
        'defaultLanguage' => 'php',

        // Default font size for code editor in pixels
        'defaultFontSize' => 14,

        // Available Languages (which languages appear in field settings)
        'availableLanguages' => [
            'markup', 'css', 'clike', 'javascript',
            'php', 'bash', 'twig', 'yaml', 'json'
        ],


        // ========================================
        // FRONTEND
        // ========================================

        // Font Family (optional - leave empty to use theme defaults)
        // Examples: 'JetBrains Mono, monospace', 'Fira Code, monospace'
        'fontFamily' => '',

        // Enable copy-to-clipboard button
        'enableCopyButton' => true,

        // Copy Button Styling (CSS Variables)
        'copyButtonStyles' => [
            // See config.php.template for all available variables
        ],
    ],
];
