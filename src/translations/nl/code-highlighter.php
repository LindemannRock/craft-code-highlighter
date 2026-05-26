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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Beheer Prism.js-instellingen en het gedrag van codevelden vanuit het instellingengebied van de plugin.',
    'Open Code Highlighter' => 'Code Highlighter openen',

    // Settings: General
    'General' => 'Algemeen',
    'Theme' => 'Thema',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Prism-thema voor syntaxismarkering (kan per pagina worden overschreven met craft.codeHighlighter.setTheme())',
    'Default Language' => 'Standaardtaal',
    'Default language for new Code Highlighter fields' => 'Standaardtaal voor nieuwe Code Highlighter-velden',
    'Default Font Size' => 'Standaard lettergrootte',
    'Default font size for new Code Highlighter fields' => 'Standaard lettergrootte voor nieuwe Code Highlighter-velden',
    'Font Family (Optional)' => 'Lettertype (Optioneel)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Aangepaste lettertypefamilie voor codeblokken (leeg laten om het standaard thema te gebruiken)',
    'Enable Line Numbers' => 'Regelnummers inschakelen',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Regelnummers standaard weergeven in frontend-codeblokken (kan per veld worden overschreven)',
    'Enable Copy Button' => 'Copy-knop inschakelen',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'Standaard een „Copy"-knop toevoegen aan frontend-codeblokken (kan per blok worden overschreven via renderopties)',
    'Enable Match Braces' => 'Overeenkomende haakjes inschakelen',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Overeenkomende haakjes, accolades en ronde haakjes markeren bij aanwijzen (kan per blok worden overschreven via renderopties)',
    'Enable Inline Color' => 'Inline kleuren inschakelen',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Inline kleurvoorbeelden weergeven naast CSS-kleurwaarden (hex, rgb, benoemde kleuren). Geldt voor alle codeblokken op de pagina wanneer ingeschakeld.',
    'Available Languages' => 'Beschikbare talen',
    'Select languages available in field settings dropdowns' => 'Talen selecteren die beschikbaar zijn in de dropdowns van veldinstellingen',
    'Default language (always included)' => 'Standaardtaal (altijd inbegrepen)',
    '(default)' => '(standaard)',

    // Settings: Field
    'Language' => 'Taal',
    'Default language for this field (must be enabled in Available Languages below)' => 'Standaardtaal voor dit veld (moet zijn ingeschakeld in Beschikbare talen hieronder)',
    'Show Language Dropdown' => 'Taalkeuzemenu weergeven',
    'Show language switcher dropdown in the editor' => 'Dropdown voor taalwisseling weergeven in de editor',
    'Editor' => 'Editor',
    'Rows' => 'Rijen',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Aantal zichtbare rijen in de veldeditor (1 rij = 21px)',
    'Tab Width' => 'Tabbreedte',
    'Number of spaces per tab character' => 'Aantal spaties per tabulatorteken',
    'Font Size' => 'Lettergrootte',
    'Font size for the field editor' => 'Lettergrootte voor de veldeditor',
    'Word Wrap' => 'Woordafbreking',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Lange regels ombreken in plaats van horizontaal scrollen. Kan de leesbaarheid van code en de uitlijning van regelnummers beïnvloeden.',
    'Frontend Output' => 'Frontend-uitvoer',
    'Line Numbers' => 'Regelnummers',
    'Show line numbers in frontend code blocks' => 'Regelnummers weergeven in frontend-codeblokken',
    'On' => 'Aan',
    'Off' => 'Uit',
    'Copy Button' => 'Copy-knop',
    'Show copy-to-clipboard button on frontend code blocks' => 'Kopiëren naar klembord-knop weergeven op frontend-codeblokken',
    'Match Braces' => 'Overeenkomende haakjes',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Overeenkomende accolades, haakjes en ronde haakjes markeren bij aanwijzen',
    'Default Content' => 'Standaardinhoud',
    'Default Value' => 'Standaardwaarde',
    'Default code to populate the field with (optional)' => 'Standaardcode om het veld mee te vullen (optioneel)',
    'Available Languages (Optional)' => 'Beschikbare talen (Optioneel)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Beschikbare talen voor dit veld overschrijven (leeg laten om plugin-standaardinstellingen te gebruiken)',
    'Field default language (always included)' => 'Standaardtaal van het veld (altijd inbegrepen)',
    '(field default)' => '(veldstandaard)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => '{count, number} {count, plural, =1{fout} other{fouten}} gevonden',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'Dit wordt overschreven door de instelling <code>defaultTheme</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'Dit wordt overschreven door de instelling <code>defaultLanguage</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'Dit wordt overschreven door de instelling <code>defaultFontSize</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'Dit wordt overschreven door de instelling <code>fontFamily</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'Dit wordt overschreven door de instelling <code>enableLineNumbers</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'Dit wordt overschreven door de instelling <code>enableCopyButton</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'Dit wordt overschreven door de instelling <code>enableMatchBraces</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'Dit wordt overschreven door de instelling <code>enableInlineColor</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'Dit wordt overschreven door de instelling <code>availableLanguages</code> in <code>config/code-highlighter.php</code>.',
];
