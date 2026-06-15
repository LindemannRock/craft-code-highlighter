# Twig Globals

Code Highlighter provides the following global variables in your Twig templates.

## `codeHelper`

*Provided by `lindemannrock/base`*

| Property | Description |
|----------|-------------|
| `codeHelper.displayName` | Display name (singular, without "Manager") |
| `codeHelper.pluralDisplayName` | Plural display name (without "Manager") |
| `codeHelper.fullName` | Full plugin name (as configured) |
| `codeHelper.lowerDisplayName` | Lowercase display name (singular) |
| `codeHelper.pluralLowerDisplayName` | Lowercase plural display name |

### Examples

```twig
{{ codeHelper.displayName }}
{{ codeHelper.pluralDisplayName }}
{{ codeHelper.fullName }}
{{ codeHelper.lowerDisplayName }}
{{ codeHelper.pluralLowerDisplayName }}
```

---

