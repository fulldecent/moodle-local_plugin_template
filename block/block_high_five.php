<?php

class block_high_five extends block_base
{
  public function init()
  {
    $this->title = get_string('pluginname', 'block_high_five');
  }

  public function get_content()
  {
    if ($this->content !== null) {
      return $this->content;
    }

    $this->content = new stdClass;
    $this->content->text = 'Your block content here';
    $this->content->footer = '';

    return $this->content;
  }

  public function applicable_formats()
  {
    return array('my' => true);
  }
}
