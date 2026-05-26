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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Administrer Prism.js-indstillinger og adfærden for kodefelter fra plugin-indstillingsområdet.',
    'Open Code Highlighter' => 'Åbn Code Highlighter',

    // Settings: General
    'General' => 'Generelt',
    'Theme' => 'Tema',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Prism-tema til syntaksfremhævning (kan tilsidesættes per side med craft.codeHighlighter.setTheme())',
    'Default Language' => 'Standardsprog',
    'Default language for new Code Highlighter fields' => 'Standardsprog for nye Code Highlighter-felter',
    'Default Font Size' => 'Standardskriftstørrelse',
    'Default font size for new Code Highlighter fields' => 'Standardskriftstørrelse for nye Code Highlighter-felter',
    'Font Family (Optional)' => 'Skrifttype (Valgfrit)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Brugerdefineret skrifttype til kodeblokke (lad tomt for at bruge temaets standard)',
    'Enable Line Numbers' => 'Aktiver linjenumre',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Vis linjenumre i frontend-kodeblokke som standard (kan tilsidesættes per felt)',
    'Enable Copy Button' => 'Aktiver Copy-knap',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'Tilføj „Copy"-knap til frontend-kodeblokke som standard (kan tilsidesættes per blok via renderingsindstillinger)',
    'Enable Match Braces' => 'Aktiver parentesmatchning',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Fremhæv matchende kantede parenteser, tuborg-parenteser og runde parenteser ved hover (kan tilsidesættes per blok via renderingsindstillinger)',
    'Enable Inline Color' => 'Aktiver inline-farve',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Vis inline farveforhåndsvisninger ved siden af CSS-farveværdier (hex, rgb, navngivne farver). Gælder alle kodeblokke på siden, når aktiveret.',
    'Available Languages' => 'Tilgængelige sprog',
    'Select languages available in field settings dropdowns' => 'Vælg sprog, der er tilgængelige i feltindstillingernes rullemenuer',
    'Default language (always included)' => 'Standardsprog (altid inkluderet)',
    '(default)' => '(standard)',

    // Settings: Field
    'Language' => 'Sprog',
    'Default language for this field (must be enabled in Available Languages below)' => 'Standardsprog for dette felt (skal være aktiveret under Tilgængelige sprog nedenfor)',
    'Show Language Dropdown' => 'Vis sprogliste',
    'Show language switcher dropdown in the editor' => 'Vis rullemenu til sprogskift i editoren',
    'Editor' => 'Editor',
    'Rows' => 'Rækker',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Antal synlige rækker i feltets editor (1 række = 21px)',
    'Tab Width' => 'Tabbredde',
    'Number of spaces per tab character' => 'Antal mellemrum per tabulatortegn',
    'Font Size' => 'Skriftstørrelse',
    'Font size for the field editor' => 'Skriftstørrelse for feltets editor',
    'Word Wrap' => 'Tekstombrydning',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Ombryd lange linjer i stedet for vandret rulning. Kan påvirke kodens læsbarhed og linjenummerenes justering.',
    'Frontend Output' => 'Frontend-output',
    'Line Numbers' => 'Linjenumre',
    'Show line numbers in frontend code blocks' => 'Vis linjenumre i frontend-kodeblokke',
    'On' => 'Til',
    'Off' => 'Fra',
    'Copy Button' => 'Copy-knap',
    'Show copy-to-clipboard button on frontend code blocks' => 'Vis kopier-til-udklipsholder-knap på frontend-kodeblokke',
    'Match Braces' => 'Parentesmatchning',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Fremhæv matchende tuborg-parenteser, kantede parenteser og runde parenteser ved hover',
    'Default Content' => 'Standardindhold',
    'Default Value' => 'Standardværdi',
    'Default code to populate the field with (optional)' => 'Standardkode til udfyldning af feltet (valgfrit)',
    'Available Languages (Optional)' => 'Tilgængelige sprog (Valgfrit)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Tilsidesæt tilgængelige sprog for dette felt (lad tomt for at bruge plugin-standardindstillingerne)',
    'Field default language (always included)' => 'Feltets standardsprog (altid inkluderet)',
    '(field default)' => '(feltstandard)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => '{count, number} {count, plural, =1{fejl} other{fejl}} fundet',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette tilsidesættes af indstillingen <code>defaultTheme</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette tilsidesættes af indstillingen <code>defaultLanguage</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette tilsidesættes af indstillingen <code>defaultFontSize</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette tilsidesættes af indstillingen <code>fontFamily</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette tilsidesættes af indstillingen <code>enableLineNumbers</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette tilsidesættes af indstillingen <code>enableCopyButton</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette tilsidesættes af indstillingen <code>enableMatchBraces</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette tilsidesættes af indstillingen <code>enableInlineColor</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette tilsidesættes af indstillingen <code>availableLanguages</code> i <code>config/code-highlighter.php</code>.',
];
