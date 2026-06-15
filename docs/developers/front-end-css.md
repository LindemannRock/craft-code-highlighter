# Front-end output

What the plugin renders on the front end, and the CSS hooks for styling it. Colours and token styling come from the [theme](../feature-tour/themes.md); this page covers the wrapper and the copy button.

## Rendered markup

Highlighted code is wrapped like this:

```html
<div class="code-highlighter-wrapper">
    <pre class="language-php line-numbers"><code class="language-php">…</code></pre>
</div>
```

- `.code-highlighter-wrapper` — the outer wrapper (gets `no-copy` when the copy button is hidden).
- `.language-{lang}` on `<pre>`/`<code>` — Prism's language class.
- `line-numbers`, `match-braces`, `wrap-lines` are added on `<pre>` when those features are on.

The theme stylesheet and any enabled Prism plugin assets are loaded automatically — all from the plugin's bundled files (no CDN).

## Wrapper variables

Two CSS custom properties affect the code block directly. They're set per-block when the field's font options are used, but you can also set them in your own CSS:

| Variable | Purpose |
|----------|---------|
| `--code-highlighter-font-size` | Code font size. |
| `--code-highlighter-font-family` | Code font family. |

## Copy button variables

The copy button is styled through an allowlisted set of CSS variables. Set them globally with the [`copyButtonStyles`](../get-started/configuration.md#copy-button-styling-config-only) config option, or in your own stylesheet:

| Variable | | Variable |
|----------|-|----------|
| `--copy-btn-bg` | | `--copy-btn-min-width` |
| `--copy-btn-color` | | `--copy-btn-font-size` |
| `--copy-btn-hover-bg` | | `--copy-btn-font-family` |
| `--copy-btn-success-bg` | | `--copy-btn-focus-color` |
| `--copy-btn-border-color` | | `--copy-btn-focus-offset` |
| `--copy-btn-padding-inline` | | `--toolbar-top` |
| `--copy-btn-padding-block` | | `--toolbar-right` |
| `--copy-btn-border-radius` | | `--toolbar-opacity` |

Only these keys are honored, and values are sanitized before being injected — anything else is ignored.

```css
:root {
    --copy-btn-bg: #1f2937;
    --copy-btn-color: #fff;
    --copy-btn-hover-bg: #374151;
    --copy-btn-success-bg: #059669;
    --copy-btn-border-radius: 6px;
}
```

> When the theme is `css-variables`, the plugin does **not** inject these root variables — that theme is driven entirely by the CSS variables you define, so it stays in your control.

## The copy button script

Copy-to-clipboard uses a small accessible script (not Prism's default copy plugin) layered on Prism's toolbar. It loads only when the copy button is enabled.

## Next steps

- [Themes](../feature-tour/themes.md)
- [Highlighting features](../feature-tour/highlighting-features.md)
- [Displaying code in templates](../template-guides/displaying-code.md)
