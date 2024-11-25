// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/* global confetti, M */

/* global confetti */

define(['jquery', 'core/notification'], function ($, Notification) {
    return {
        init: function () {
            $('#make-high-five').on('click', function () {
                // Send AJAX request to make the high five
                $.ajax({
                    url: M.cfg.wwwroot + '/local/high_five/make_high_five_ajax.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            // Load the confetti library and trigger the effect
                            const url = 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js';
                            $.getScript(url).done(function () {
                                if (typeof confetti !== 'undefined') {
                                    confetti({
                                        particleCount: 200,
                                        spread: 70,
                                        origin: { y: 0.9 }
                                    });
                                }
                            });
                            // Show success message and reload the page
                            Notification.addNotification({
                                message: response.message,
                                type: 'success'
                            });
                            setTimeout(function () {
                                window.location.reload();
                            }, 2000); // Adjust delay as needed
                        } else {
                            // Show failure message
                            Notification.addNotification({
                                message: response.message,
                                type: 'error'
                            });
                        }
                    },
                    error: function () {
                        Notification.addNotification({
                            message: 'An error occurred while processing the request.',
                            type: 'error'
                        });
                    }
                });
            });
        }
    };
});
