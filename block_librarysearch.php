<?php
// This file is part of Moodle - http://moodle.org/
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
 * Library Search block
 *
 * @package    block_librarysearch
 * @copyright  Skylar Kelty <S.Kelty@kent.ac.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_librarysearch extends block_base
{
    public function init() {
        $this->title = get_string('pluginname', 'block_librarysearch');
    }

    public function applicable_formats() {
        return array(
            'site' => true,
            'my-index' => true
        );
    }

    public function get_content () {

        if ($this->content !== null) {
            return $this->content;
        }

        $url = new \moodle_url("/blocks/librarysearch/redirect.php");
        $sesskey = sesskey();

        $this->content = new stdClass();
        $this->content->footer = '';
        $this->content->text = <<<HTML
        <div class="form-container">
            <form method="POST" action="${url}" target="_blank">
                <input type="hidden" name="sesskey" value="${sesskey}">
                <div class="left">
                    <input name="q" class="" value="" placeholder="Library search" id="search_field" type="text" accesskey="s">
                </div>

                <div class="right">
                    <input id="goButton" type="submit" value="Search" class="submit" accesskey="g">
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
HTML;

        return $this->content;
    }
}
