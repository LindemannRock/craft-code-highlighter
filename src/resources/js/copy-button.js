/**
 * Code Highlighter - Accessible Copy Button
 * 
 * Adds accessible copy-to-clipboard functionality to code blocks
 * Uses proper <button> elements with ARIA labels for screen readers
 * 
 * @author LindemannRock
 * @copyright Copyright (c) 2025 LindemannRock
 */

(function() {
    'use strict';

    if (typeof Prism === 'undefined' || !Prism.plugins.toolbar) {
        console.warn('Code Highlighter: Toolbar plugin required for copy button');
        return;
    }

    /**
     * Copy text to clipboard using modern Clipboard API
     */
    function copyToClipboard(text) {
        if (navigator.clipboard && window.isSecureContext) {
            return navigator.clipboard.writeText(text);
        } else {
            // Fallback for older browsers
            return new Promise(function(resolve, reject) {
                var textarea = document.createElement('textarea');
                textarea.value = text;
                textarea.style.position = 'fixed';
                textarea.style.left = '-999999px';
                textarea.setAttribute('aria-hidden', 'true');
                
                document.body.appendChild(textarea);
                textarea.select();
                
                try {
                    document.execCommand('copy');
                    document.body.removeChild(textarea);
                    resolve();
                } catch (err) {
                    document.body.removeChild(textarea);
                    reject(err);
                }
            });
        }
    }

    /**
     * Register accessible copy button
     */
    Prism.plugins.toolbar.registerButton('copy-to-clipboard', function(env) {
        var code = env.code;

        // Create button element (not <a> - proper semantics!)
        var button = document.createElement('button');
        button.type = 'button';
        button.className = 'code-copy-button';
        button.textContent = 'Copy';
        
        // Accessibility attributes
        button.setAttribute('aria-label', 'Copy code to clipboard');
        button.setAttribute('data-copy-state', 'copy');

        // Click handler
        button.addEventListener('click', function() {
            copyToClipboard(code).then(function() {
                // Success
                button.textContent = 'Copied!';
                button.setAttribute('data-copy-state', 'copy-success');
                button.setAttribute('aria-label', 'Code copied to clipboard');

                // Reset after 3 seconds
                setTimeout(function() {
                    button.textContent = 'Copy';
                    button.setAttribute('data-copy-state', 'copy');
                    button.setAttribute('aria-label', 'Copy code to clipboard');
                }, 3000);
            }).catch(function(err) {
                // Error
                button.textContent = 'Failed';
                button.setAttribute('data-copy-state', 'copy-error');
                button.setAttribute('aria-label', 'Failed to copy code');
                console.error('Copy failed:', err);

                // Reset after 3 seconds
                setTimeout(function() {
                    button.textContent = 'Copy';
                    button.setAttribute('data-copy-state', 'copy');
                    button.setAttribute('aria-label', 'Copy code to clipboard');
                }, 3000);
            });
        });

        return button;
    });

})();
