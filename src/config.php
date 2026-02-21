<?php
/**
 * Code Highlighter config.php
 *
 * This file exists only as a template for the Code Highlighter settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'code-highlighter.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */


return [
    // Global settings
    '*' => [
        // ========================================
        // GENERAL SETTINGS
        // ========================================

        'pluginName' => 'Code Highlighter',


        // ========================================
        // EDITOR DEFAULTS
        // ========================================
        // Default settings for new Code Highlighter fields

        // Theme (site-wide, can be overridden per page via craft.codeHighlighter.setTheme())
        // Options: default, dark, funky, okaidia, twilight, coy, solarizedlight, tomorrow,
        //          atom-dark, dracula, material-dark, material-light, material-oceanic,
        //          nord, one-dark, one-light, synthwave84, vsc-dark-plus, vs, night-owl,
        //          gruvbox-dark, gruvbox-light, coldark-cold, coldark-dark
        'defaultTheme' => 'tomorrow',

        // Default language for new fields (fields can override this individually)
        'defaultLanguage' => 'php',

        // Default font size for code editor in pixels (8-32)
        'defaultFontSize' => 14,

        // Available Languages - Which languages are enabled site-wide
        // Leave empty or comment out to enable all 177+ languages
        // Specify an array to limit which languages appear in field settings
        'availableLanguages' => [
            'markup',      // HTML/XML
            'css',         // CSS
            'clike',       // C-like (base for many languages)
            'javascript',  // JavaScript
            'php',         // PHP
            'bash',        // Bash/Shell
            'twig',        // Twig
            'yaml',        // YAML
            'json',        // JSON
        ],


        // ========================================
        // FRONTEND SETTINGS
        // ========================================
        // Settings for frontend code rendering

        // Font Family (optional - leave empty to use theme defaults)
        // Popular code fonts: 'JetBrains Mono', 'Fira Code', 'Source Code Pro', 'Consolas'
        // Always include fallback: 'monospace'
        'fontFamily' => '',  // e.g., 'JetBrains Mono, monospace'

        // Show line numbers in frontend code blocks by default (can be overridden per field)
        'enableLineNumbers' => true,

        // Enable copy-to-clipboard button on frontend code blocks
        'enableCopyButton' => true,

        // Highlight matching braces, brackets, and parentheses on hover
        'enableMatchBraces' => false,

        // Show inline color previews next to CSS color values (hex, rgb, named colors)
        'enableInlineColor' => false,

        // Copy Button Styling (CSS Variables)
        // Use short names (--copy-btn-*) or full names (--code-highlighter-copy-btn-*)
        // Leave empty to use defaults, or override specific variables
        'copyButtonStyles' => [
            // Colors
            // '--copy-btn-bg' => '#2d2d2d',               // Button background
            // '--copy-btn-color' => '#ffffff',            // Button text color
            // '--copy-btn-hover-bg' => '#3d3d3d',         // Hover background
            // '--copy-btn-success-bg' => '#28a745',       // Success background (after copying)
            // '--copy-btn-border-color' => 'transparent', // Border color

            // Spacing
            // '--copy-btn-padding-inline' => '0.5rem',    // Left/right padding
            // '--copy-btn-padding-block' => '0.25rem',    // Top/bottom padding
            // '--copy-btn-border-radius' => '0.25rem',    // Corner rounding
            // '--copy-btn-min-width' => '5rem',           // Minimum button width

            // Typography
            // '--copy-btn-font-size' => '0.75rem',        // Button text size
            // '--copy-btn-font-family' => 'inherit',      // Button font

            // Focus (Accessibility)
            // '--copy-btn-focus-color' => '#4a9eff',      // Focus ring color
            // '--copy-btn-focus-offset' => '2px',         // Focus ring offset

            // Toolbar Position & Appearance
            // '--toolbar-top' => '0.3em',                 // Distance from top of code block
            // '--toolbar-right' => '0.2em',               // Distance from right edge
            // '--toolbar-opacity' => '0.9',               // Toolbar opacity (1 = fully visible)
        ],
    ],

    // Dev environment
    'dev' => [
        // Example: Different theme for development
        // 'defaultTheme' => 'vsc-dark-plus',
    ],

    // Staging environment
    'staging' => [
        // Example: Staging-specific settings
    ],

    // Production environment
    'production' => [
        // Example: Custom copy button styling for production
        // 'copyButtonStyles' => [
        //     '--copy-btn-bg' => '#1a1a1a',
        //     '--copy-btn-hover-bg' => '#2a2a2a',
        //     '--copy-btn-success-bg' => '#00ff00',
        //     '--copy-btn-border-radius' => '0.5rem',
        //     '--copy-btn-padding-inline' => '1rem',
        //     '--copy-btn-padding-block' => '0.5rem',
        //     '--toolbar-top' => '0.5em',
        //     '--toolbar-right' => '0.5em',
        // ],
    ],
];
