<?php

class Timetable extends CI_Model {
    protected $xml = null;
    
    
    public function __construct() {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH . 'day_of_week.xml');
        
        /// Getting data for days_of_week.xml
        foreach($this->xml->daysinweek as $days_in_week) {
            foreach($days_in_week->days as $days) {
                foreach($days->info as $info) {
                    
                }
            }
        }
        
        $this->xml = simplexml_load_file(DATAPATH . 'class_period.xml');
        /// Getting data for class_period.xml
        foreach($this->xml->classperiod as $classperiod) {
            foreach($classperiod->period as $period) {
                foreach($period->info as $info) {
                    
                }
            }
        }
        
        $this->xml = simplexml_load_file(DATAPATH . 'course.xml');
        /// Getting data for course.xml
        foreach($this->xml->courses as $courses) {
            foreach($courses->course as $couse) {
                foreach($course->info as $info) {
                    
                }
            }
        }
        
    }
    
}

