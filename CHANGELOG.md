# Changelog

## [5.6.0](https://github.com/LindemannRock/craft-code-highlighter/compare/v5.5.0...v5.6.0) (2026-05-06)


### Features

* add issue templates for bug reports, feature requests, and questions ([9686906](https://github.com/LindemannRock/craft-code-highlighter/commit/9686906208cdc9c3d8a32c971f72090b98222c89))


### Bug Fixes

* drop PAT requirement for release-please — use built-in GITHUB_TOKEN ([263e04d](https://github.com/LindemannRock/craft-code-highlighter/commit/263e04dd14e40c57087dcf9fd75447df88f9985e))
* update version in docblocks for CodeHighlighterField and PrismAsset ([d0dc653](https://github.com/LindemannRock/craft-code-highlighter/commit/d0dc65379a6ed3742985daf889d122b59daf84a9))

## [5.5.0](https://github.com/LindemannRock/craft-code-highlighter/compare/v5.4.0...v5.5.0) (2026-04-05)


### Features

* **assets:** add code highlighter with copy-to-clipboard functionality ([343a2c1](https://github.com/LindemannRock/craft-code-highlighter/commit/343a2c13869e4a1d679c2cdbec844422ee83d7ed))
* **CodeHighlighter:** enhance plugin bootstrap with installation experience ([cc7780e](https://github.com/LindemannRock/craft-code-highlighter/commit/cc7780e59f6fc4349f7b3e8345865bfcdd6b3a63))
* **icons:** add new SVG icons for the code highlighter plugin ([0d49492](https://github.com/LindemannRock/craft-code-highlighter/commit/0d49492cc6e7ee1fb12c7481577bceba33ac0d93))


### Bug Fixes

* settings accessibility and response methods ([68b3088](https://github.com/LindemannRock/craft-code-highlighter/commit/68b3088ec6434f62c659bcbba3b1e219e233228e))
* **settings:** improve error handling for plugin settings form ([50cd78e](https://github.com/LindemannRock/craft-code-highlighter/commit/50cd78e8614835b9201b2a9d37416dcf7ff4e264))

## [5.4.0](https://github.com/LindemannRock/craft-code-highlighter/compare/v5.3.1...v5.4.0) (2026-02-22)


### Features

* **prism:** add new plugins for autoloader, inline color, line numbers, match braces, and toolbar ([0260e09](https://github.com/LindemannRock/craft-code-highlighter/commit/0260e097c7e3ffcd9adf3172f3990808c1abf471))


### Miscellaneous Chores

* **.gitattributes:** add additional files to export-ignore for Packagist distribution ([97dd521](https://github.com/LindemannRock/craft-code-highlighter/commit/97dd521796983fcf4f0044b520e87df1af3091e4))
* add .gitattributes with export-ignore for Packagist distribution ([4277cfe](https://github.com/LindemannRock/craft-code-highlighter/commit/4277cfeb69abd0ee2d4e32eae2d6505bb31dc676))
* add .gitattributes with export-ignore for Packagist distribution ([a2bf028](https://github.com/LindemannRock/craft-code-highlighter/commit/a2bf02838c3285ec5a00ee712911bc74f08754cb))
* **package.json:** add prismjs as a dependency ([28b6f4f](https://github.com/LindemannRock/craft-code-highlighter/commit/28b6f4f3ab2089fdf13beb05d0f9c8bf7d404b3a))
* switch to Craft License for commercial release ([b197bcb](https://github.com/LindemannRock/craft-code-highlighter/commit/b197bcbc9693e83a98a0f11369737e992d9a749b))

## [5.3.1](https://github.com/LindemannRock/craft-code-highlighter/compare/v5.3.0...v5.3.1) (2026-02-05)


### Bug Fixes

* **AssetService:** correct dependency registration for theme CSS ([bb11256](https://github.com/LindemannRock/craft-code-highlighter/commit/bb1125654008259ff047b8518a240e49a3940f14))


### Miscellaneous Chores

* **package.json:** update package name and add author ([d7de6ef](https://github.com/LindemannRock/craft-code-highlighter/commit/d7de6ef9728f865697496c9ccd0b69198b346175))

## [5.3.0](https://github.com/LindemannRock/craft-code-highlighter/compare/v5.2.0...v5.3.0) (2026-01-07)


### Features

* migrate to shared base plugin ([04deede](https://github.com/LindemannRock/craft-code-highlighter/commit/04deede37753a9ea661f93875fef2f30b5c96b12))

## [5.2.0](https://github.com/LindemannRock/craft-code-highlighter/compare/v5.1.0...v5.2.0) (2025-12-04)


### Features

* add PHPDoc comments for class properties in CodeHighlighter and Settings models ([febc095](https://github.com/LindemannRock/craft-code-highlighter/commit/febc095f692417e5acb6c1e6ba75523e83f78381))
* add PHPDoc comments for properties in CodeHighlighter and Settings models ([cdba036](https://github.com/LindemannRock/craft-code-highlighter/commit/cdba03699a90f234be186178e1667085024f8263))
* add PHPStan and EasyCodingStandard configurations, update dependencies, and refactor code structure ([22ea3e3](https://github.com/LindemannRock/craft-code-highlighter/commit/22ea3e3246cc08e61ae3860e5791c90001d0c232))


### Miscellaneous Chores

* update [@since](https://github.com/since) annotations to 5.0.0 for various classes and files ([31ab13e](https://github.com/LindemannRock/craft-code-highlighter/commit/31ab13eae910596f63066781d2d7e3faa0854924))

## [5.1.0](https://github.com/LindemannRock/craft-code-highlighter/compare/v5.0.0...v5.1.0) (2025-11-14)


### Features

* add Plugin Name helper extension and update settings template for dynamic plugin name display ([2457401](https://github.com/LindemannRock/craft-code-highlighter/commit/24574018aaa3a3ad047c95e6af14cdb2b181e709))


### Miscellaneous Chores

* add MIT License file ([7a0bc32](https://github.com/LindemannRock/craft-code-highlighter/commit/7a0bc32f68f547a487d7c1c95806216d8c8ec4a4))
* update .gitignore to include additional files and directories ([13fb793](https://github.com/LindemannRock/craft-code-highlighter/commit/13fb793aba63fdd23bb38b57fdc1b6f51d5af026))

## 5.0.0 (2025-11-01)


### Features

* initial Code Highlighter plugin implementation ([d10f6e9](https://github.com/LindemannRock/craft-code-highlighter/commit/d10f6e98ef707c87613816ac46f2ef4cb09fc842))
