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
    'Manage Prism.js settings and code field behavior from the plugin settings area.' => 'プラグインの設定エリアから Prism.js の設定とコードフィールドの動作を管理します。',
    'Open Code Highlighter' => 'Code Highlighter を開く',

    // Settings: General
    'General' => '一般',
    'Theme' => 'テーマ',
    'Prism theme for syntax highlighting (can be overridden per page using craft.codeHighlighter.setTheme())' => 'シンタックスハイライト用の Prism テーマ（craft.codeHighlighter.setTheme() を使用してページごとに上書きできます）',
    'Default Language' => 'デフォルト言語',
    'Default language for new Code Highlighter fields' => '新しい Code Highlighter フィールドのデフォルト言語',
    'Default Font Size' => 'デフォルトフォントサイズ',
    'Default font size for new Code Highlighter fields' => '新しい Code Highlighter フィールドのデフォルトフォントサイズ',
    '8px - Tiny' => '8px - 極小',
    '10px - Very Small' => '10px - 特小',
    '12px - Small' => '12px - 小',
    '14px - Normal' => '14px - 標準',
    '16px - Medium' => '16px - 中',
    '18px - Large' => '18px - 大',
    '20px - Very Large' => '20px - 特大',
    '24px - Huge' => '24px - 巨大',
    'Font Family (Optional)' => 'フォントファミリー（オプション）',
    'Custom font family for code blocks (leave empty to use theme default)' => 'コードブロック用のカスタムフォントファミリー（テーマのデフォルトを使用する場合は空のままにしてください）',
    'e.g., JetBrains Mono, Fira Code, monospace' => '例: JetBrains Mono、Fira Code、monospace',
    'Enable Line Numbers' => '行番号を有効にする',
    'Show line numbers in frontend code blocks by default (can be overridden per field)' => 'フロントエンドのコードブロックにデフォルトで行番号を表示します（フィールドごとに上書きできます）',
    'Enable Copy Button' => 'Copy ボタンを有効にする',
    'Add "Copy" button to frontend code blocks by default (can be overridden per block via render options)' => 'フロントエンドのコードブロックにデフォルトで「Copy」ボタンを追加します（レンダーオプションでブロックごとに上書きできます）',
    'Enable Match Braces' => '括弧の対応を有効にする',
    'Highlight matching brackets, braces, and parentheses on hover (can be overridden per block via render options)' => 'ホバー時に対応する角括弧、波括弧、丸括弧をハイライト表示します（レンダーオプションでブロックごとに上書きできます）',
    'Enable Inline Color' => 'インラインカラーを有効にする',
    'Show inline color previews next to CSS color values (hex, rgb, named colors). Applies to all code blocks on the page when enabled.' => 'CSS カラー値（hex、rgb、色名）の横にインラインカラープレビューを表示します。有効にすると、ページ上のすべてのコードブロックに適用されます。',
    'Available Languages' => '利用可能な言語',
    'Select languages available in field settings dropdowns' => 'フィールド設定のドロップダウンで利用可能な言語を選択します',
    'Default language (always included)' => 'デフォルト言語（常に含まれます）',
    '(default)' => '（デフォルト）',

    // Settings: Field
    'Language' => '言語',
    'Default language for this field (must be enabled in Available Languages below)' => 'このフィールドのデフォルト言語（下の利用可能な言語で有効にする必要があります）',
    'Show Language Dropdown' => '言語ドロップダウンを表示する',
    'Show language switcher dropdown in the editor' => 'エディタに言語切替ドロップダウンを表示します',
    'Editor' => 'エディタ',
    'Rows' => '行数',
    'Number of visible rows in the field editor (1 row = 21px)' => 'フィールドエディタに表示する行数（1 行 = 21px）',
    'Tab Width' => 'タブ幅',
    'Number of spaces per tab character' => 'タブ文字あたりのスペース数',
    'Font Size' => 'フォントサイズ',
    'Font size for the field editor' => 'フィールドエディタのフォントサイズ',
    'Use Plugin Default ({value})' => 'プラグインのデフォルトを使用する ({value})',
    'Word Wrap' => '折り返し',
    'Wrap long lines instead of horizontal scrolling. May affect code readability and line number alignment.' => '水平スクロールの代わりに長い行を折り返します。コードの可読性や行番号の配置に影響する場合があります。',
    'Frontend Output' => 'フロントエンド出力',
    'Line Numbers' => '行番号',
    'Show line numbers in frontend code blocks' => 'フロントエンドのコードブロックに行番号を表示します',
    'On' => 'オン',
    'Off' => 'オフ',
    'Copy Button' => 'Copy ボタン',
    'Show copy-to-clipboard button on frontend code blocks' => 'フロントエンドのコードブロックにクリップボードへのコピーボタンを表示します',
    'Match Braces' => '括弧の対応',
    'Highlight matching braces, brackets, and parentheses on hover' => 'ホバー時に対応する波括弧、角括弧、丸括弧をハイライト表示します',
    'Default Content' => 'デフォルトコンテンツ',
    'Default Value' => 'デフォルト値',
    'Default code to populate the field with (optional)' => 'フィールドに入力するデフォルトコード（オプション）',
    'Available Languages (Optional)' => '利用可能な言語（オプション）',
    'Override available languages for this field (leave empty to use plugin defaults)' => 'このフィールドの利用可能な言語を上書きします（プラグインのデフォルトを使用する場合は空のままにしてください）',
    'Field default language (always included)' => 'フィールドのデフォルト言語（常に含まれます）',
    '(field default)' => '（フィールドのデフォルト）',

    // Base partials (error-summary)
    'Found {count, number} {count, plural, =1{error} other{errors}}' => '{count, number} 件の{count, plural, =1{エラー} other{エラー}}が見つかりました',

    // Config overrides
    'This is being overridden by the <code>defaultTheme</code> setting in <code>config/code-highlighter.php</code>.' => '<code>config/code-highlighter.php</code> の <code>defaultTheme</code> 設定によって上書きされています。',
    'This is being overridden by the <code>defaultLanguage</code> setting in <code>config/code-highlighter.php</code>.' => '<code>config/code-highlighter.php</code> の <code>defaultLanguage</code> 設定によって上書きされています。',
    'This is being overridden by the <code>defaultFontSize</code> setting in <code>config/code-highlighter.php</code>.' => '<code>config/code-highlighter.php</code> の <code>defaultFontSize</code> 設定によって上書きされています。',
    'This is being overridden by the <code>fontFamily</code> setting in <code>config/code-highlighter.php</code>.' => '<code>config/code-highlighter.php</code> の <code>fontFamily</code> 設定によって上書きされています。',
    'This is being overridden by the <code>enableLineNumbers</code> setting in <code>config/code-highlighter.php</code>.' => '<code>config/code-highlighter.php</code> の <code>enableLineNumbers</code> 設定によって上書きされています。',
    'This is being overridden by the <code>enableCopyButton</code> setting in <code>config/code-highlighter.php</code>.' => '<code>config/code-highlighter.php</code> の <code>enableCopyButton</code> 設定によって上書きされています。',
    'This is being overridden by the <code>enableMatchBraces</code> setting in <code>config/code-highlighter.php</code>.' => '<code>config/code-highlighter.php</code> の <code>enableMatchBraces</code> 設定によって上書きされています。',
    'This is being overridden by the <code>enableInlineColor</code> setting in <code>config/code-highlighter.php</code>.' => '<code>config/code-highlighter.php</code> の <code>enableInlineColor</code> 設定によって上書きされています。',
    'This is being overridden by the <code>availableLanguages</code> setting in <code>config/code-highlighter.php</code>.' => '<code>config/code-highlighter.php</code> の <code>availableLanguages</code> 設定によって上書きされています。',
];
