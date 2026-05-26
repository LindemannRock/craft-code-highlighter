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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Prism.js-Einstellungen und das Verhalten von Code-Feldern im Plugin-Einstellungsbereich verwalten.',
    'Open Code Highlighter' => 'Code Highlighter öffnen',

    // Settings: General
    'General' => 'Allgemein',
    'Theme' => 'Theme',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Prism-Theme für Syntaxhervorhebung (kann pro Seite mit craft.codeHighlighter.setTheme() überschrieben werden)',
    'Default Language' => 'Standardsprache',
    'Default language for new Code Highlighter fields' => 'Standardsprache für neue Code Highlighter-Felder',
    'Default Font Size' => 'Standard-Schriftgröße',
    'Default font size for new Code Highlighter fields' => 'Standard-Schriftgröße für neue Code Highlighter-Felder',
    '8px - Tiny' => '8px - Winzig',
    '10px - Very Small' => '10px - Sehr klein',
    '12px - Small' => '12px - Klein',
    '14px - Normal' => '14px - Normal',
    '16px - Medium' => '16px - Mittel',
    '18px - Large' => '18px - Groß',
    '20px - Very Large' => '20px - Sehr groß',
    '24px - Huge' => '24px - Riesig',
    'Font Family (Optional)' => 'Schriftfamilie (Optional)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Benutzerdefinierte Schriftfamilie für Code-Blöcke (leer lassen, um den Theme-Standard zu verwenden)',
    'e.g., JetBrains Mono, Fira Code, monospace' => 'z. B. JetBrains Mono, Fira Code, monospace',
    'Enable Line Numbers' => 'Zeilennummern aktivieren',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Zeilennummern in Frontend-Code-Blöcken standardmäßig anzeigen (kann pro Feld überschrieben werden)',
    'Enable Copy Button' => 'Copy-Schaltfläche aktivieren',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => '„Copy"-Schaltfläche standardmäßig zu Frontend-Code-Blöcken hinzufügen (kann pro Block über Render-Optionen überschrieben werden)',
    'Enable Match Braces' => 'Klammermarkierung aktivieren',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Passende Klammern, geschweifte Klammern und runde Klammern beim Hover hervorheben (kann pro Block über Render-Optionen überschrieben werden)',
    'Enable Inline Color' => 'Inline-Farbe aktivieren',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Inline-Farbvorschauen neben CSS-Farbwerten anzeigen (hex, rgb, benannte Farben). Gilt für alle Code-Blöcke auf der Seite, wenn aktiviert.',
    'Available Languages' => 'Verfügbare Sprachen',
    'Select languages available in field settings dropdowns' => 'Sprachen auswählen, die in den Feld-Einstellungs-Dropdowns verfügbar sind',
    'Default language (always included)' => 'Standardsprache (immer enthalten)',
    '(default)' => '(Standard)',

    // Settings: Field
    'Language' => 'Sprache',
    'Default language for this field (must be enabled in Available Languages below)' => 'Standardsprache für dieses Feld (muss unter „Verfügbare Sprachen" aktiviert sein)',
    'Show Language Dropdown' => 'Sprachauswahl anzeigen',
    'Show language switcher dropdown in the editor' => 'Sprachauswahl-Dropdown im Editor anzeigen',
    'Editor' => 'Editor',
    'Rows' => 'Zeilen',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Anzahl der sichtbaren Zeilen im Feld-Editor (1 Zeile = 21px)',
    'Tab Width' => 'Tab-Breite',
    'Number of spaces per tab character' => 'Anzahl der Leerzeichen pro Tabulatorzeichen',
    'Font Size' => 'Schriftgröße',
    'Font size for the field editor' => 'Schriftgröße für den Feld-Editor',
    'Use Plugin Default ({value})' => 'Plugin-Standard verwenden ({value})',
    'Word Wrap' => 'Zeilenumbruch',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Lange Zeilen umbrechen statt horizontal zu scrollen. Kann die Lesbarkeit des Codes und die Ausrichtung der Zeilennummern beeinflussen.',
    'Frontend Output' => 'Frontend-Ausgabe',
    'Line Numbers' => 'Zeilennummern',
    'Show line numbers in frontend code blocks' => 'Zeilennummern in Frontend-Code-Blöcken anzeigen',
    'On' => 'An',
    'Off' => 'Aus',
    'Copy Button' => 'Copy-Schaltfläche',
    'Show copy-to-clipboard button on frontend code blocks' => 'In-Zwischenablage-kopieren-Schaltfläche in Frontend-Code-Blöcken anzeigen',
    'Match Braces' => 'Klammermarkierung',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Passende geschweifte Klammern, eckige Klammern und runde Klammern beim Hover hervorheben',
    'Default Content' => 'Standardinhalt',
    'Default Value' => 'Standardwert',
    'Default code to populate the field with (optional)' => 'Standardcode zum Befüllen des Feldes (optional)',
    'Available Languages (Optional)' => 'Verfügbare Sprachen (Optional)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Verfügbare Sprachen für dieses Feld überschreiben (leer lassen, um Plugin-Standardwerte zu verwenden)',
    'Field default language (always included)' => 'Standard-Feldsprache (immer enthalten)',
    '(field default)' => '(Feld-Standard)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => 'Es wurde {count, number} {count, plural, =1{Fehler} other{Fehler}} gefunden',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'Dies wird durch die Einstellung <code>defaultTheme</code> in <code>config/code-highlighter.php</code> überschrieben.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'Dies wird durch die Einstellung <code>defaultLanguage</code> in <code>config/code-highlighter.php</code> überschrieben.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'Dies wird durch die Einstellung <code>defaultFontSize</code> in <code>config/code-highlighter.php</code> überschrieben.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'Dies wird durch die Einstellung <code>fontFamily</code> in <code>config/code-highlighter.php</code> überschrieben.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'Dies wird durch die Einstellung <code>enableLineNumbers</code> in <code>config/code-highlighter.php</code> überschrieben.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'Dies wird durch die Einstellung <code>enableCopyButton</code> in <code>config/code-highlighter.php</code> überschrieben.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'Dies wird durch die Einstellung <code>enableMatchBraces</code> in <code>config/code-highlighter.php</code> überschrieben.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'Dies wird durch die Einstellung <code>enableInlineColor</code> in <code>config/code-highlighter.php</code> überschrieben.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'Dies wird durch die Einstellung <code>availableLanguages</code> in <code>config/code-highlighter.php</code> überschrieben.',
];
