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
 * Course Category Finder Block
 * This plugin enable the user to search courses on the LMS by entering the name of the course.
 * It searches the keywords in course names and course descriptions to generate the search list.
 * Course Category Finder is an extended version of the Course Finder Block. An Option is added to
 * enable the user to search for categories as well as the courses.
 *
 * @author: Azmat Ullah, Talha Noor
 * @copyright  Copyrights © 2012 - 2013 | 3i Logic (Pvt) Ltd.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_search_course_category extends block_base {
    public function init() {
        $this->title = get_string('search_course_category', 'block_search_course_category');
    }
    public function get_content() {
        global $CFG, $OUTPUT;
        if ($this->content !== null) {
            return $this->content;
        }
        $name = 'search_course_category';
        // Block Variable.
        $strgo      = get_string('go');
        $co         = get_string('course', 'block_search_course_category');
        $ca         = get_string('category', 'block_search_course_category');
        // Body of Block.
        $this->content         = new stdClass;
        $this->content->text   = '';
        $this->content->text  .= '<form action="'.$CFG->wwwroot.'/blocks/'.$name.'/'.$name.'.php" method="post">';
        // The combobox is added to choose the search option.
        $this->content->text  .= '<select id="searchform_combo" name="combo_option"><option value="course">'.$co.'</option>';
        $this->content->text  .= '<option value="category">'.$ca.'</option></select>';
        $this->content->text  .= '<input id="searchform_search" name="search" type="text" size="20" />';
        $this->content->text  .= '<button id="searchform_button" type="submit" title="Search">'.$strgo.'</button><br/>';
        $this->content->text  .= '</form>';
        return $this->content;
    }
}
