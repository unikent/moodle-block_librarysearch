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

        $url = "http://primo-direct-eu-sb.hosted.exlibrisgroup.com/primo_library/libweb/action/search.do?fn=search&amp;ct=search";

        $this->content = new stdClass();
        $this->content->footer = '';
        $this->content->text = <<<HTML
<form method="get" action="${url}" enctype="application/x-www-form-urlencoded; charset=utf-8" target="_blank">
<input id="fn" type="hidden" value="search" name="fn">
<input id="ct" type="hidden" value="search" name="ct">
<input id="initialSearch" type="hidden" value="true" name="initialSearch">
<input id="instCode" type="hidden" value="44KEN">
<input id="pcToken" type="hidden" value="0">
<input type="hidden" id="mode" name="mode" value="Basic">
<input type="hidden" id="tab" name="tab" value="default_tab">
<input type="hidden" id="indx" name="indx" value="1">
<input type="hidden" id="dum" name="dum" value="true">
<input type="hidden" name="srt" value="rank" id="str">
<input type="hidden" id="vid" name="vid" value="44KEN_VU1">
<input type="hidden" id="frbg" name="frbg" value="">


<input name="vl(freeText0)" class="" value="" id="search_field" type="text" accesskey="s">
<input class="EXLSelectedScopeId" type="hidden" value="CSCOP_ALL">

<input id="goButton" type="submit" value="Search" class="submit" accesskey="g">
</form>
HTML;

        return $this->content;
    }
}
