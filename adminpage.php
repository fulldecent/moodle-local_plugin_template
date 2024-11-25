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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * High Five example of Admin users only page
 *
 * @package     local_high_five
 * @license     http://opensource.org/licenses/MIT MIT License
 * @copyright   2024 William Entriken
 */


require_once(__DIR__ . '/../../config.php');

// Ensure the user is an admin.
require_login();
require_capability('moodle/site:config', context_system::instance());

$PAGE->set_url(new moodle_url('/local/high_five/adminpage.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('adminpage', 'local_high_five'));

echo $OUTPUT->header();

// Page content goes here.
echo html_writer::tag('h2', get_string('adminpage', 'local_high_five'));
echo html_writer::tag('p', get_string('adminpagedesc', 'local_high_five'));

echo $OUTPUT->footer();
