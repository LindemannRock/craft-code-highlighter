# Themes

The look of your highlighted code — its colours and background — comes from a Prism theme. Code Highlighter bundles 25 of them, from the classic Prism themes to popular editor-inspired ones like Dracula, Nord, and One Dark.

## What you'll use it for

- Matching code blocks to your site's light or dark design
- Using a familiar editor theme (VS Code Dark+, One Dark, Dracula…)
- Switching themes per page for a themed section

## Choosing a theme

The theme is **plugin-wide**: set **Theme** in **Settings → Plugins → Code Highlighter** (or `defaultTheme` in [config](../get-started/configuration.md)). Every Code field and highlighted block uses it.

To override the theme for a single page, set it from a template before the code renders:

```twig
{% do craft.codeHighlighter.setTheme('dracula') %}
```

`craft.codeHighlighter.getTheme()` returns the active theme (the page override, or the plugin default).

> There's no per-field theme — a page renders all its code in one theme. The theme CSS is served from the plugin's bundled assets.

![A selection of the bundled themes](images/themes-gallery.webp)

## Available themes

| Key | Name | | Key | Name |
|-----|------|-|-----|------|
| `default` | Default | | `one-dark` | One Dark |
| `dark` | Dark | | `one-light` | One Light |
| `funky` | Funky | | `synthwave84` | Synthwave 84 |
| `okaidia` | Okaidia | | `vsc-dark-plus` | VS Code Dark+ |
| `twilight` | Twilight | | `vs` | Visual Studio |
| `coy` | Coy | | `night-owl` | Night Owl |
| `solarizedlight` | Solarized Light | | `gruvbox-dark` | Gruvbox Dark |
| `tomorrow` | Tomorrow Night | | `gruvbox-light` | Gruvbox Light |
| `atom-dark` | Atom Dark | | `coldark-cold` | Coldark Cold |
| `dracula` | Dracula | | `coldark-dark` | Coldark Dark |
| `material-dark` | Material Dark | | `css-variables` | CSS Variables |
| `material-light` | Material Light | | | |
| `material-oceanic` | Material Oceanic | | | |
| `nord` | Nord | | | |

## The CSS Variables theme

The `css-variables` theme paints tokens from CSS custom properties instead of fixed colours, so you can drive highlighting from your own design tokens (and switch light/dark with your site). Pick it as the theme, then define the Prism `--token-*` variables in your stylesheet.

## Next steps

- [Front-end output](../developers/front-end-css.md) — wrapper and copy-button styling
- [Highlighting features](highlighting-features.md)
