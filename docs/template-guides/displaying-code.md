# Displaying code in templates

Two ways to render highlighted code in Twig: print a **Code field** value, or run any **string** through the highlight filter. Both produce the same Prism markup and load the right assets automatically.

## Print a Code field

A Code field returns a value object. Just print it — it renders fully highlighted, using the field's language and your theme/feature settings:

```twig
{{ entry.myCodeField }}
```

### Value methods

The value object also exposes:

```twig
{% set code = entry.myCodeField %}

{{ code.getRaw() }}        {# the raw, un-highlighted code #}
{{ code.getLanguage() }}   {# the language key, e.g. "php" #}
{{ code.code }}            {# raw code (property) #}
```

### Re-render with overrides

Use `.render()` to highlight the same code with different options — handy to override the field's settings in one place:

```twig
{{ entry.myCodeField.render({
    language: 'javascript',
    lineNumbers: false,
    showCopy: true,
    matchBraces: true,
}) }}
```

Options you pass take precedence over the field's settings.

## Highlight any string

To highlight a string that isn't a Code field — a value from another field, a variable, literal text — use the `|highlight` filter (its alias `|prism` is identical):

```twig
{{ '<?php echo "hello";'|highlight('php') }}

{{ source|prism('twig', { lineNumbers: true }) }}
```

**Filter signature:** `|highlight(language = 'php', options = {})`. The output is marked safe HTML.

## Set the theme for a page

The theme is plugin-wide, but you can override it per page before any code renders:

```twig
{% do craft.codeHighlighter.setTheme('one-dark') %}
{{ entry.myCodeField }}

{# craft.codeHighlighter.getTheme() returns the active theme #}
```

## Next steps

- [Front-end output](../developers/front-end-css.md) — markup and styling hooks
- [Themes](../feature-tour/themes.md)
- [Integration API](../developers/integration-api.md) — highlighting from another plugin's PHP
