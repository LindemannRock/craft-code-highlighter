/**
 * Code Highlighter Field
 * 
 * Provides syntax-highlighted code editing in Craft CP
 * Uses bililiteRange library for contenteditable handling (MIT License)
 * https://github.com/dwachss/bililiteRange
 * 
 * @copyright Copyright (c) 2025 LindemannRock
 */

;(function($) {
    'use strict';

    /**
     * Initialize Code Highlighter field
     *
     * @param {Object} options - Field configuration
     */
    $.fn.codeHighlighterField = function(options) {
        return this.each(function() {
            var $field = $(this);
            var $code = $field.find('code');
            var $textarea = $field.find('textarea');
            var element = $code[0];

            if (!element || !$textarea.length) {
                console.warn('Code Highlighter: Missing code or textarea element');
                return;
            }

            // Initialize bililiteRange with Prism highlighting
            var editor = bililiteRange.fancyText(element, function(el) {
                if (typeof Prism !== 'undefined') {
                    Prism.highlightElement(el);
                    // Line numbers are automatically updated via Prism's 'complete' hook
                }
            });

            // Enable undo/redo functionality
            bililiteRange(editor).undo(0).data().autoindent = true;

            /**
             * Sync code editor to hidden textarea
             */
            function syncToTextarea() {
                var content = bililiteRange(element).text();
                $textarea.val(content);

                // Trigger Craft's autosave mechanism
                $textarea.trigger('input').trigger('change');
            }

            /**
             * Update hidden language input when changed
             */
            function updateLanguageInput(language) {
                var $langInput = $field.find('.code-language-input');
                if ($langInput.length) {
                    $langInput.val(language);
                }
            }

            // Handle keyboard shortcuts and formatting
            $code.on('keydown', function(e) {
                switch(e.keyCode) {
                    // Tab - Insert tab character
                    case 9:
                        e.preventDefault();
                        $code.sendkeys('\t');
                        break;

                    // [ - Unindent with Cmd/Ctrl
                    case 219:
                        if (e.ctrlKey || e.metaKey) {
                            e.preventDefault();
                            bililiteRange(element).bounds('selection').unindent();
                        }
                        break;

                    // ] - Indent with Cmd/Ctrl  
                    case 221:
                        if (e.ctrlKey || e.metaKey) {
                            e.preventDefault();
                            bililiteRange(element).bounds('selection').indent('\t');
                        }
                        break;
                }

                // Cmd/Ctrl + Z - Undo
                if ((e.ctrlKey || e.metaKey) && e.keyCode === 90) {
                    e.preventDefault();
                    bililiteRange.undo(e);
                }

                // Cmd/Ctrl + Y - Redo
                if ((e.ctrlKey || e.metaKey) && e.keyCode === 89) {
                    e.preventDefault();
                    bililiteRange.redo(e);
                }
            });

            // Sync on every keyup to keep textarea updated
            $code.on('keyup', syncToTextarea);

            // Handle paste events
            $code.on('paste', function() {
                setTimeout(syncToTextarea, 10);
            });

            // Initial sync
            syncToTextarea();
        });
    };

})(jQuery);
