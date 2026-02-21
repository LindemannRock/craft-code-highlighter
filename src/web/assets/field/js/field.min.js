/**
 * Code Highlighter Field
 *
 * Provides syntax-highlighted code editing in Craft CP.
 * Uses bililiteRange v4.01 for contenteditable handling (MIT License).
 * https://github.com/dwachss/bililiteRange
 *
 * @copyright Copyright (c) 2026 LindemannRock
 */
!function(){"use strict";window.initCodeHighlighterField=function(e){var t=e.querySelector("code"),n=e.querySelector("textarea");if(t&&n){var i=bililiteRange(t);i.data.autoindent=!0,i.initUndo(!1),o(),i.listen("input",o),t.addEventListener("keydown",function(e){return 9!==e.keyCode||e.ctrlKey||e.metaKey?219===e.keyCode&&(e.ctrlKey||e.metaKey)?(e.preventDefault(),void i.bounds("selection").unindent()):221===e.keyCode&&(e.ctrlKey||e.metaKey)?(e.preventDefault(),void i.bounds("selection").indent("\t")):90!==e.keyCode||!e.ctrlKey&&!e.metaKey||e.shiftKey?89===e.keyCode&&(e.ctrlKey||e.metaKey)||90===e.keyCode&&(e.ctrlKey||e.metaKey)&&e.shiftKey?(e.preventDefault(),void i.redo()):void 0:(e.preventDefault(),void i.undo()):(e.preventDefault(),void i.sendkeys("{tab}"))}),t.addEventListener("keyup",d),t.addEventListener("paste",function(){setTimeout(d,10)}),d()}else console.warn("Code Highlighter: Missing code or textarea element");function o(){i.bounds("selection"),/\n$/.test(t.textContent)||(t.textContent+="\n"),"undefined"!=typeof Prism&&Prism.highlightElement(t),i.select()}function d(){var e=i.text();n.value=e,n.dispatchEvent(new Event("input",{bubbles:!0})),n.dispatchEvent(new Event("change",{bubbles:!0}))}}}();