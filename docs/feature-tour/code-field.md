# The Code field

A field type that gives authors a real code editor in the Control Panel — live syntax highlighting as they type, line numbers, tab handling, and undo/redo — and stores the code (and its language) ready to render on the front end.

## What you'll use it for

- A code sample on a documentation or tutorial entry
- A reusable snippet in a pattern library
- Any field where plain text would lose the formatting and colour that make code readable

## Add the field

1. In the Control Panel, go to **Settings → Fields** and create a new field.
2. Choose **Code Highlighter** as the field type.
3. Set the options below and save, then add the field to an entry type.

![The Code field settings](images/code-field-settings.webp)

## Field options

| Option | Default | What it does |
|--------|---------|--------------|
| **Language** | plugin default | The language this field highlights as. Leave empty to use the plugin default. |
| **Available Languages** | plugin setting | Which languages the in-editor switcher offers (when shown). |
| **Show Language Dropdown** | off | Let authors switch the language inside the editor. |
| **Line Numbers** | inherit | Show line numbers (inherits the plugin setting unless set here). |
| **Word Wrap** | off | Wrap long lines instead of scrolling. |
| **Show Copy Button** | inherit | Show the copy-to-clipboard button on the rendered output. |
| **Match Braces** | inherit | Highlight matching braces/brackets. |
| **Editor Rows** | 10 | Editor height in rows (1–50; ~21px each). |
| **Tab Width** | 4 | Spaces per tab/indent (1–8). |
| **Font Size** | plugin default | Editor/code font size in px (0 = use plugin default). |
| **Default Value** | — | Seed code inserted into new, empty fields. |

Line numbers, copy button, and match braces are **tri-state**: leave them on "default" to inherit the [plugin setting](../get-started/configuration.md#highlighting-features), or set them explicitly per field.

> The **theme** is plugin-wide (or per page), not per field — see [Themes](themes.md).

## The editor

The Control-Panel editor highlights code live as you type and supports:

- **Tab / indent** and unindent (`Ctrl/Cmd + ]` / `[`)
- **Undo / redo** (`Ctrl/Cmd + Z`, `Ctrl/Cmd + Y` or `Shift + Z`)
- An optional **language switcher** (when *Show Language Dropdown* is on) that loads the right Prism language on the fly

![The Code field editor in the Control Panel](images/code-field-editor.webp)

## The stored value

The field stores the code and its language. In templates the value is a rich object — printing it renders highlighted HTML, and there are methods for the raw code or a custom re-render. See [Displaying code](../template-guides/displaying-code.md).

## Next steps

- [Themes](themes.md)
- [Languages](languages.md)
- [Highlighting features](highlighting-features.md)
- [Displaying code in templates](../template-guides/displaying-code.md)
