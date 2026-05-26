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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Gestione la configuración de Prism.js y el comportamiento de los campos de código desde el área de configuración del plugin.',
    'Open Code Highlighter' => 'Abrir Code Highlighter',

    // Settings: General
    'General' => 'General',
    'Theme' => 'Tema',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Tema Prism para resaltado de sintaxis (puede anularse por página usando craft.codeHighlighter.setTheme())',
    'Default Language' => 'Idioma predeterminado',
    'Default language for new Code Highlighter fields' => 'Idioma predeterminado para los nuevos campos de Code Highlighter',
    'Default Font Size' => 'Tamaño de fuente predeterminado',
    'Default font size for new Code Highlighter fields' => 'Tamaño de fuente predeterminado para los nuevos campos de Code Highlighter',
    '8px - Tiny' => '8px - Diminuto',
    '10px - Very Small' => '10px - Muy pequeño',
    '12px - Small' => '12px - Pequeño',
    '14px - Normal' => '14px - Normal',
    '16px - Medium' => '16px - Mediano',
    '18px - Large' => '18px - Grande',
    '20px - Very Large' => '20px - Muy grande',
    '24px - Huge' => '24px - Enorme',
    'Font Family (Optional)' => 'Familia de fuentes (Opcional)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Familia de fuentes personalizada para bloques de código (dejar vacío para usar el tema predeterminado)',
    'e.g., JetBrains Mono, Fira Code, monospace' => 'p. ej., JetBrains Mono, Fira Code, monospace',
    'Enable Line Numbers' => 'Activar números de línea',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Mostrar números de línea en bloques de código del frontend de forma predeterminada (puede anularse por campo)',
    'Enable Copy Button' => 'Activar botón Copy',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'Añadir botón «Copy» a los bloques de código del frontend de forma predeterminada (puede anularse por bloque a través de las opciones de renderizado)',
    'Enable Match Braces' => 'Activar coincidencia de llaves',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Resaltar corchetes, llaves y paréntesis coincidentes al pasar el cursor (puede anularse por bloque a través de las opciones de renderizado)',
    'Enable Inline Color' => 'Activar color en línea',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Mostrar vistas previas de colores en línea junto a los valores de color CSS (hex, rgb, colores con nombre). Se aplica a todos los bloques de código de la página cuando está activado.',
    'Available Languages' => 'Idiomas disponibles',
    'Select languages available in field settings dropdowns' => 'Seleccionar los idiomas disponibles en los menús desplegables de configuración de campos',
    'Default language (always included)' => 'Idioma predeterminado (siempre incluido)',
    '(default)' => '(predeterminado)',

    // Settings: Field
    'Language' => 'Idioma',
    'Default language for this field (must be enabled in Available Languages below)' => 'Idioma predeterminado para este campo (debe estar activado en Idiomas disponibles a continuación)',
    'Show Language Dropdown' => 'Mostrar menú de idioma',
    'Show language switcher dropdown in the editor' => 'Mostrar menú desplegable de selección de idioma en el editor',
    'Editor' => 'Editor',
    'Rows' => 'Filas',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Número de filas visibles en el editor de campos (1 fila = 21px)',
    'Tab Width' => 'Anchura del tabulador',
    'Number of spaces per tab character' => 'Número de espacios por carácter de tabulación',
    'Font Size' => 'Tamaño de fuente',
    'Font size for the field editor' => 'Tamaño de fuente para el editor de campos',
    'Use Plugin Default ({value})' => 'Usar el predeterminado del plugin ({value})',
    'Word Wrap' => 'Ajuste de línea',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Ajustar las líneas largas en lugar de desplazarse horizontalmente. Puede afectar la legibilidad del código y la alineación de los números de línea.',
    'Frontend Output' => 'Salida de frontend',
    'Line Numbers' => 'Números de línea',
    'Show line numbers in frontend code blocks' => 'Mostrar números de línea en bloques de código del frontend',
    'On' => 'Activado',
    'Off' => 'Desactivado',
    'Copy Button' => 'Botón Copy',
    'Show copy-to-clipboard button on frontend code blocks' => 'Mostrar botón de copiar al portapapeles en bloques de código del frontend',
    'Match Braces' => 'Coincidencia de llaves',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Resaltar llaves, corchetes y paréntesis coincidentes al pasar el cursor',
    'Default Content' => 'Contenido predeterminado',
    'Default Value' => 'Valor predeterminado',
    'Default code to populate the field with (optional)' => 'Código predeterminado para rellenar el campo (opcional)',
    'Available Languages (Optional)' => 'Idiomas disponibles (Opcional)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Anular los idiomas disponibles para este campo (dejar vacío para usar los valores predeterminados del plugin)',
    'Field default language (always included)' => 'Idioma predeterminado del campo (siempre incluido)',
    '(field default)' => '(predeterminado del campo)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => '{count, number} {count, plural, =1{error encontrado} other{errores encontrados}}',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'Esto está siendo anulado por el ajuste <code>defaultTheme</code> en <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'Esto está siendo anulado por el ajuste <code>defaultLanguage</code> en <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'Esto está siendo anulado por el ajuste <code>defaultFontSize</code> en <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'Esto está siendo anulado por el ajuste <code>fontFamily</code> en <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'Esto está siendo anulado por el ajuste <code>enableLineNumbers</code> en <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'Esto está siendo anulado por el ajuste <code>enableCopyButton</code> en <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'Esto está siendo anulado por el ajuste <code>enableMatchBraces</code> en <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'Esto está siendo anulado por el ajuste <code>enableInlineColor</code> en <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'Esto está siendo anulado por el ajuste <code>availableLanguages</code> en <code>config/code-highlighter.php</code>.',
];
