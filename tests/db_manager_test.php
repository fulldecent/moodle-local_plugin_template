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

namespace local_high_five\tests;

use local_high_five\db_manager;
use advanced_testcase;

/**
 * Class db_manager_test
 *
 * Unit tests for the db_manager class in the local_high_five plugin. These tests verify basic functionality like
 * class existence and instantiation to ensure the plugin works as expected for unit testing in the Catalyst CI system.
 *
 * @package     local_high_five
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright   2024 William Entriken <github.com@phor.net>
 */
class db_manager_test extends advanced_testcase {
    /**
     * Test if the db_manager class exists.
     *
     * @covers \local_high_five\db_manager
     */
    public function test_class_exists() {
        $this->assertTrue(class_exists('\local_high_five\db_manager'), 'The db_manager class does not exist.');
    }

    /**
     * Test if an instance of db_manager can be created.
     *
     * @covers \local_high_five\db_manager
     */
    public function test_instance_creation() {
        $dbmanager = new db_manager();
        $this->assertInstanceOf(db_manager::class, $dbmanager, 'Failed to instantiate db_manager.');
    }
}
