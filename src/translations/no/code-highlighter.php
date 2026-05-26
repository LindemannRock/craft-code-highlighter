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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Administrer Prism.js-innstillinger og oppførselen til kodefelter fra plugin-innstillingsområdet.',
    'Open Code Highlighter' => 'Åpne Code Highlighter',

    // Settings: General
    'General' => 'Generelt',
    'Theme' => 'Tema',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Prism-tema for syntaksmarkering (kan overstyres per side med craft.codeHighlighter.setTheme())',
    'Default Language' => 'Standardspråk',
    'Default language for new Code Highlighter fields' => 'Standardspråk for nye Code Highlighter-felter',
    'Default Font Size' => 'Standard skriftstørrelse',
    'Default font size for new Code Highlighter fields' => 'Standard skriftstørrelse for nye Code Highlighter-felter',
    '8px - Tiny' => '8px - Bitteliten',
    '10px - Very Small' => '10px - Veldig liten',
    '12px - Small' => '12px - Liten',
    '14px - Normal' => '14px - Normal',
    '16px - Medium' => '16px - Middels',
    '18px - Large' => '18px - Stor',
    '20px - Very Large' => '20px - Veldig stor',
    '24px - Huge' => '24px - Enorm',
    'Font Family (Optional)' => 'Skriftfamilie (Valgfritt)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Egendefinert skriftfamilie for kodeblokker (la tomt for å bruke temaets standard)',
    'e.g., JetBrains Mono, Fira Code, monospace' => 'f.eks. JetBrains Mono, Fira Code, monospace',
    'Enable Line Numbers' => 'Aktiver linjenumre',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Vis linjenumre i frontend-kodeblokker som standard (kan overstyres per felt)',
    'Enable Copy Button' => 'Aktiver Copy-knapp',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'Legg til «Copy»-knapp i frontend-kodeblokker som standard (kan overstyres per blokk via gjengivelsesalternativer)',
    'Enable Match Braces' => 'Aktiver parentesmatchning',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Fremhev matchende hakeparenteser, klammeparenteser og runde parenteser ved hover (kan overstyres per blokk via gjengivelsesalternativer)',
    'Enable Inline Color' => 'Aktiver innebygd farge',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Vis innebygde fargeforhåndsvisninger ved siden av CSS-fargerverdier (hex, rgb, navngitte farger). Gjelder alle kodeblokker på siden når aktivert.',
    'Available Languages' => 'Tilgjengelige språk',
    'Select languages available in field settings dropdowns' => 'Velg språk som er tilgjengelige i feltinnstillingenes rullegardinmenyer',
    'Default language (always included)' => 'Standardspråk (alltid inkludert)',
    '(default)' => '(standard)',

    // Settings: Field
    'Language' => 'Språk',
    'Default language for this field (must be enabled in Available Languages below)' => 'Standardspråk for dette feltet (må være aktivert under Tilgjengelige språk nedenfor)',
    'Show Language Dropdown' => 'Vis språkmeny',
    'Show language switcher dropdown in the editor' => 'Vis rullegardinmeny for språkbytte i editoren',
    'Editor' => 'Editor',
    'Rows' => 'Rader',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Antall synlige rader i feltets editor (1 rad = 21px)',
    'Tab Width' => 'Tabbredde',
    'Number of spaces per tab character' => 'Antall mellomrom per tabulatortegn',
    'Font Size' => 'Skriftstørrelse',
    'Font size for the field editor' => 'Skriftstørrelse for feltets editor',
    'Use Plugin Default ({value})' => 'Bruk plugin-standard ({value})',
    'Word Wrap' => 'Tekstbryting',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Bryt lange linjer i stedet for horisontal rulling. Kan påvirke kodens lesbarhet og justering av linjenumre.',
    'Frontend Output' => 'Frontend-utdata',
    'Line Numbers' => 'Linjenumre',
    'Show line numbers in frontend code blocks' => 'Vis linjenumre i frontend-kodeblokker',
    'On' => 'På',
    'Off' => 'Av',
    'Copy Button' => 'Copy-knapp',
    'Show copy-to-clipboard button on frontend code blocks' => 'Vis kopier-til-utklippstavle-knapp på frontend-kodeblokker',
    'Match Braces' => 'Parentesmatchning',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Fremhev matchende klammeparenteser, hakeparenteser og runde parenteser ved hover',
    'Default Content' => 'Standardinnhold',
    'Default Value' => 'Standardverdi',
    'Default code to populate the field with (optional)' => 'Standardkode for å fylle ut feltet (valgfritt)',
    'Available Languages (Optional)' => 'Tilgjengelige språk (Valgfritt)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Overstyr tilgjengelige språk for dette feltet (la tomt for å bruke plugin-standardinnstillingene)',
    'Field default language (always included)' => 'Feltets standardspråk (alltid inkludert)',
    '(field default)' => '(feltstandard)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => '{count, number} {count, plural, =1{feil} other{feil}} funnet',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette overstyres av innstillingen <code>defaultTheme</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette overstyres av innstillingen <code>defaultLanguage</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette overstyres av innstillingen <code>defaultFontSize</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette overstyres av innstillingen <code>fontFamily</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette overstyres av innstillingen <code>enableLineNumbers</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette overstyres av innstillingen <code>enableCopyButton</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette overstyres av innstillingen <code>enableMatchBraces</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette overstyres av innstillingen <code>enableInlineColor</code> i <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'Dette overstyres av innstillingen <code>availableLanguages</code> i <code>config/code-highlighter.php</code>.',
];
