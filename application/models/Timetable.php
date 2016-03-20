<?php

class Timetable extends CI_Model {
    protected $xml = null;
    protected $daybookings = array();
    protected $periodbookings = array();
    protected $coursebookings = array();
    
    
    public function __construct() {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH . 'day_of_week.xml');
        
        /// Getting data for days_of_week.xml
        foreach($this->xml->daysinweek as $days_in_week) {
            foreach($days_in_week->days as $day) {
                $this->daybookings[] = new Booking($day, $days_in_week);
            }
        }
        
        $this->xml = simplexml_load_file(DATAPATH . 'class_period.xml');
        /// Getting data for class_period.xml
        foreach($this->xml->classperiod as $classperiod) {
            foreach($classperiod->period as $period) {
                $this->periodbookings[] = new Booking($period, $classperiod);
            }
        }
        
        $this->xml = simplexml_load_file(DATAPATH . 'course.xml');
        /// Getting data for course.xml
        foreach($this->xml->courses as $courses) {
            foreach($courses->course as $couse) {
                $this->coursebooking[] = new Booking($course, $courses);
            }
        }
    }
    
    public function getOutput($block, $weekday) {
        $results = search($block, $weekday);
        if(isset($results)) {
            
        }  else {
            return null;
        }
        
    }
    
    public function getPeriod($block) {
        if(isset($this->$periodbookings[$block]))
            return $this->courses[$block];
        else
            return null;
    }
    
    public function getDay() {
        
    }

    public function getCourses() {
        
    }
    
    public function search($block, $weekday) {
        
    }
}

class Booking {
    public $room;
    public $day;
    public $time;
    public $instructor;
    public $course;
    
    public function __construct($details, $container) {
        $this->room = (string) $details->room;
        $this->instructor = (string) $details->instructor;
        $this->course = (string) $details->courseno;
        $this->day = (string) $details->day;
        $this->time = (string) $details->time;
    }
}

