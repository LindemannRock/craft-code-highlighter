# Template Variables

Code Highlighter provides a `craft.codeHighlighter` variable for controlling the theme per page. To render code itself, print a Code field or use the `|highlight` filter — see [Displaying code](../template-guides/displaying-code.md).

## `craft.codeHighlighter`

### `setTheme()`

Override the [theme](../feature-tour/themes.md) for the current page. Call it before any code renders. The value must be one of the 25 theme keys (invalid values are ignored).

```twig
{% do craft.codeHighlighter.setTheme('dracula') %}
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `theme` | `string` | Theme key (e.g. `dracula`, `one-dark`, `nord`) |

**Returns:** `void`

---

### `getTheme()`

Get the active theme for the page — the page override set by `setTheme()`, or the plugin's default theme.

```twig
{{ craft.codeHighlighter.getTheme() }}   {# e.g. "tomorrow" #}
```

**Returns:** `string`

---

## See also

- [Displaying code in templates](../template-guides/displaying-code.md) — the `|highlight` / `|prism` filters and printing Code fields
- [Themes](../feature-tour/themes.md)

