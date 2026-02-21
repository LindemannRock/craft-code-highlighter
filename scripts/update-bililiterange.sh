#!/bin/bash
#
# Update bililiteRange library to v4.01
#
# Usage:
#   bash scripts/update-bililiterange.sh
#
# Downloads bililiteRange v4.01 files from GitHub and removes the old v2.6 files.
# https://github.com/dwachss/bililiteRange
#

set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PLUGIN_DIR="$(dirname "$SCRIPT_DIR")"
LIB_DIR="$PLUGIN_DIR/src/web/assets/field/js/lib"

VERSION="4.01"
BASE_URL="https://raw.githubusercontent.com/dwachss/bililiteRange/v${VERSION}"

echo "Updating bililiteRange to v$VERSION"

# --- Remove old v2.6 files ---
echo "  Removing old files..."
rm -f "$LIB_DIR/bililiteRange.js"
rm -f "$LIB_DIR/bililiteRange.fancytext.js"
rm -f "$LIB_DIR/bililiteRange.undo.js"
rm -f "$LIB_DIR/bililiteRange.util.js"
rm -f "$LIB_DIR/jquery.sendkeys.js"

# --- Download v4.01 files ---
echo "  Downloading bililiteRange.js (core + sendkeys + find)..."
curl -fsSL "$BASE_URL/bililiteRange.js" -o "$LIB_DIR/bililiteRange.js"

# historystack — separate dependency required by bililiteRange.undo.js
# https://github.com/dwachss/historystack (no releases; pinned to master)
echo "  Downloading history.js (historystack — undo dependency)..."
curl -fsSL "https://raw.githubusercontent.com/dwachss/historystack/master/history.js" -o "$LIB_DIR/history.js"

echo "  Downloading bililiteRange.undo.js..."
curl -fsSL "$BASE_URL/bililiteRange.undo.js" -o "$LIB_DIR/bililiteRange.undo.js"

echo "  Downloading bililiteRange.lines.js (indent/unindent)..."
curl -fsSL "$BASE_URL/bililiteRange.lines.js" -o "$LIB_DIR/bililiteRange.lines.js"

echo ""
echo "Done! bililiteRange updated to v$VERSION"
echo ""
echo "Files installed:"
echo "  $LIB_DIR/bililiteRange.js"
echo "  $LIB_DIR/history.js"
echo "  $LIB_DIR/bililiteRange.undo.js"
echo "  $LIB_DIR/bililiteRange.lines.js"
echo ""
echo "Next steps:"
echo "  1. Clear Craft asset caches: ddev exec 'php craft clear-caches/asset'"
echo "  2. Test the code editor field in the CP"
echo "  3. Commit the updated files"
