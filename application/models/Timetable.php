<?php
class Timetable extends CI_Model {
    protected $xml = null;
    protected $daybookings = array();
    protected $periodbookings = array();
    protected $coursebookings = array();
    
    protected $daycode = array();
    protected $timeslot = array();
    
    public function __construct() {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH . 'day_of_week.xml');
                
        /// Getting data for days_of_week.xml
        foreach($this->xml->days as $day) {
            $this->daycode[] = array('code' => $day['name']);
            
            foreach($day->info as $info) {
                $this->daybookings[] = new Booking($info);
            }
        }
        
        
        $this->xml = simplexml_load_file(DATAPATH . 'class_period.xml');
        /// Getting data for class_period.xml
        foreach($this->xml->period as $period) {
            $this->timeslot[] = array('code' => $period['time']);
            
            foreach($period->info as $info) {
                $this->periodbookings[] = new Booking($info);
            }
        }
        
        $this->xml = simplexml_load_file(DATAPATH . 'course.xml');
        /// Getting data for course.xml
        foreach($this->xml->course as $course) {
            foreach($course->info as $info) {
                $this->coursebookings[] = new Booking($info);
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
    
    public function getDayBookings() {
        return $this->daybookings;
    }
    
    public function getCourseBookings() {
        return $this->coursebookings;
    }
    
    public function getPeriodBookings() {
        return $this->periodbookings;
    }
    
    public function getDayCode() {
        return $this->daycode;
    }
    
    public function getTimeslot() {
        return $this->timeslot;
    }
    
    
}
class Booking {
    public $room;
    public $day;
    public $time;
    public $instructor;
    public $courseno;
    
    public function __construct($details) {
        $this->room = (string) $details->room;
        $this->instructor = (string) $details->instructor;
        $this->courseno = (string) $details->courseno;
        $this->day = (string) $details->day;
        $this->time = (string) $details->time;
    }
}
