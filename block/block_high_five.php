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
 * High five block.
 *
 * @package    block_high_five
 * @copyright  2024 William Entriken <github.com@phor.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_high_five extends block_base {
    /**
     * Initialize block title.
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_high_five');
    }

    /**
     * Include JavaScript for AJAX handling.
     */
    public function get_required_javascript() {
        parent::get_required_javascript();
        $this->page->requires->js_call_amd('local_high_five/high_five_button', 'init');
    }

    /**
     * Returns the block content.
     *
     * @return stdClass
     */
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        // Moodle loads this file through blocks/high_five, a symlink to this directory.
        // PHP resolves __DIR__ to the real block directory, so the plugin root is one level up.
        require_once(dirname(__DIR__) . '/classes/db_manager.php');

        $this->content = new stdClass();
        $dbmanager = new local_high_five\db_manager();
        $latesthighfive = $dbmanager->get_latest_high_five();

        if ($latesthighfive) {
            $this->content->text = html_writer::tag('p', get_string('latesthighfive', 'local_high_five', [
                'name' => $latesthighfive->name,
                'id' => $latesthighfive->id,
            ]));
        } else {
            $this->content->text = html_writer::tag('p', get_string('nohighfives', 'local_high_five'));
        }

        // Add the button that the AMD module binds to.
        $this->content->text .= html_writer::tag(
            'div',
            html_writer::tag('button', get_string('makehighfive', 'local_high_five'), [
                'id' => 'make-high-five',
                'class' => 'btn btn-primary',
            ]),
            ['class' => 'make-high-five-button']
        );

        $this->content->footer = '';

        return $this->content;
    }

    /**
     * Block can be added to any page.
     */
    public function applicable_formats() {
        return ['site-index' => true, 'my' => true, 'course-view' => true];
    }
}
