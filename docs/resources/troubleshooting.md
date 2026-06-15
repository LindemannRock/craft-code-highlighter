# Troubleshooting

Common issues and how to resolve them. If something here doesn't cover your case, [open an issue](https://github.com/LindemannRock/craft-code-highlighter/issues).

## Code shows but isn't highlighted (or has no colours)

**Quick checks:**

1. Are you printing the field directly (`{{ entry.myCodeField }}`) rather than `.getRaw()`?
2. Is the language correct for the content?
3. View source — does the `<pre>` have a `language-…` class and is a theme stylesheet loaded?

**Fix:** Print the field value (or use `|highlight('lang')`) so the plugin renders highlighted HTML and loads the theme. `.getRaw()` and `.code` return plain, un-highlighted text by design.

## A language isn't in the field's dropdown

**Quick checks:**

1. Open **Settings → Plugins → Code Highlighter → Available Languages**.
2. Is the language in that list (or is the list narrowed further on the field)?

**Fix:** Add the language to **Available Languages**, or clear the list to offer all ~177. See [Languages](../feature-tour/languages.md).

## The wrong theme is showing

**Quick checks:**

1. Check **Theme** in plugin settings (or `defaultTheme` in config).
2. Is a template calling `craft.codeHighlighter.setTheme(...)` for that page?

**Fix:** The theme is plugin-wide; per-page overrides come from `setTheme()`. Remember a config value locks the setting and overrides the Control Panel. See [Themes](../feature-tour/themes.md).

## The copy button isn't appearing

**Quick checks:**

1. Is **Enable Copy Button** on (plugin setting), or set on the field?
2. View source — is the toolbar/copy script loaded?

**Fix:** Enable the copy button globally or per field. If a field turns it on while the global setting is off, it loads just for that block. See [Highlighting features](../feature-tour/highlighting-features.md).

## Inline colour swatches don't show

**Fix:** Inline color only applies to **CSS** code, and the **Enable Inline Color** setting must be on. It activates when a block's language is CSS.

## My copy-button CSS overrides don't apply

**Quick checks:**

1. Are you using only the allowlisted `--copy-btn-*` / `--toolbar-*` variables?
2. Is the theme set to `css-variables`?

**Fix:** Only allowlisted variables are honored (see [Front-end output](../developers/front-end-css.md)). Note the plugin does not inject these root variables when the theme is `css-variables` — define them yourself in that case.

## Highlighting works in the Control Panel but not on the front end

**Quick checks:**

1. Is the field actually printed in the front-end template?
2. Any Content-Security-Policy blocking the plugin's bundled CSS/JS?

**Fix:** Ensure the template prints the field (which registers the front-end assets). The assets are local to the plugin — allow them in your CSP if you have one.
