# Requirements

## System Requirements

| Requirement | Version |
|-------------|---------|
| [Craft CMS](https://craftcms.com/) | 5.0+ |
| [PHP](https://php.net/) | 8.2+ |

## Dependencies

Composer pulls this package automatically:

| Package | Version | Purpose |
|---------|---------|---------|
| [lindemannrock/craft-plugin-base](https://github.com/LindemannRock/craft-plugin-base) | 5.0+ | Shared base plugin utilities (helpers, traits, settings) |

Prism.js (the syntax highlighter) is **bundled** with the plugin — its themes and language components are served from the plugin's own assets, so highlighting works offline with no CDN.
