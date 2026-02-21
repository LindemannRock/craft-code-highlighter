#!/bin/bash
#
# Update Prism.js assets from node_modules
#
# Usage:
#   1. Update version in package.json: npm install prismjs@<version> --save
#   2. Run this script: bash scripts/update-prism.sh
#
# This copies all needed Prism files from node_modules/prismjs/ into the
# plugin's asset directories, ensuring every file is from the same version.
#

set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PLUGIN_DIR="$(dirname "$SCRIPT_DIR")"
PRISM_SRC="$PLUGIN_DIR/node_modules/prismjs"
PRISM_DEST="$PLUGIN_DIR/src/web/assets/prism"

if [ ! -d "$PRISM_SRC" ]; then
    echo "Error: prismjs not found in node_modules. Run 'npm install' first."
    exit 1
fi

VERSION=$(node -p "require('$PRISM_SRC/package.json').version")
echo "Updating Prism.js assets to v$VERSION"

# --- Core ---
echo "  Copying core..."
cp "$PRISM_SRC/prism.js" "$PRISM_DEST/js/prism-core.min.js"
# Use the actual minified core
cp "$PRISM_SRC/components/prism-core.min.js" "$PRISM_DEST/js/prism-core.min.js"

# --- Language components (minified) ---
echo "  Copying language components..."
# Copy all minified language files to components/
find "$PRISM_SRC/components" -name "*.min.js" -exec cp {} "$PRISM_DEST/js/components/" \;

# Also copy components.json (language dependency map)
cp "$PRISM_SRC/components.json" "$PRISM_DEST/js/components.json"

# --- Plugins ---
echo "  Copying plugins..."

# Line numbers
cp "$PRISM_SRC/plugins/line-numbers/prism-line-numbers.min.js" "$PRISM_DEST/js/prism-line-numbers.min.js"
cp "$PRISM_SRC/plugins/line-numbers/prism-line-numbers.css" "$PRISM_DEST/css/prism-line-numbers.css"

# Toolbar (required for copy button)
cp "$PRISM_SRC/plugins/toolbar/prism-toolbar.min.js" "$PRISM_DEST/js/prism-toolbar.min.js"
cp "$PRISM_SRC/plugins/toolbar/prism-toolbar.css" "$PRISM_DEST/css/prism-toolbar.css"

# Match braces
cp "$PRISM_SRC/plugins/match-braces/prism-match-braces.min.js" "$PRISM_DEST/js/prism-match-braces.min.js"
cp "$PRISM_SRC/plugins/match-braces/prism-match-braces.min.css" "$PRISM_DEST/css/prism-match-braces.min.css"

# Inline color (JS goes to both js/ and components/ for bundle loading)
cp "$PRISM_SRC/plugins/inline-color/prism-inline-color.min.js" "$PRISM_DEST/js/prism-inline-color.min.js"
cp "$PRISM_SRC/plugins/inline-color/prism-inline-color.min.js" "$PRISM_DEST/js/components/prism-inline-color.min.js"
cp "$PRISM_SRC/plugins/inline-color/prism-inline-color.min.css" "$PRISM_DEST/css/prism-inline-color.min.css"

# Autoloader (kept for reference/future use)
cp "$PRISM_SRC/plugins/autoloader/prism-autoloader.min.js" "$PRISM_DEST/js/prism-autoloader.min.js"

# --- Core themes (from npm, minified) ---
echo "  Copying core themes..."
THEME_DEST="$PRISM_DEST/css/themes"
for theme in prism-coy prism-dark prism-funky prism-okaidia prism-solarizedlight prism-tomorrow prism-twilight; do
    cp "$PRISM_SRC/themes/${theme}.min.css" "$THEME_DEST/${theme}.min.css"
done
# Default theme
cp "$PRISM_SRC/themes/prism.min.css" "$THEME_DEST/prism-default.min.css"

echo ""
echo "Done! Prism.js updated to v$VERSION"
echo ""
echo "Note: Community themes (atom-dark, dracula, nord, etc.) are NOT updated"
echo "by this script. Update them manually from prism-themes if needed:"
echo "  https://github.com/PrismJS/prism-themes"
echo ""
echo "Next steps:"
echo "  1. Clear Craft asset caches: ddev exec 'php craft clear-caches/asset'"
echo "  2. Test frontend rendering"
echo "  3. Commit the updated files"
