/**
 * Code Highlighter Field
 *
 * Provides syntax-highlighted code editing in Craft CP.
 * Uses bililiteRange v4.01 for contenteditable handling (MIT License).
 * https://github.com/dwachss/bililiteRange
 *
 * @copyright Copyright (c) 2026 LindemannRock
 */

;(function() {
    'use strict';

    /**
     * Initialize a Code Highlighter field.
     *
     * @param {HTMLElement} fieldEl - The .code-highlighter-field container
     */
    window.initCodeHighlighterField = function(fieldEl) {
        var codeEl = fieldEl.querySelector('code');
        var textarea = fieldEl.querySelector('textarea');

        if (!codeEl || !textarea) {
            console.warn('Code Highlighter: Missing code or textarea element');
            return;
        }

        // Initialize bililiteRange on the contenteditable element
        var rng = bililiteRange(codeEl);

        // Enable autoindent (from lines extension)
        rng.data.autoindent = true;

        // Enable undo/redo — pass false to skip built-in key handler
        // (it only checks ctrlKey, not metaKey, so Cmd+Z fails on macOS)
        rng.initUndo(false);

        // Syntax highlighting via Prism
        function highlight() {
            rng.bounds('selection');
            // Ensure trailing newline for proper Prism rendering
            if (!/\n$/.test(codeEl.textContent)) {
                codeEl.textContent += '\n';
            }
            if (typeof Prism !== 'undefined') {
                Prism.highlightElement(codeEl);
            }
            rng.select();
        }

        // Initial highlight
        highlight();

        // Re-highlight on every input
        rng.listen('input', highlight);

        /**
         * Sync code editor content to hidden textarea
         */
        function syncToTextarea() {
            var content = rng.text();
            textarea.value = content;

            // Trigger Craft's autosave mechanism
            textarea.dispatchEvent(new Event('input', { bubbles: true }));
            textarea.dispatchEvent(new Event('change', { bubbles: true }));
        }

        // Handle keyboard shortcuts
        codeEl.addEventListener('keydown', function(e) {
            // Tab — insert tab character
            if (e.keyCode === 9 && !e.ctrlKey && !e.metaKey) {
                e.preventDefault();
                rng.sendkeys('{tab}');
                return;
            }

            // Cmd/Ctrl + [ — unindent
            if (e.keyCode === 219 && (e.ctrlKey || e.metaKey)) {
                e.preventDefault();
                rng.bounds('selection').unindent();
                return;
            }

            // Cmd/Ctrl + ] — indent
            if (e.keyCode === 221 && (e.ctrlKey || e.metaKey)) {
                e.preventDefault();
                rng.bounds('selection').indent('\t');
                return;
            }

            // Cmd/Ctrl + Z — undo
            if (e.keyCode === 90 && (e.ctrlKey || e.metaKey) && !e.shiftKey) {
                e.preventDefault();
                rng.undo();
                return;
            }

            // Cmd/Ctrl + Y — redo
            if (e.keyCode === 89 && (e.ctrlKey || e.metaKey)) {
                e.preventDefault();
                rng.redo();
                return;
            }

            // Cmd/Ctrl + Shift + Z — redo (macOS convention)
            if (e.keyCode === 90 && (e.ctrlKey || e.metaKey) && e.shiftKey) {
                e.preventDefault();
                rng.redo();
                return;
            }
        });

        // Sync to textarea on every keyup
        codeEl.addEventListener('keyup', syncToTextarea);

        // Sync after paste (handled by bililiteRange, but sync textarea after)
        codeEl.addEventListener('paste', function() {
            setTimeout(syncToTextarea, 10);
        });

        // Initial sync
        syncToTextarea();
    };

})();
