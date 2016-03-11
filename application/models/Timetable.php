<?php

class Timetable extends CI_Model {
    protected $xml = null;
    
    
    public function __construct() {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH . 'master.xml');
        
        /// List day of week
        foreach($this->xml->daysinweek->days as $days) {
            $record = new stdClass();
            $record->name = (string)$days['name'];
            
            $info_record = array();
            $index = 0;
            /// List of class info
            foreach($days->info as $info) {
                $record2 = new stdClass();
                $record2->time = (string)$info->time; 
                $record2->course_type = (string)$info->courseno['type'];
                $record2->courseno = (string)$info->courseno;
                $record2->instructor = (string)$info->instructor;
                $record2->room = (string)$info->room;
                
                $info_record[$index++] = $record2;
            }
            $record->info = $info_record;
            $this->days[$record->name] = $record;
        }
        
        /// Getting data for days_of_week.xml
        foreach($this->xml->daysinweek->days as $days) {
            foreach($days->info as $info) {
                
            }
        }
        /// Getting data for class_period.xml
        foreach($this->xml->classperiod->period as $period) {
            foreach($period->info as $info) {
                
            }
        }
        /// Getting data for course.xml
        foreach($this->xml->courses->course as $course) {
            foreach($course->info as $info) {
                
            }
        }
      
    }
    
}

