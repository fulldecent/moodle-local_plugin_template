<?php
defined('MOODLE_INTERNAL') || die();

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
    global $PAGE;
    parent::get_required_javascript();
    $PAGE->requires->js_call_amd('local_high_five/high_five_button', 'init');
}


    /**
     * Returns the block content.
     *
     * @return stdClass
     */
    public function get_content() {
        global $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
            
        }

        // Initialize content properly
        $this->content = new stdClass();
        $this->content->text = '';
        require_once($CFG->dirroot . '../local/high_five/classes/db_manager.php');

        $this->content = new stdClass();
        $dbManager = new local_high_five\db_manager();
        $latestHighFive = $dbManager->get_latest_high_five();

        if ($latestHighFive) {
            $this->content->text = html_writer::tag('p', get_string('latesthighfive', 'local_high_five', [
                'name' => $latestHighFive->name,
                'id' => $latestHighFive->id
            ]));
        } else {
            $this->content->text = html_writer::tag('p', get_string('nohighfives', 'local_high_five'));
        }

        // Add "Make High Five" button with AJAX functionality.
$this->content->text .= html_writer::tag('div',
html_writer::tag('button', get_string('makehighfive', 'local_high_five'), [
    'id' => 'make-high-five',
    'class' => 'btn btn-primary'
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