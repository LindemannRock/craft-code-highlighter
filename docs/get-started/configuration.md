# Configuration

Code Highlighter's settings set the plugin-wide defaults — the theme, which languages appear in field dropdowns, and the editor/highlighting defaults new fields inherit. Set them in the Control Panel under **Settings → Plugins → Code Highlighter**, or lock them per environment in a config file.

> Copy the sample config to start: `cp vendor/lindemannrock/craft-code-highlighter/src/config.php config/code-highlighter.php`. Anything set in `config/code-highlighter.php` overrides the Control Panel value and locks that field in the UI.

## General

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `pluginName` | `string` | `'Code Highlighter'` | Name shown in the Control Panel. |
| `defaultTheme` | `string` | `'tomorrow'` | The Prism theme applied to highlighted code. One of the 25 [theme keys](../feature-tour/themes.md). |
| `defaultLanguage` | `string` | `'php'` | Default language for new Code fields. |
| `availableLanguages` | `array` | `['markup','css','clike','javascript','php','bash','twig','yaml','json']` | Which languages appear in the field's language dropdown. Empty = offer all ~177 [languages](../feature-tour/languages.md). |

## Editor defaults

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `defaultFontSize` | `int` | `14` | Editor/code font size in pixels (8–24). |
| `fontFamily` | `string` | `''` | Optional monospace stack, e.g. `'JetBrains Mono, monospace'`. Empty uses the theme's default. |

## Highlighting features

These toggle Prism plugins on the rendered output. Each is a default that a field can override.

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `enableLineNumbers` | `bool` | `true` | Show line numbers. |
| `enableCopyButton` | `bool` | `true` | Show a copy-to-clipboard button. |
| `enableMatchBraces` | `bool` | `false` | Highlight matching braces/brackets. |
| `enableInlineColor` | `bool` | `false` | Show inline colour swatches next to CSS colour values. |

## Copy button styling (config only)

`copyButtonStyles` lets you restyle the copy button via an allowlisted set of CSS variables. It's **config-file only** — there's no Control-Panel field for it.

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `copyButtonStyles` | `array` | `[]` | Map of allowlisted CSS variables → values (see below). |

```php
'copyButtonStyles' => [
    '--copy-btn-bg' => '#1f2937',
    '--copy-btn-color' => '#ffffff',
    '--copy-btn-hover-bg' => '#374151',
    '--copy-btn-border-radius' => '6px',
],
```

Only allowlisted keys are applied (the `--copy-btn-*` family plus `--toolbar-top` / `--toolbar-right` / `--toolbar-opacity`), and values are sanitized. See [Front-end output](../developers/front-end-css.md) for the full list and the wrapper variables.

## Example: full config file

`config/code-highlighter.php` is multi-environment aware, like Craft's `general.php`:

```php
<?php

return [
    '*' => [
        'defaultTheme' => 'tomorrow',
        'defaultLanguage' => 'php',
        'availableLanguages' => ['markup', 'css', 'javascript', 'php', 'bash', 'json', 'twig', 'yaml'],
        'defaultFontSize' => 14,
        'enableLineNumbers' => true,
        'enableCopyButton' => true,
    ],

    'production' => [
        'defaultTheme' => 'one-dark',
    ],
];
```

## Environment variables

String values can be driven by an environment variable with Craft's `App::env()`:

```php
use craft\helpers\App;

return [
    '*' => [
        'defaultTheme' => App::env('CODE_THEME') ?: 'tomorrow',
    ],
];
```

> The theme can also be overridden per page from a template — see [Themes](../feature-tour/themes.md#choosing-a-theme).
