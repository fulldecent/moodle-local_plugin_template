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

/**
 * Class cleanup
 *
 * Deletes old high fives from the database.
 */
class cleanup extends \core\task\scheduled_task
{
    /**
     * Return the task name.
     *
     * @return string
     */
    public function get_name()
    {
        return get_string('highfivescleanup', 'local_high_five');
    }

    /**
     * Execute the task.
     *
     * @return void
     */
    public function execute()
    {
        $db_manager = new \local_high_five\db_manager();
        $db_manager->delete_old_high_fives();
    }
}
