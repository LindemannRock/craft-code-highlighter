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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Hantera Prism.js-inställningar och kodfältsbeteende från plugin-inställningsområdet.',
    'Open Code Highlighter' => 'Öppna Code Highlighter',

    // Settings: General
    'General' => 'Allmänt',
    'Theme' => 'Tema',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Prism-tema för syntaxmarkering (kan åsidosättas per sida med craft.codeHighlighter.setTheme())',
    'Default Language' => 'Standardspråk',
    'Default language for new Code Highlighter fields' => 'Standardspråk för nya Code Highlighter-fält',
    'Default Font Size' => 'Standardteckenstorlek',
    'Default font size for new Code Highlighter fields' => 'Standardteckenstorlek för nya Code Highlighter-fält',
    'Font Family (Optional)' => 'Teckensnittsfamilj (Valfritt)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Anpassad teckensnittsfamilj för kodblock (lämna tomt för att använda temats standard)',
    'Enable Line Numbers' => 'Aktivera radnummer',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Visa radnummer i frontend-kodblock som standard (kan åsidosättas per fält)',
    'Enable Copy Button' => 'Aktivera Copy-knapp',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'Lägg till en „Copy"-knapp i frontend-kodblock som standard (kan åsidosättas per block via renderingsalternativ)',
    'Enable Match Braces' => 'Aktivera parentsesmatchning',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Markera matchande hakparenteser, klammerparenteser och parenteser vid hover (kan åsidosättas per block via renderingsalternativ)',
    'Enable Inline Color' => 'Aktivera infogad färg',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Visa infogade färgförhandsvisningar bredvid CSS-färgvärden (hex, rgb, namngivna färger). Gäller alla kodblock på sidan när aktiverat.',
    'Available Languages' => 'Tillgängliga språk',
    'Select languages available in field settings dropdowns' => 'Välj språk tillgängliga i fältinställningarnas rullgardinsmenyer',
    'Default language (always included)' => 'Standardspråk (alltid inkluderat)',
    '(default)' => '(standard)',

    // Settings: Field
    'Language' => 'Språk',
    'Default language for this field (must be enabled in Available Languages below)' => 'Standardspråk för det här fältet (måste vara aktiverat i Tillgängliga språk nedan)',
    'Show Language Dropdown' => 'Visa språkmeny',
    'Show language switcher dropdown in the editor' => 'Visa rullgardinsmenyn för språkbyte i editorn',
    'Editor' => 'Editor',
    'Rows' => 'Rader',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Antal synliga rader i fälteditorn (1 rad = 21px)',
    'Tab Width' => 'Tabbbredd',
    'Number of spaces per tab character' => 'Antal mellanslag per teckentabbe',
    'Font Size' => 'Teckenstorlek',
    'Font size for the field editor' => 'Teckenstorlek för fälteditorn',
    'Word Wrap' => 'Radbrytning',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Bryt långa rader istället för horisontell rullning. Kan påverka kodens läsbarhet och radnummerjustering.',
    'Frontend Output' => 'Frontend-utdata',
    'Line Numbers' => 'Radnummer',
    'Show line numbers in frontend code blocks' => 'Visa radnummer i frontend-kodblock',
    'On' => 'På',
    'Off' => 'Av',
    'Copy Button' => 'Copy-knapp',
    'Show copy-to-clipboard button on frontend code blocks' => 'Visa kopiera-till-urklipp-knapp i frontend-kodblock',
    'Match Braces' => 'Parentesmatchning',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Markera matchande klammerparenteser, hakparenteser och parenteser vid hover',
    'Default Content' => 'Standardinnehåll',
    'Default Value' => 'Standardvärde',
    'Default code to populate the field with (optional)' => 'Standardkod att fylla fältet med (valfritt)',
    'Available Languages (Optional)' => 'Tillgängliga språk (Valfritt)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Åsidosätt tillgängliga språk för det här fältet (lämna tomt för att använda plugin-standardvärden)',
    'Field default language (always included)' => 'Fältets standardspråk (alltid inkluderat)',
    '(field default)' => '(fältstandard)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => '{count, number} {count, plural, =1{fel} other{fel}} hittades',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'Detta åsidosätts av inställningen <code>defaultTheme</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'Detta åsidosätts av inställningen <code>defaultLanguage</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'Detta åsidosätts av inställningen <code>defaultFontSize</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'Detta åsidosätts av inställningen <code>fontFamily</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'Detta åsidosätts av inställningen <code>enableLineNumbers</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'Detta åsidosätts av inställningen <code>enableCopyButton</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'Detta åsidosätts av inställningen <code>enableMatchBraces</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'Detta åsidosätts av inställningen <code>enableInlineColor</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'Detta åsidosätts av inställningen <code>availableLanguages</code> i <code>config/code-highlighter.php</code>.',
];
