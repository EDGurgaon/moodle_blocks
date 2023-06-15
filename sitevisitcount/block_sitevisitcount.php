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
 * Form for editing HTML block instances.
 *
 * @package   block_sitevisitcount
 

 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_sitevisitcount extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_sitevisitcount');
    }

    function has_config(){
        return true;

  }


 function get_content() {
    global $DB;
      
       if ($this->content  !== NULL) {
           return $this->content;
       }
      
      
    
           
    
    
    
    
         $sitevisits='';
    
          
        
         $visitssite = "SELECT DISTINCT userid
         FROM {logstore_standard_log}
         WHERE timecreated >= :starttime
         AND timecreated < :endtime
         AND userid > 1";
         $params = array(
         'starttime' => $starttime,
         'endtime' => $endtime
         );
         $visits = $DB->get_records_sql($visitssite, $params);
         
         $sitevisits= count($visits);
    
    
    
    $this->content = new stdClass;
    $this->content->text = "$sitevisits";
    $this->content->footer = "";
    
    
        }
    
    }