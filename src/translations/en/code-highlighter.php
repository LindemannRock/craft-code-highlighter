<?php
/**
 * Code Highlighter plugin for Craft CMS 5.x
 *
 * @link      https://lindemannrock.com
 * @copyright Copyright (c) 2026 LindemannRock
 */

return [
    // Plugin meta
    'Code Highlighter' => 'Code Highlighter',
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Manage Prism.js settings and code field behavior from the plugin settings area.',
    'Open Code Highlighter' => 'Open Code Highlighter',

    // Settings: General
    'General' => 'General',
    'Theme' => 'Theme',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())',
    'Default Language' => 'Default Language',
    'Default language for new Code Highlighter fields' => 'Default language for new Code Highlighter fields',
    'Default Font Size' => 'Default Font Size',
    'Default font size for new Code Highlighter fields' => 'Default font size for new Code Highlighter fields',
    '8px - Tiny' => '8px - Tiny',
    '10px - Very Small' => '10px - Very Small',
    '12px - Small' => '12px - Small',
    '14px - Normal' => '14px - Normal',
    '16px - Medium' => '16px - Medium',
    '18px - Large' => '18px - Large',
    '20px - Very Large' => '20px - Very Large',
    '24px - Huge' => '24px - Huge',
    'Font Family (Optional)' => 'Font Family (Optional)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Custom font family for code blocks (leave empty to use theme default)',
    'e.g., JetBrains Mono, Fira Code, monospace' => 'e.g., JetBrains Mono, Fira Code, monospace',
    'Enable Line Numbers' => 'Enable Line Numbers',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Show line numbers in frontend code blocks by default (can be overridden per field)',
    'Enable Copy Button' => 'Enable Copy Button',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)',
    'Enable Match Braces' => 'Enable Match Braces',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)',
    'Enable Inline Color' => 'Enable Inline Color',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.',
    'Available Languages' => 'Available Languages',
    'Select languages available in field settings dropdowns' => 'Select languages available in field settings dropdowns',
    'Default language (always included)' => 'Default language (always included)',
    '(default)' => '(default)',

    // Settings: Field
    'Language' => 'Language',
    'Default language for this field (must be enabled in Available Languages below)' => 'Default language for this field (must be enabled in Available Languages below)',
    'Show Language Dropdown' => 'Show Language Dropdown',
    'Show language switcher dropdown in the editor' => 'Show language switcher dropdown in the editor',
    'Editor' => 'Editor',
    'Rows' => 'Rows',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Number of visible rows in the field editor (1 row = 21px)',
    'Tab Width' => 'Tab Width',
    'Number of spaces per tab character' => 'Number of spaces per tab character',
    'Font Size' => 'Font Size',
    'Font size for the field editor' => 'Font size for the field editor',
    'Use Plugin Default ({value})' => 'Use Plugin Default ({value})',
    'Word Wrap' => 'Word Wrap',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.',
    'Frontend Output' => 'Frontend Output',
    'Line Numbers' => 'Line Numbers',
    'Show line numbers in frontend code blocks' => 'Show line numbers in frontend code blocks',
    'On' => 'On',
    'Off' => 'Off',
    'Copy Button' => 'Copy Button',
    'Show copy-to-clipboard button on frontend code blocks' => 'Show copy-to-clipboard button on frontend code blocks',
    'Match Braces' => 'Match Braces',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Highlight matching braces, brackets, and parentheses on hover',
    'Default Content' => 'Default Content',
    'Default Value' => 'Default Value',
    'Default code to populate the field with (optional)' => 'Default code to populate the field with (optional)',
    'Available Languages (Optional)' => 'Available Languages (Optional)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Override available languages for this field (leave empty to use plugin defaults)',
    'Field default language (always included)' => 'Field default language (always included)',
    '(field default)' => '(field default)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => 'Found {count, number} {count, plural, =1{error} other{errors}}',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.',
];
