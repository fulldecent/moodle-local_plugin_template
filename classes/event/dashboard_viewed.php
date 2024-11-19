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
 * Event class for logging when the dashboard is viewed.
 *
 * @package     local_high_five
 * @license     http://opensource.org/licenses/MIT MIT License
 * @copyright   2024 William Entriken
 */

namespace local_high_five\event;

defined('MOODLE_INTERNAL') || die();

/**
 * Event triggered when the user views the dashboard.
 *
 *  Defines the metadata and behavior of the "Dashboard viewed" event
 *  triggered by users accessing the dashboard.
 */
class dashboard_viewed extends \core\event\base {

    /**
     *  This function is used to initialize the event and define its base properties like
     *  the event name, description, and related data.
     *
     * @return void
     */
    protected function init() {
        $this->data['crud'] = 'r'; // 'r' = Read, indicating a view event.
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->data['objecttable'] = ''; // No specific DB table associated.
    }

    /**
     *  Returns the name of the event.
     *
     * @return mixed
     */
    public static function get_name() {
        return get_string('eventdashboardviewed', 'local_high_five');
    }

    /**
     * Returns the description of the event.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '{$this->userid}' viewed the dashboard.";
    }

    /**
     * Returns the URL associated with the event.
     *
     * @return \moodle_url string The URL for the event.
     */
    public function get_url() {
        return new \moodle_url('/my'); // Dashboard URL.
    }
}
