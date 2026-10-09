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
 * Code to be executed after the plugin's database schema has been uninstalled.
 *
 * @package     local_high_five
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright   2024 William Entriken <github.com@phor.net>
 */

/**
 * Uninstall the local_high_five plugin.
 * This will drop the database table and clean up any data related to the plugin.
 *
 * @return void
 */
function xmldb_local_high_five_uninstall() {
    global $DB;

    // Define the table.
    $table = new xmldb_table('local_high_five');

    // Drop the table if it exists.
    if ($DB->get_manager()->table_exists($table)) {
        $DB->get_manager()->drop_table($table);
    }
}

