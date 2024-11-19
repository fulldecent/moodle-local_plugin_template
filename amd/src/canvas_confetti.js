/* global confetti, M */

define(['jquery'], function($) {
    return {
        init: function() {
            $('#plugin-name').on('click', function() {
                // Trigger the confetti effect after loading the confetti library
                fetch('https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js')
                    .then(function() {
                        // Ensure the confetti library is loaded and then trigger the effect
                        if (typeof confetti !== 'undefined') {
                            confetti({
                                particleCount: 200,
                                spread: 70,
                                origin: { y: 0.9 }
                            });
                        } else {
                            // Log the error using Moodle's logging system
                            M.logger.error('Confetti library failed to load: confetti is undefined.');
                        }
                    })
                    .catch(function(error) {
                        // Log the error using Moodle's logger
                        M.logger.error('Confetti library failed to load: ' + error.message);
                    });
            });
        }
    };
});
