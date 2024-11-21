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
 * Scheduled task to run background processing
 *
 * @package     local_high_five
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright   2024 William Entriken
 */

namespace local_high_five\task;

defined('MOODLE_INTERNAL') || die();

class process_high_fives extends \core\task\scheduled_task {

    /**
     * Return the task name.
     */
    public function get_name() {
        return get_string('processhighfivesname', 'local_high_five');
    }

    /**
     * Execute the task.
     */
    public function execute() {
        // Add your processing logic here.
        mtrace('Processing High Fives...');
    }
}
