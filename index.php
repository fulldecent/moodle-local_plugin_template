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
 * High five display
 *
 * @package    local_high_five
 * @copyright  2024 William Entriken <your@mail.com>
 * @license    http://opensource.org/licenses/MIT MIT License
 */

require_once('../../config.php');
require_login();

$pageurl = new moodle_url('/local/high_five/index.php');

$PAGE->set_url($pageurl);
$PAGE->set_context(context_system::instance());
$PAGE->set_title(format_string(get_string('pluginname', 'local_high_five')));

$fromwho = 'Will';
$latesthighfivestring = get_string('latesthighfive', 'local_high_five', $fromwho);
$PAGE->set_heading(format_string($latesthighfivestring));
echo $OUTPUT->header();

echo $OUTPUT->footer();
