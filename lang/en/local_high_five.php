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
 * High Five plugin main page display
 *
 * @package     local_high_five
 * @license     http://opensource.org/licenses/MIT MIT License
 * @copyright   2024 William Entriken
 */

$string['pluginname'] = 'High Five';

$string['nohighfives'] = 'There are no High Fives yet. You can be the first!';
$string['latesthighfive'] = 'Latest High Five is from <em>{$a->name}</em>, with ID number <em>{$a->id}</em>.';
$string['makehighfive'] = 'Make a High Five 🖐️';
$string['highfivefail'] = 'High Five failed. Please try again.';

$string['highfive:view'] = 'View High Five';
$string['highfive:manage'] = 'Manage High Five settings';

// Example Setting strings
$string['enable_feature'] = 'Enable High Five Feature'; // Title for the setting.
$string['enable_feature_desc'] = 'Check this box to enable the High Five feature on the site.'; // Description for the setting.
// String for custom logging example
$string['eventdashboardviewed'] = 'Dashboard viewed';
// Example Admin page strings
$string['adminpage'] = 'High Five admin page';
$string['adminpagedesc'] = 'This is the admin page for the High Five plugin.';
// Example Scheduled task to run background processing string
$string['highfivescleanup'] = 'High Fives cleanup task';
