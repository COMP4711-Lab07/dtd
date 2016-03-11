<?php

class Timetable extends CI_Model {
    protected $xml = null;
    
    /// master.xml
    protected $classperiod = array();
    protected $courses = array();
    protected $daysinweek = array();
    
    /// claass_period.xml
    protected $period = array();    
    
    /// course.xml
    protected $course = array();
    
    /// day_of_week.xml
    protected $days =  array();
    
    
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
        
        /// List of class_period.
        foreach($this->xml->classperiod->period as $period) {
            $record = new stdClass();
            $record->time = (string)$period['time'];
            
            $info_record = array();
            $index = 0;
            
            /// List of class info
            foreach($period->info as $info) {
                $record2 = new stdClass();
                $record2->day = (string)$info->day['type'];
                $record2->time = (string)$info->time['block'] + " " + $info->time;
                $record2->courseno = (string)$info->courseno;
                $record2->course_type = (string)$info->courseno['type'];
                $record2->instructor = (string)$info->instructor;
                $record2->room = (string)$info->room;
                
                $info_record[$index++] = $record2;
            }
            
            $period->info = $info_record;
            $this->period[$record->time] = $record;
        }
        
        /// List of  course in course.xml
        foreach($this->xml->courses->course as $course) {
            $record = new stdClass();
            $record->course_id = (string)$course['id'];
            
            $info_record = array();
            $index = 0;
            
            foreach($course->info as $info) {
                $record2 = new stdClass();
                $record2->day = (string)$info->day;
                $record2->time = (string)$info->time['block'];
                $record2->courseno = (string)$info->courseno;
                $record2->instructor = (string)$info->instructor;
                $record2->room = (string)$info->room;
                
                $info_record[$index++] = $record2;
            }
            
            $record->info = $info_record;
            $this->course[$record->course_id] = $record;
        }
    }
    
}

