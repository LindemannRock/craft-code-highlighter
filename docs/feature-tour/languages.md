# Languages

Code Highlighter bundles Prism's full language set — about 177 languages, from PHP, JavaScript, and Python to Rust, GraphQL, Twig, YAML, and Dockerfiles. Each field highlights as one language, and you control which languages authors can pick.

## What you'll use it for

- Highlighting the languages your content actually uses
- Keeping the field's language dropdown short and relevant
- Supporting a niche language without installing anything extra

## Which languages are offered

The **Available Languages** setting (**Settings → Plugins → Code Highlighter**, or `availableLanguages` in [config](../get-started/configuration.md)) controls which languages appear in the field's language dropdown. The default list keeps it short:

`markup` · `css` · `clike` · `javascript` · `php` · `bash` · `twig` · `yaml` · `json`

Leave the list empty to offer **all ~177** languages. A field can also narrow the list further with its own **Available Languages** setting.

## How languages load

There's no autoloader pulling from a CDN — every language is a bundled component, loaded **on demand**:

- A small set of base languages (`clike`, `markup`, `javascript`, `json`) is always present.
- When a block uses another language, that language's Prism component is loaded, along with any languages it **depends on** (resolved automatically — e.g. PHP pulls in `markup`, TypeScript pulls in `javascript`).

So a page only loads the language code it actually needs, and it all comes from the plugin's local assets.

## Setting a field's language

Each Code field has a **Language** setting (its default), and can optionally show an in-editor **language switcher** so authors change it per entry. See [The Code field](code-field.md).

## Next steps

- [The Code field](code-field.md)
- [Displaying code in templates](../template-guides/displaying-code.md) — highlight an arbitrary string in any language
