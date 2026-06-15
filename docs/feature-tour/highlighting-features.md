# Highlighting features

Beyond colour, Code Highlighter ships a handful of Prism enhancements you can switch on: line numbers, a copy-to-clipboard button, matching-brace highlighting, and inline colour swatches. Each is a plugin-wide default that a field can override.

## What you'll use it for

- Numbered lines for referencing code in prose ("see line 12")
- A one-click copy button on every snippet
- Brace matching to make nested code readable
- Colour swatches next to CSS colour values

## The features

| Feature | Setting | Default | What it does |
|---------|---------|---------|--------------|
| **Line numbers** | `enableLineNumbers` | on | Numbers each line of the block. |
| **Copy button** | `enableCopyButton` | on | Adds an accessible copy-to-clipboard button (via Prism's toolbar). |
| **Match braces** | `enableMatchBraces` | off | Highlights matching braces/brackets and the pair under the cursor. |
| **Inline color** | `enableInlineColor` | off | Shows a small colour swatch beside CSS colour values (only affects CSS). |

Set the defaults in **Settings → Plugins → Code Highlighter** (or [config](../get-started/configuration.md#highlighting-features)). Line numbers, copy button, and match braces can each be overridden per field; inline color is a plugin-wide setting.

![Highlighted code with line numbers and a copy button](images/highlighting-features.webp)

## How they load

Each enhancement is a Prism plugin served from the bundled assets, loaded only when needed:

- The **copy button** loads Prism's toolbar plus an accessible copy script. (If a field turns the copy button on while the global setting is off, the toolbar is loaded just for that block.)
- **Inline color** only activates when a block is CSS — it rides on Prism's `css-extras` component.

## Styling the copy button

The copy button's appearance is driven by an allowlisted set of `--copy-btn-*` CSS variables, set globally via the `copyButtonStyles` config option or in your own stylesheet. See [Front-end output](../developers/front-end-css.md).

## Next steps

- [Themes](themes.md)
- [Front-end output](../developers/front-end-css.md)
- [Displaying code in templates](../template-guides/displaying-code.md)
