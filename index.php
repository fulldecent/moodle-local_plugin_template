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
 * High Five admin high five page.
 * 
 * Only admin can access.
 * Admin can make a high five.
 * See the latest high five.
 *
 * @package     local_high_five
 * @license     http://opensource.org/licenses/MIT MIT License
 * @copyright   2024 William Entriken
 */

require_once('../../config.php');
require_once('classes/db_manager.php');

// Require user to be logged in.
require_login();
require_capability('moodle/site:config', context_system::instance());

// Page setup.
$pageurl = new moodle_url('/local/high_five/index.php');
$context = context_system::instance();
$PAGE->set_url($pageurl);
$PAGE->set_context($context);
$PAGE->set_title(get_string('pluginname', 'local_high_five'));
$PAGE->requires->js_call_amd('local_high_five/high_five_button', 'init');
$PAGE->set_heading(get_string('pluginname', 'local_high_five'));

// Get page content.
$dbManager = new local_high_five\db_manager();
$latestHighFive = $dbManager->get_latest_high_five();

// Output page content.
echo $OUTPUT->header();
if ($latestHighFive) {
    echo html_writer::tag('p', get_string('latesthighfive', 'local_high_five', ['name' => $latestHighFive->name, 'id' => $latestHighFive->id]));
} else {
    echo html_writer::tag('p', get_string('nohighfives', 'local_high_five'));
}
echo html_writer::tag('button', get_string('makehighfive', 'local_high_five'), ['id' => 'make-high-five']);
echo $OUTPUT->footer();
