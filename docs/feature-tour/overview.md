# Features overview

Put real, syntax-highlighted code into your content — a documentation site, a tutorial, a snippet library — with a proper code editor in the Control Panel and Prism-powered highlighting on the front end. Code Highlighter adds a **Code** field type and a Twig API, with ~177 languages and 25 themes bundled and served locally.

> [!TIP]
> New to the plugin? Start with [Installation](../get-started/installation.md) and the [Quickstart](../get-started/quickstart.md), then come back here for the tour.

## What it does

Authors get a Code field with a real editor — live highlighting as they type, line numbers, tab/indent handling, undo/redo, and an optional in-editor language switcher. On the front end, printing the field renders fully highlighted HTML with the theme, language, line numbers, and copy button you configured. There's also a Twig filter for highlighting arbitrary strings, and a small integration trait other plugins can use.

Everything is **local** — Prism core, all language components, and all themes are bundled with the plugin and served from its own assets. No CDN, works offline.

## What you'll use it for

- Code samples in documentation or tutorials
- A snippet or pattern library
- Config / command examples in knowledge-base articles
- Any entry that needs readable, highlighted code

## Core capabilities

- **[The Code field](code-field.md)** — A syntax-highlighting editor in the Control Panel, with per-field language, line numbers, copy button, font size, tab width, and more.
- **[Themes](themes.md)** — 25 bundled Prism themes; set one plugin-wide or override it per page.
- **[Languages](languages.md)** — ~177 languages; choose which appear in field dropdowns, with components and their dependencies loaded on demand.
- **[Highlighting features](highlighting-features.md)** — Line numbers, copy-to-clipboard, matching-brace highlighting, and inline CSS colour swatches.

## For developers

- **[Displaying code](../template-guides/displaying-code.md)** — print a Code field, re-render with overrides, or highlight any string with the `|highlight` filter.
- **[Front-end output](../developers/front-end-css.md)** — the wrapper markup and CSS variables for styling.
- **[Integration API](../developers/integration-api.md)** — a trait other plugins can use to highlight code with graceful fallback.

## Where things live

| You configure… | In… |
|----------------|-----|
| A field's language, editor, and highlighting options | The **Code** field's settings |
| Plugin-wide defaults (theme, languages, toggles) | Settings → Plugins → Code Highlighter, and `config/code-highlighter.php` |
| The code itself | The Code field on an entry |

![A Code field on an entry](images/overview-field.webp)

## Next steps

1. [Install the plugin](../get-started/installation.md)
2. [Add your first Code field](../get-started/quickstart.md)
3. [Tour the field options](code-field.md)
