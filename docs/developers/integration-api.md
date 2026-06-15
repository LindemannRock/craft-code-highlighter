# Integration API

Building a plugin or module that wants syntax highlighting — but shouldn't hard-depend on Code Highlighter being installed? Use the `CodeHighlighterTrait`. It wraps the plugin's API and **degrades gracefully**: if Code Highlighter isn't installed, `highlightCode()` still returns safe `<pre><code>` markup instead of throwing.

> Available since 5.4.0.

## Using the trait

Add the trait to any service or component:

```php
use lindemannrock\codehighlighter\traits\CodeHighlighterTrait;

class MyService extends \craft\base\Component
{
    use CodeHighlighterTrait;

    public function renderCode(string $code): string
    {
        return $this->highlightCode($code, 'php', [
            'lineNumbers' => true,
            'showCopy' => true,
        ]);
    }
}
```

## Methods

All methods are `protected` (for use inside the consuming class) and safe to call whether or not Code Highlighter is installed.

| Method | Returns | Notes |
|--------|---------|-------|
| `isCodeHighlighterAvailable(): bool` | `bool` | Whether the plugin is installed and enabled. |
| `highlightCode(string $code, string $language = 'php', array $options = []): string` | HTML | Highlighted HTML when available; otherwise an escaped `<pre><code class="language-…">` fallback. Options: `lineNumbers`, `wordWrap`, `matchBraces`, `showCopy`, `fontSize`. |
| `applyCodeTheme(string $theme): void` | — | Set the page theme (no-op when unavailable). |
| `currentCodeTheme(): string` | theme key | The active theme, or `'default'` when unavailable. |
| `getAvailableThemes(): array` | `key => label` | The 25 themes (empty array when unavailable). |
| `getAllLanguages(): array` | `key => label` | All ~177 languages (empty when unavailable). |
| `getFilteredLanguages(): array` | `key => label` | Languages filtered by the plugin's settings (empty when unavailable). |

The plugin instance is resolved lazily and cached, so repeated calls are cheap.

## Graceful fallback

The point of the trait is that your code path doesn't branch on whether the plugin exists:

```php
// Works either way — highlighted if the plugin is present, plain (escaped) if not.
$html = $this->highlightCode($snippet, 'twig');
```

This lets you offer enhanced highlighting as an optional dependency without making it required.

## Next steps

- [Displaying code in templates](../template-guides/displaying-code.md) — the Twig equivalents
- [The Code field](../feature-tour/code-field.md)
