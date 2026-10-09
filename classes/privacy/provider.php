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
 * Privacy subsystem implementation for local_high_five.
 *
 * @package    local_high_five
 * @copyright  2024 William Entriken <github.com@phor.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_high_five\privacy;

use core_privacy\local\metadata\collection;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\approved_userlist;
use core_privacy\local\request\contextlist;
use core_privacy\local\request\userlist;
use core_privacy\local\request\writer;

/**
 * Privacy provider for the names stored in local_high_five.
 *
 * The table stores a person's full name and no user id. Records are matched
 * against the user's current full name.
 *
 * @package    local_high_five
 * @copyright  2024 William Entriken <github.com@phor.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements
    \core_privacy\local\metadata\provider,
    \core_privacy\local\request\core_userlist_provider,
    \core_privacy\local\request\plugin\provider {
    /**
     * Describe the personal data stored by this plugin.
     *
     * @param collection $collection The collection to add items to.
     * @return collection The updated collection.
     */
    public static function get_metadata(collection $collection): collection {
        $collection->add_database_table('local_high_five', [
            'name' => 'privacy:metadata:local_high_five:name',
        ], 'privacy:metadata:local_high_five');

        return $collection;
    }

    /**
     * Get the contexts that contain personal data for this user.
     *
     * @param int $userid The user to search.
     * @return contextlist The contexts used by this plugin for the user.
     */
    public static function get_contexts_for_userid(int $userid): contextlist {
        $contextlist = new contextlist();
        if (self::records_for_user($userid)) {
            $contextlist->add_system_context();
        }
        return $contextlist;
    }

    /**
     * Get the users who have personal data in this context.
     *
     * @param userlist $userlist The userlist to add users to.
     */
    public static function get_users_in_context(userlist $userlist) {
        global $DB;

        if (!$userlist->get_context() instanceof \context_system) {
            return;
        }

        $stored = [];
        foreach ($DB->get_records('local_high_five') as $record) {
            $stored[$record->name] = true;
        }
        if (!$stored) {
            return;
        }

        $users = $DB->get_records('user', ['deleted' => 0]);
        foreach ($users as $user) {
            if (isset($stored[fullname($user)])) {
                $userlist->add_user($user->id);
            }
        }
    }

    /**
     * Export personal data for the approved contexts.
     *
     * @param approved_contextlist $contextlist The approved contexts to export.
     */
    public static function export_user_data(approved_contextlist $contextlist) {
        if (!count($contextlist)) {
            return;
        }

        $records = self::records_for_user($contextlist->get_user()->id);
        if (!$records) {
            return;
        }

        $highfives = [];
        foreach ($records as $record) {
            $highfives[] = ['name' => $record->name];
        }

        writer::with_context(\context_system::instance())->export_data(
            [get_string('privacy:path', 'local_high_five')],
            (object) ['highfives' => $highfives]
        );
    }

    /**
     * Delete all personal data in the context.
     *
     * @param \context $context The context to delete data for.
     */
    public static function delete_data_for_all_users_in_context(\context $context) {
        global $DB;

        if ($context->contextlevel == CONTEXT_SYSTEM) {
            $DB->delete_records('local_high_five');
        }
    }

    /**
     * Delete personal data for one user in the approved contexts.
     *
     * @param approved_contextlist $contextlist The approved contexts and user.
     */
    public static function delete_data_for_user(approved_contextlist $contextlist) {
        global $DB;

        if (!count($contextlist)) {
            return;
        }

        foreach (self::records_for_user($contextlist->get_user()->id) as $record) {
            $DB->delete_records('local_high_five', ['id' => $record->id]);
        }
    }

    /**
     * Delete personal data for the listed users in this context.
     *
     * @param approved_userlist $userlist The approved context and users.
     */
    public static function delete_data_for_users(approved_userlist $userlist) {
        global $DB;

        if (!$userlist->get_context() instanceof \context_system) {
            return;
        }

        foreach ($userlist->get_userids() as $userid) {
            foreach (self::records_for_user($userid) as $record) {
                $DB->delete_records('local_high_five', ['id' => $record->id]);
            }
        }
    }

    /**
     * Return high five records whose stored name is this user's current full name.
     *
     * @param int $userid The user id.
     * @return array The matching records.
     */
    protected static function records_for_user(int $userid): array {
        global $DB;

        $user = \core_user::get_user($userid, '*', IGNORE_MISSING);
        if (!$user || !empty($user->deleted)) {
            return [];
        }

        $fullname = fullname($user);
        $matches = [];
        foreach ($DB->get_records('local_high_five') as $record) {
            if ($record->name === $fullname) {
                $matches[] = $record;
            }
        }
        return $matches;
    }
}
