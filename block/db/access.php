<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = [

  'block/high_five:myaddinstance' => [
    'riskbitmask' => RISK_SPAM | RISK_XSS,

    'captype' => 'write',
    'contextlevel' => CONTEXT_BLOCK,
    'archetypes' => [
      'editingteacher' => CAP_ALLOW,
      'manager' => CAP_ALLOW,
    ],
    'clonepermissionsfrom' => 'moodle/my:manageblocks',
  ],

  'block/high_five:addinstance' => [
    'riskbitmask' => RISK_SPAM | RISK_XSS,

    'captype' => 'write',
    'contextlevel' => CONTEXT_BLOCK,
    'archetypes' => [
      'editingteacher' => CAP_ALLOW,
      'manager' => CAP_ALLOW,
    ],

    'clonepermissionsfrom' => 'moodle/site:manageblocks',
  ],

];
