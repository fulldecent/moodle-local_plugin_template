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
 * Code to be executed after the plugin's database schema has been installed is defined here.
 *
 * @package     local_high_five
 * @copyright   2024 William Entriken <your@mail.com>
 * @license     http://opensource.org/licenses/MIT MIT License
 */

/**
 * Custom code to be run on installing the plugin.
 */
function xmldb_local_high_five_uninstall() {

    global $DB;

    $dbman = $DB->get_manager();

    // Additional cleanup code can go here

    return true;
}
