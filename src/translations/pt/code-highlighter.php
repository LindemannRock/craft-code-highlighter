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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'Gerir as definições do Prism.js e o comportamento dos campos de código a partir da área de definições do plugin.',
    'Open Code Highlighter' => 'Abrir Code Highlighter',

    // Settings: General
    'General' => 'Geral',
    'Theme' => 'Tema',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'Tema Prism para realce de sintaxe (pode ser substituído por página usando craft.codeHighlighter.setTheme())',
    'Default Language' => 'Idioma predefinido',
    'Default language for new Code Highlighter fields' => 'Idioma predefinido para novos campos Code Highlighter',
    'Default Font Size' => 'Tamanho de letra predefinido',
    'Default font size for new Code Highlighter fields' => 'Tamanho de letra predefinido para novos campos Code Highlighter',
    '8px - Tiny' => '8px - Minúsculo',
    '10px - Very Small' => '10px - Muito pequeno',
    '12px - Small' => '12px - Pequeno',
    '14px - Normal' => '14px - Normal',
    '16px - Medium' => '16px - Médio',
    '18px - Large' => '18px - Grande',
    '20px - Very Large' => '20px - Muito grande',
    '24px - Huge' => '24px - Enorme',
    'Font Family (Optional)' => 'Família de tipos de letra (Opcional)',
    'Custom font family for code blocks (leave empty to use theme default)' => 'Família de tipos de letra personalizada para blocos de código (deixar vazio para usar o padrão do tema)',
    'e.g., JetBrains Mono, Fira Code, monospace' => 'p. ex., JetBrains Mono, Fira Code, monospace',
    'Enable Line Numbers' => 'Ativar números de linha',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'Mostrar números de linha nos blocos de código do frontend por predefinição (pode ser substituído por campo)',
    'Enable Copy Button' => 'Ativar botão Copy',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'Adicionar botão «Copy» aos blocos de código do frontend por predefinição (pode ser substituído por bloco através das opções de renderização)',
    'Enable Match Braces' => 'Ativar correspondência de parênteses',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'Realçar parênteses retos, chavetas e parênteses curvos correspondentes ao passar o rato (pode ser substituído por bloco através das opções de renderização)',
    'Enable Inline Color' => 'Ativar cor inline',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'Mostrar pré-visualizações de cores inline junto aos valores de cor CSS (hex, rgb, cores com nome). Aplica-se a todos os blocos de código da página quando ativado.',
    'Available Languages' => 'Idiomas disponíveis',
    'Select languages available in field settings dropdowns' => 'Selecionar idiomas disponíveis nos menus pendentes de definições de campo',
    'Default language (always included)' => 'Idioma predefinido (sempre incluído)',
    '(default)' => '(predefinido)',

    // Settings: Field
    'Language' => 'Idioma',
    'Default language for this field (must be enabled in Available Languages below)' => 'Idioma predefinido para este campo (deve estar ativado em Idiomas disponíveis abaixo)',
    'Show Language Dropdown' => 'Mostrar menu de idioma',
    'Show language switcher dropdown in the editor' => 'Mostrar menu pendente de seleção de idioma no editor',
    'Editor' => 'Editor',
    'Rows' => 'Linhas',
    'Number of visible rows in the field editor (1 row = 21px)' => 'Número de linhas visíveis no editor de campo (1 linha = 21px)',
    'Tab Width' => 'Largura do tabulador',
    'Number of spaces per tab character' => 'Número de espaços por caráter de tabulação',
    'Font Size' => 'Tamanho de letra',
    'Font size for the field editor' => 'Tamanho de letra para o editor de campo',
    'Use Plugin Default ({value})' => 'Usar a predefinição do plugin ({value})',
    'Word Wrap' => 'Ajuste de linha',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => 'Ajustar linhas longas em vez de deslocamento horizontal. Pode afetar a legibilidade do código e o alinhamento dos números de linha.',
    'Frontend Output' => 'Saída do frontend',
    'Line Numbers' => 'Números de linha',
    'Show line numbers in frontend code blocks' => 'Mostrar números de linha nos blocos de código do frontend',
    'On' => 'Ativado',
    'Off' => 'Desativado',
    'Copy Button' => 'Botão Copy',
    'Show copy-to-clipboard button on frontend code blocks' => 'Mostrar botão copiar para a área de transferência nos blocos de código do frontend',
    'Match Braces' => 'Correspondência de parênteses',
    'Highlight matching braces, brackets, and parentheses on hover' => 'Realçar chavetas, parênteses retos e curvos correspondentes ao passar o rato',
    'Default Content' => 'Conteúdo predefinido',
    'Default Value' => 'Valor predefinido',
    'Default code to populate the field with (optional)' => 'Código predefinido para preencher o campo (opcional)',
    'Available Languages (Optional)' => 'Idiomas disponíveis (Opcional)',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'Substituir idiomas disponíveis para este campo (deixar vazio para usar as predefinições do plugin)',
    'Field default language (always included)' => 'Idioma predefinido do campo (sempre incluído)',
    '(field default)' => '(predefinido do campo)',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => '{count, number} {count, plural, =1{erro encontrado} other{erros encontrados}}',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => 'Esta definição está a ser substituída por <code>defaultTheme</code> em <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => 'Esta definição está a ser substituída por <code>defaultLanguage</code> em <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => 'Esta definição está a ser substituída por <code>defaultFontSize</code> em <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => 'Esta definição está a ser substituída por <code>fontFamily</code> em <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => 'Esta definição está a ser substituída por <code>enableLineNumbers</code> em <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => 'Esta definição está a ser substituída por <code>enableCopyButton</code> em <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => 'Esta definição está a ser substituída por <code>enableMatchBraces</code> em <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => 'Esta definição está a ser substituída por <code>enableInlineColor</code> em <code>config/code-highlighter.php</code>.',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => 'Esta definição está a ser substituída por <code>availableLanguages</code> em <code>config/code-highlighter.php</code>.',
];
