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

namespace local_high_five;

use moodle_database;
use dml_exception;

/**
 * Class db_manager
 *
 * Provides methods for interacting with the 'local_high_five' table in Moodle.
 *
 * @package     local_high_five
 * @license     http://opensource.org/licenses/MIT MIT License
 * @copyright   2024 William Entriken <github.com@phor.net>
 */
class db_manager
{
    /**
     * @var moodle_database Database connection instance.
     */
    protected $db;

    /**
     * Constructor to initialize the database connection.
     *
     * @throws dml_exception If there is a problem with the database connection.
     */
    public function __construct()
    {
        global $DB;
        $this->db = $DB;
    }

    /**
     * Retrieves the latest high five record from the high_five table.
     * 
     * @return stdClass|false The record object or false if not found.
     * @throws dml_exception If there is a problem with the database query.
     */
    public function get_latest_high_five(): \stdClass|false
    {
        $record = $this->db->get_record_sql('SELECT * FROM {local_high_five} ORDER BY id DESC LIMIT 1');
        return $record;
    }

    /**
     * Make a high five using the current user's name and return success status.
     */
    public function make_high_five(): void
    {
        global $USER;

        $record = new \stdClass();
        $record->name = fullname($USER);
        $this->db->insert_record('local_high_five', $record);
    }

    /**
     * Delete old high fives (everything except the latest one).
     */
    public function delete_old_high_fives(): void
    {
        $latest = $this->get_latest_high_five();
        if ($latest) {
            $this->db->delete_records_select('local_high_five', 'id != ' . $latest->id);
        }
    }
}
