# Code Highlighter for Craft CMS

[![Latest Version](https://img.shields.io/packagist/v/lindemannrock/craft-code-highlighter.svg)](https://packagist.org/packages/lindemannrock/craft-code-highlighter)
[![Craft CMS](https://img.shields.io/badge/Craft%20CMS-5.0+-orange.svg)](https://craftcms.com/)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net/)
[![License](https://img.shields.io/packagist/l/lindemannrock/craft-code-highlighter.svg)](LICENSE)

Professional syntax highlighting for Craft CMS using Prism.js. Perfect for documentation sites, technical blogs, and any site displaying code.

## Get Started

### Requirements

- Craft CMS 5.0 or greater
- PHP 8.2 or greater

### Installation

#### Via Composer

1. Navigate to your Craft project directory:

```bash
cd /path/to/project
```

2. Require the plugin via Composer:

```bash
composer require lindemannrock/craft-code-highlighter
```

3. Install the plugin:

```bash
./craft plugin/install code-highlighter
```

#### Using DDEV

1. Navigate to your Craft project directory:

```bash
cd /path/to/project
```

2. Require the plugin:

```bash
ddev composer require lindemannrock/craft-code-highlighter
```

3. Install the plugin:

```bash
ddev craft plugin/install code-highlighter
```

#### Via Control Panel

1. Navigate to **Settings → Plugins** in the Control Panel
2. Search for "Code Highlighter"
3. Click **Install**

### Configuration

Create a `code-highlighter.php` file under your `/config` directory with the following options available to you. You can also use multi-environment options to change these per environment.

The below shows the defaults already used by Code Highlighter, so you don't need to add these options unless you want to modify the values.

```php
<?php
return [
    '*' => [
        // General
        'pluginName' => 'Code Highlighter',

        // Theme (site-wide, can be overridden per page)
        'defaultTheme' => 'tomorrow',

        // Default language for new fields
        'defaultLanguage' => 'php',

        // Default font size for code editor
        'defaultFontSize' => 14,

        // Available Languages
        'availableLanguages' => [
            'markup', 'css', 'clike', 'javascript',
            'php', 'bash', 'twig', 'yaml', 'json'
        ],

        // Frontend Typography
        'fontFamily' => '', // e.g., 'JetBrains Mono, monospace'

        // Frontend Features
        'enableCopyButton' => true,

        // Copy Button Styling (CSS Variables)
        'copyButtonStyles' => [
            // Colors
            // '--copy-btn-bg' => '#2d2d2d',
            // '--copy-btn-color' => '#ffffff',
            // '--copy-btn-hover-bg' => '#3d3d3d',
            // '--copy-btn-success-bg' => '#28a745',

            // Spacing
            // '--copy-btn-padding-inline' => '0.5rem',
            // '--copy-btn-padding-block' => '0.25rem',
            // '--copy-btn-min-width' => '5rem',

            // Toolbar Position
            // '--toolbar-top' => '0.3em',
            // '--toolbar-right' => '0.2em',
        ],
    ],
    'production' => [
        'fontFamily' => 'JetBrains Mono, Consolas, monospace',
        'copyButtonStyles' => [
            '--copy-btn-bg' => '#1a1a1a',
        ],
    ],
];
```

**Configuration Options:**

- `pluginName` - Plugin name in Control Panel menu
- `defaultTheme` - Prism theme (24 themes available)
- `defaultLanguage` - Default language for new fields
- `defaultFontSize` - Font size in pixels (8-32)
- `availableLanguages` - Which languages appear in field settings
- `fontFamily` - Custom font (leave empty for theme default)
- `enableCopyButton` - Show copy button on frontend
- `copyButtonStyles` - CSS variable overrides for copy button

**Control Panel Settings:**

You can also manage settings through the Control Panel by navigating to **Settings → Code Highlighter**.

## Features

### Overview

- **CP Field Type** - Full-featured code editor with syntax highlighting
- **Twig Filters** - Simple `{{ code|highlight('lang') }}` syntax
- **24 Themes** - Dark, light, and colorful Prism themes
- **177+ Languages** - All Prism.js supported languages
- **Language Switcher** - Switch languages on the fly while editing
- **Accessible Copy Button** - Proper `<button>` elements with ARIA labels
- **Smart Asset Loading** - Only loads languages used on page
- **Line Numbers** - Optional line number display
- **Word Wrap** - Toggle for long lines
- **Customizable** - CSS variables for styling
- **Bundled Assets** - No CDN dependencies
- **Lightweight** - Minimal overhead
- **Page-Level Theming** - Control theme per template

### Themes

Available Prism.js themes:

**Core Themes:**
- default, dark, funky, okaidia, twilight, coy, solarizedlight, tomorrow

**Extended Themes:**
- atom-dark, dracula, material-dark, material-light, material-oceanic
- nord, one-dark, one-light, synthwave84, vsc-dark-plus, vs
- night-owl, gruvbox-dark, gruvbox-light, coldark-cold, coldark-dark

**Setting Theme:**

Plugin Default:
```php
'defaultTheme' => 'dracula',
```

Per Page:
```twig
{% do craft.codeHighlighter.setTheme('nord') %}
```

### Field Type

Rich code editing in the Control Panel with live syntax highlighting.

**Field Settings:**
- Default Language (or use plugin default)
- Available Languages (checkboxes - optional override)
- Show Language Dropdown (switch languages while editing)
- Show Line Numbers (on/off)
- Enable Word Wrap (with caution - may affect readability)
- Field Rows (editor height)
- Field Tab Width (spaces per tab)
- Field Font Size (dropdown with presets)
- Default Value (pre-populate with code)

**CP Features:**
- Live syntax highlighting as you type
- Tab key inserts tabs (4 spaces)
- Cmd/Ctrl+Z for undo, Cmd/Ctrl+Y for redo
- Cmd/Ctrl+[ to unindent, Cmd/Ctrl+] to indent
- Auto-save on changes
- Language switcher (if enabled)
- Customizable font size per field

## Usage

### Basic Field Output

Use fields in your templates - settings automatically apply:

```twig
{# Outputs with field's language, line numbers, word wrap settings #}
{{ entry.codeField }}
```

### Field with Custom Options

Override field settings per template:

```twig
{# Change language #}
{{ entry.phpCode.render({
    language: 'javascript'
}) }}

{# Hide line numbers #}
{{ entry.codeField.render({
    lineNumbers: false
}) }}

{# Enable word wrap #}
{{ entry.codeField.render({
    wordWrap: true
}) }}

{# Hide copy button for this block #}
{{ entry.codeField.render({
    showCopy: false
}) }}

{# Combine multiple options #}
{{ entry.codeField.render({
    language: 'twig',
    lineNumbers: true,
    wordWrap: false,
    showCopy: true
}) }}
```

### Twig Filter

Highlight any string (not from a field):

```twig
{% set phpCode %}
<?php
$name = 'World';
echo "Hello, {$name}!";
{% endset %}

{{ phpCode|highlight('php') }}
```

With options:

```twig
{{ code|highlight('bash', {
    lineNumbers: false,
    showCopy: true
}) }}
```

### Page-Level Theme Control

Set theme for entire page (all code blocks):

```twig
{# Set at top of template #}
{% do craft.codeHighlighter.setTheme('dracula') %}

{# All code blocks use Dracula theme #}
{{ entry.code1 }}
{{ entry.code2 }}
{{ someCode|highlight('php') }}
```

**Dynamic Themes:**

```twig
{# Dark theme for blog, light for docs #}
{% if entry.section.handle == 'blog' %}
    {% do craft.codeHighlighter.setTheme('dracula') %}
{% else %}
    {% do craft.codeHighlighter.setTheme('one-light') %}
{% endif %}
```

### Supported Languages

**Default Enabled (9 languages):**
- `markup` - HTML/XML
- `css` - CSS
- `clike` - C-like (base for many languages)
- `javascript` - JavaScript
- `php` - PHP
- `bash` - Bash/Shell
- `twig` - Twig templates
- `yaml` - YAML
- `json` - JSON

**All Available (177+ languages):**

Enable more in plugin settings: `python`, `ruby`, `go`, `rust`, `typescript`, `jsx`, `tsx`, `sql`, `graphql`, `dockerfile`, `nginx`, `java`, `csharp`, `cpp`, `swift`, `kotlin`, and many more.

See [full language list](https://prismjs.com/#supported-languages).

### Copy Button

Accessible copy-to-clipboard with proper `<button>` elements and ARIA labels.

**Features:**
- Proper semantic HTML (`<button>` not `<a>`)
- ARIA labels for screen readers
- Keyboard accessible (Tab + Enter)
- Visual feedback ("Copy" → "Copied!")
- Error handling
- Fully customizable via CSS variables

**Customization:**

In config:
```php
'copyButtonStyles' => [
    '--copy-btn-bg' => '#1a1a1a',
    '--copy-btn-success-bg' => '#00ff00',
    '--copy-btn-border-radius' => '0.5rem',
],
```

In CSS:
```css
:root {
    --copy-btn-bg: #ff6b6b;
    --copy-btn-success-bg: #51cf66;
}
```

**Available CSS Variables:**
- `--copy-btn-bg` - Button background
- `--copy-btn-color` - Text color
- `--copy-btn-hover-bg` - Hover state
- `--copy-btn-success-bg` - Success state
- `--copy-btn-border-color` - Border color
- `--copy-btn-padding-inline` - Horizontal padding
- `--copy-btn-padding-block` - Vertical padding
- `--copy-btn-border-radius` - Corner rounding
- `--copy-btn-min-width` - Minimum width
- `--copy-btn-font-size` - Text size
- `--copy-btn-font-family` - Button font
- `--copy-btn-focus-color` - Focus ring color (a11y)
- `--copy-btn-focus-offset` - Focus ring offset
- `--toolbar-top` - Distance from top
- `--toolbar-right` - Distance from right
- `--toolbar-opacity` - Toolbar opacity

### Font Customization

**Font Size:**

Per field (CP editor):
```
Field Settings → Field Font Size → 16px - Medium
```

Site-wide (frontend):
```php
'defaultFontSize' => 16,
```

Per code block:
```twig
{{ code|highlight('php', {fontSize: 18}) }}
```

**Font Family:**

Site-wide:
```php
'fontFamily' => 'JetBrains Mono, Consolas, monospace',
```

Or in your CSS:
```css
:root {
    --code-font-family: 'Fira Code', 'Consolas', monospace;
}
```

## Template Reference

### Twig Variable

Access Code Highlighter functionality:

```twig
{# Set page theme #}
{% do craft.codeHighlighter.setTheme('dracula') %}

{# Get current theme #}
{% set theme = craft.codeHighlighter.getTheme() %}
```

### Twig Filters

Two filters available (aliases):

```twig
{{ code|highlight('php') }}
{{ code|prism('php') }}
```

**Filter Options:**

```twig
{{ code|highlight('language', {
    lineNumbers: true,      // Show line numbers
    wordWrap: false,        // Enable word wrapping
    showCopy: true,         // Show copy button
    fontSize: 16            // Custom font size
}) }}
```

### Field Output

**Simple:**
```twig
{{ entry.codeField }}
```

**With Options:**
```twig
{# Override language #}
{{ entry.codeField.render({language: 'javascript'}) }}

{# Multiple overrides #}
{{ entry.codeField.render({
    language: 'twig',
    lineNumbers: false,
    wordWrap: true,
    showCopy: false
}) }}
```

**Access Raw Code:**
```twig
{# Get code without highlighting #}
{{ entry.codeField.getRaw() }}

{# Get language #}
{{ entry.codeField.getLanguage() }}
```

### Theme Control

**Set for Entire Page:**
```twig
{% do craft.codeHighlighter.setTheme('nord') %}
```

**Conditional Themes:**
```twig
{% if darkMode %}
    {% do craft.codeHighlighter.setTheme('dracula') %}
{% else %}
    {% do craft.codeHighlighter.setTheme('one-light') %}
{% endif %}
```

**Per Section:**
```twig
{% switch entry.section.handle %}
    {% case 'blog' %}
        {% do craft.codeHighlighter.setTheme('synthwave84') %}
    {% case 'docs' %}
        {% do craft.codeHighlighter.setTheme('vsc-dark-plus') %}
    {% default %}
        {% do craft.codeHighlighter.setTheme('tomorrow') %}
{% endswitch %}
```

## Control Panel

### Plugin Settings

Navigate to **Settings → Code Highlighter**.

**General:**
- **Plugin Name** - Name in CP menu
- **Theme** - Default Prism theme (24 options)
- **Default Language** - For new fields
- **Default Font Size** - Editor font size (8px - 24px)
- **Font Family (Optional)** - Custom code font
- **Enable Copy Button** - Frontend copy button toggle
- **Available Languages** - Which languages are enabled site-wide

**Config Overrides:**

Settings show warnings when locked by config file. Fields are disabled and display:
> This is being overridden by the `setting` in `config/code-highlighter.php`.

### Field Settings

**Default Language:**
- "Use Plugin Default (PHP)" or select specific language
- Shows only languages enabled in plugin settings

**Available Languages (Optional):**
- Leave empty → uses plugin defaults (dynamic)
- Check specific languages → lock field to those only
- Field's default language is always included (protected)

**Show Language Dropdown:**
- Adds language switcher in field editor
- Switch between available languages while editing
- Selected language persists on save

**Show Line Numbers:**
- Displays line numbers in editor and frontend

**Enable Word Wrap:**
- Wrap long lines instead of horizontal scroll
- ⚠️ Note: May affect code readability

**Field Rows:**
- Editor height (1 row = 21px)
- Range: 1-50 rows

**Field Tab Width:**
- Spaces per tab character
- Range: 1-8 spaces

**Field Font Size:**
- "Use Plugin Default (14px)" or select custom
- Dropdown with presets (8px - 24px)

**Show Language Dropdown:**
- Enable language switcher in field editor

**Default Value (Optional):**
- Pre-populate field with code
- Useful for templates or boilerplate

## Advanced

### CSS Customization

All frontend styles use CSS variables for easy customization.

**Code Block Typography:**
```css
:root {
    --code-font-size: 16px;
    --code-font-family: 'Fira Code', monospace;
}
```

**Copy Button:**
```css
:root {
    /* Colors */
    --copy-btn-bg: #2d2d2d;
    --copy-btn-color: #ffffff;
    --copy-btn-hover-bg: #3d3d3d;
    --copy-btn-success-bg: #28a745;

    /* Sizing */
    --copy-btn-padding-inline: 0.5rem;
    --copy-btn-padding-block: 0.25rem;
    --copy-btn-min-width: 5rem;
    --copy-btn-border-radius: 0.25rem;

    /* Position */
    --toolbar-top: 0.5em;
    --toolbar-right: 0.5em;
    --toolbar-opacity: 0.9;

    /* Accessibility */
    --copy-btn-focus-color: #4a9eff;
    --copy-btn-focus-offset: 2px;
}
```

**Per Environment (in config):**
```php
'production' => [
    'copyButtonStyles' => [
        '--copy-btn-bg' => '#1a1a1a',
        '--toolbar-opacity' => '1',
    ],
],
```

### Language Switcher

Enable per-field language switching.

**Setup:**
1. Field Settings → Enable "Show Language Dropdown"
2. Select multiple languages in "Available Languages"

**Usage:**
- Language dropdown appears above code editor
- Switch between available languages while editing
- Selected language persists
- Dynamically loads language components
- Re-highlights code instantly

**Stored Format:**
```json
{
    "code": "<?php echo 'hello';",
    "language": "php"
}
```

**Backward Compatible:**
- Old entries (plain string) still work
- Auto-upgrades to JSON format on save

### Word Wrapping

Control line wrapping behavior.

**Field Setting:**
- Toggle in field settings
- Applies to both CP and frontend

**Per Block Override:**
```twig
{{ entry.code.render({wordWrap: true}) }}
```

**CSS:**
```css
.wrap-lines,
.wrap-lines code {
    white-space: pre-wrap;
    word-wrap: break-word;
}
```

**Note:** Word wrap may affect line number alignment. Use with caution for code where formatting is critical.

### Available Languages Hierarchy

**Two-Tier Filtering:**

**Plugin Settings (Site-Wide):**
- Select which languages are available globally
- Example: Enable only languages your team uses

**Field Settings (Per-Field):**
- Further restrict to subset of plugin's languages
- Leave empty to use plugin defaults dynamically
- Or lock to specific languages

**Flow:**
```
Plugin Settings (177 languages)
    ↓ Filter to 10 languages
Field Settings (10 languages)
    ↓ Further filter to 3
Language Dropdown (3 languages)
```

**Dynamic Updates:**

If field's Available Languages is empty:
- Uses plugin settings (dynamic)
- Add language to plugin → field gets it automatically

If field has selected languages:
- Locked to those languages
- Plugin changes don't affect this field

## Troubleshooting

### No Syntax Highlighting in CP

**Symptoms**: Code editor shows no colors

**Solutions:**
- Clear CP resources cache: `./craft clear-caches/cp-resources`
- Check browser console for JavaScript errors
- Verify language components are loading (Network tab)
- Ensure theme CSS is loading

### Copy Button Not Appearing

**Symptoms**: No copy button on frontend

**Solutions:**
- Check `enableCopyButton` is `true` in settings
- Verify you're not using `showCopy: false` in render options
- Clear caches
- Check browser console for toolbar plugin errors

### Language Switcher Not Working

**Symptoms**: Dropdown doesn't change highlighting

**Solutions:**
- Ensure "Show Language Dropdown" is enabled in field settings
- Select multiple languages in "Available Languages"
- Check browser console for component loading
- Clear CP resources cache

### Settings Won't Save

**Symptoms**: "Select All" in Available Languages doesn't save

**Solutions:**
- This should work - it expands `*` to all languages
- Check browser Network tab for errors
- Review `/storage/logs/web.log` for validation errors
- Ensure default language is checked

### Word Wrap Issues

**Symptoms**: Line numbers misaligned with wrapped lines

**Solutions:**
- This is expected behavior with word wrap
- Disable word wrap for code where alignment is critical
- Or hide line numbers when using word wrap

## Support

- **Documentation**: [https://github.com/LindemannRock/craft-code-highlighter](https://github.com/LindemannRock/craft-code-highlighter)
- **Issues**: [https://github.com/LindemannRock/craft-code-highlighter/issues](https://github.com/LindemannRock/craft-code-highlighter/issues)
- **Email**: [support@lindemannrock.com](mailto:support@lindemannrock.com)

## Credits

- Uses [Prism.js](https://prismjs.com/) for syntax highlighting (MIT License)
- Uses [bililiteRange](https://github.com/dwachss/bililiteRange) for contenteditable handling (MIT License)

## License

This plugin is licensed under the MIT License. See [LICENSE](LICENSE) for details.

---

Developed by [LindemannRock](https://lindemannrock.com)
