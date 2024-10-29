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
 * Version information
 *
 * @package    local_high_five
 * @copyright  2024 William Entriken <your@mail.com>
 * @license    http://opensource.org/licenses/MIT MIT License
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'local_high_five';
$plugin->release = 2024100900;
$plugin->version = 2024100900;
$plugin->requires = 2024041200;
$plugin->maturity = MATURITY_STABLE;
$plugin->supported = [405, 405];
$plugin->cron = 0;
