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
 * Library file for the local_high_five plugin.
 *
 * Contains functions that extend Moodle's core behavior, such as triggering
 * events when specific pages are accessed.
 *
 * @package     local_high_five
 * @license     http://opensource.org/licenses/MIT MIT License
 * @copyright   2024 William Entriken
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Hook into the dashboard page load and log the event.
 *
 * @param global_navigation $navigation
 * @return void
 */
function local_high_five_extend_navigation(global_navigation $navigation) {
    global $PAGE, $USER;

    // Check if the current page is the dashboard.
    if ($PAGE->pagetype === 'my-index') {
        // Prepare event data.
        $data = [
            'context' => \context_user::instance($USER->id),
            'userid' => $USER->id,
        ];

        // Trigger the event.
        $event = \local_high_five\event\dashboard_viewed::create($data);
        $event->trigger();
    }
}
