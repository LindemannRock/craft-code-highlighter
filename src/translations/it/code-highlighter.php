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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Gestire le impostazioni di Prism.js e il comportamento dei campi codice dall\'area impostazioni del plugin.',
    'Open Code Highlighter' => 'Apri Code Highlighter',

    // Settings: General
    'General' => 'Generale',
    'Theme' => 'Tema',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Tema Prism per l\'evidenziazione della sintassi (può essere sovrascritto per pagina usando craft.codeHighlighter.setTheme())',
    'Default Language' => 'Lingua predefinita',
    'Default language for new Code Highlighter fields' => 'Lingua predefinita per i nuovi campi Code Highlighter',
    'Default Font Size' => 'Dimensione font predefinita',
    'Default font size for new Code Highlighter fields' => 'Dimensione font predefinita per i nuovi campi Code Highlighter',
    '8px - Tiny' => '8px - Minuscolo',
    '10px - Very Small' => '10px - Molto piccolo',
    '12px - Small' => '12px - Piccolo',
    '14px - Normal' => '14px - Normale',
    '16px - Medium' => '16px - Medio',
    '18px - Large' => '18px - Grande',
    '20px - Very Large' => '20px - Molto grande',
    '24px - Huge' => '24px - Enorme',
    'Font Family (Optional)' => 'Famiglia font (Facoltativo)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Famiglia font personalizzata per i blocchi di codice (lasciare vuoto per usare il predefinito del tema)',
    'e.g., JetBrains Mono, Fira Code, monospace' => 'es. JetBrains Mono, Fira Code, monospace',
    'Enable Line Numbers' => 'Abilita numeri di riga',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Mostrare i numeri di riga nei blocchi di codice frontend per impostazione predefinita (può essere sovrascritto per campo)',
    'Enable Copy Button' => 'Abilita pulsante Copy',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'Aggiungere il pulsante «Copy» ai blocchi di codice frontend per impostazione predefinita (può essere sovrascritto per blocco tramite le opzioni di rendering)',
    'Enable Match Braces' => 'Abilita corrispondenza parentesi',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Evidenziare le parentesi quadre, graffe e tonde corrispondenti al passaggio del mouse (può essere sovrascritto per blocco tramite le opzioni di rendering)',
    'Enable Inline Color' => 'Abilita colore inline',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Mostrare anteprime colore inline accanto ai valori di colore CSS (hex, rgb, colori con nome). Si applica a tutti i blocchi di codice della pagina quando abilitato.',
    'Available Languages' => 'Lingue disponibili',
    'Select languages available in field settings dropdowns' => 'Selezionare le lingue disponibili nei menu a discesa delle impostazioni del campo',
    'Default language (always included)' => 'Lingua predefinita (sempre inclusa)',
    '(default)' => '(predefinito)',

    // Settings: Field
    'Language' => 'Lingua',
    'Default language for this field (must be enabled in Available Languages below)' => 'Lingua predefinita per questo campo (deve essere abilitata in Lingue disponibili qui sotto)',
    'Show Language Dropdown' => 'Mostra menu lingua',
    'Show language switcher dropdown in the editor' => 'Mostrare il menu a discesa per la selezione della lingua nell\'editor',
    'Editor' => 'Editor',
    'Rows' => 'Righe',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Numero di righe visibili nell\'editor del campo (1 riga = 21px)',
    'Tab Width' => 'Larghezza tabulazione',
    'Number of spaces per tab character' => 'Numero di spazi per carattere di tabulazione',
    'Font Size' => 'Dimensione font',
    'Font size for the field editor' => 'Dimensione font per l\'editor del campo',
    'Use Plugin Default ({value})' => 'Usa il predefinito del plugin ({value})',
    'Word Wrap' => 'A capo automatico',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Mandare a capo le righe lunghe invece di scorrere orizzontalmente. Può influire sulla leggibilità del codice e sull\'allineamento dei numeri di riga.',
    'Frontend Output' => 'Output frontend',
    'Line Numbers' => 'Numeri di riga',
    'Show line numbers in frontend code blocks' => 'Mostrare i numeri di riga nei blocchi di codice frontend',
    'On' => 'Attivo',
    'Off' => 'Inattivo',
    'Copy Button' => 'Pulsante Copy',
    'Show copy-to-clipboard button on frontend code blocks' => 'Mostrare il pulsante copia negli appunti sui blocchi di codice frontend',
    'Match Braces' => 'Corrispondenza parentesi',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Evidenziare le parentesi graffe, quadre e tonde corrispondenti al passaggio del mouse',
    'Default Content' => 'Contenuto predefinito',
    'Default Value' => 'Valore predefinito',
    'Default code to populate the field with (optional)' => 'Codice predefinito con cui popolare il campo (facoltativo)',
    'Available Languages (Optional)' => 'Lingue disponibili (Facoltativo)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Sovrascrivere le lingue disponibili per questo campo (lasciare vuoto per usare i valori predefiniti del plugin)',
    'Field default language (always included)' => 'Lingua predefinita del campo (sempre inclusa)',
    '(field default)' => '(predefinito campo)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => '{count, number} {count, plural, =1{errore trovato} other{errori trovati}}',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'Viene sovrascritta dall\'impostazione <code>defaultTheme</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'Viene sovrascritta dall\'impostazione <code>defaultLanguage</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'Viene sovrascritta dall\'impostazione <code>defaultFontSize</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'Viene sovrascritta dall\'impostazione <code>fontFamily</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'Viene sovrascritta dall\'impostazione <code>enableLineNumbers</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'Viene sovrascritta dall\'impostazione <code>enableCopyButton</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'Viene sovrascritta dall\'impostazione <code>enableMatchBraces</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'Viene sovrascritta dall\'impostazione <code>enableInlineColor</code> in <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'Viene sovrascritta dall\'impostazione <code>availableLanguages</code> in <code>config/code-highlighter.php</code>.',
];
