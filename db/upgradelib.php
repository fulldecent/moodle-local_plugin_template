<?php
// This file is part of Moodle - https://moodle.org/
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
 * Upgrade library for the local_high_five plugin.
 *
 * @package     local_high_five
 * @copyright   2024 William Entriken <your@mail.com>
 * @license     http://opensource.org/licenses/MIT MIT License
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute local_high_five upgrade from the given old version.
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_local_high_five_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    // Upgrade logic here

    return true;
}
