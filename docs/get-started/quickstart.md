# Quickstart

Get Code Highlighter running in a few minutes. By the end you'll have a Code field on an entry and syntax-highlighted output on the front end.

## 1. Install the plugin

> See [Installation](installation.md) for full details.

## 2. Add a Code field

In the Control Panel, go to **Settings → Fields**, create a new field, and choose **Code Highlighter** as the type. Pick a default **Language** (e.g. PHP) and save. Add the field to an entry type (section).

## 3. Enter some code

Edit an entry, find your Code field, and paste in a snippet. The editor highlights it live as you type, with line numbers and tab support.

## 4. Output it on the front end

In your entry template, print the field — it renders fully highlighted, no extra setup:

```twig
{{ entry.myCodeField }}
```

The plugin loads the right Prism theme, the language, and any enabled extras (line numbers, copy button) automatically.

## 5. Verify it works

Load the entry on your site. You should see the code with syntax colours, line numbers, and a copy-to-clipboard button — all served from the plugin's bundled assets (no CDN).

## What's next

- [The Code field](../feature-tour/code-field.md) — every field option and the editor
- [Themes](../feature-tour/themes.md) — pick from 25 themes or set one per page
- [Languages](../feature-tour/languages.md) — ~177 languages and how they load
- [Displaying code](../template-guides/displaying-code.md) — highlight any string, not just fields
