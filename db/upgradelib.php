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
 * Upgrade functions for the local_high_five plugin.
 *
 * @package     local_high_five
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright   2024 William Entriken <github.com@phor.net>
 */

/**
 * Upgrade the local_high_five plugin.
 *
 * @param int $oldversion The version the plugin is upgrading from.
 * @return bool True if the upgrade process is successful.
 */
function local_high_five_upgrade($oldversion) {
    global $DB;

    if ($oldversion < 2024111301) {
        // Upgrade logic goes here, e.g., add/remove fields or tables.
        upgrade_plugin_savepoint(true, 2024111301, 'local', 'high_five');
    }

    return true;
}
