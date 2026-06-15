# Installation & Setup

> [!NOTE]
> Code Highlighter is in active development and not yet available on the Craft Plugin Store. Install via Composer for now.

## Composer

Add the package to your project using Composer and the command line.

1. Open your terminal and go to your Craft project:

```bash
cd /path/to/project
```

2. Then tell Composer to require the plugin, and Craft to install it:

```bash title="Composer"
composer require lindemannrock/craft-code-highlighter && php craft plugin/install code-highlighter
```

```bash title="DDEV"
ddev composer require lindemannrock/craft-code-highlighter && ddev craft plugin/install code-highlighter
```

## Copy Config File (Optional)

To set the default theme, language list, and editor defaults from a config file, copy the sample config to your project:

```bash
cp vendor/lindemannrock/craft-code-highlighter/src/config.php config/code-highlighter.php
```

See [Configuration](configuration.md) for the available options.

## Quick Start

See [Quickstart](quickstart.md) for the fastest path from install to your first highlighted code block.
