<?php
// This file is part of the High Five plugin for Moodle
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * High Five plugin main page display
 *
 * @package     local_high_five
 * @license     http://opensource.org/licenses/MIT MIT License
 * @copyright   2024 William Entriken
 */

require_once('../../config.php');

// Require user to be logged in.
require_login();

// Page setup.
$pageurl = new moodle_url('/local/high_five/index.php');
$context = context_system::instance();

$PAGE->set_url($pageurl);
$PAGE->set_context($context);
$PAGE->set_title(get_string('pluginname', 'local_high_five'));

// Include JavaScript.
$PAGE->requires->js_call_amd('local_high_five/canvas_confetti', 'init');

// Prepare page heading.
$sender = 'Will'; // Replace with dynamic data if needed.
$highfiveheading = get_string('latesthighfive', 'local_high_five', $sender);
$PAGE->set_heading($highfiveheading);

// Output page content.
echo $OUTPUT->header();
echo html_writer::tag('h2', '🖐️', ['id' => 'plugin-name']);

// Add external confetti library script.
echo html_writer::script('', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js', [
    'integrity' => 'sha384-abcdef123456', // Update integrity hash if needed.
    'crossorigin' => 'anonymous',
]);

echo $OUTPUT->footer();

