<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('timetable');
    }
    
    public function index() {
        $this->load->helper('directory');
        $candidates = directory_map(DATAPATH);
        sort($candidates);
        
        $schedule = array();
        foreach($candidates as $file) {
            if(substr_compare($file, XMLSUFFIX, strlen($file) - strlen(XMLSUFFIX), strlen(XMLSUFFIX)) === 0) {
                if($file != 'master.xml') {
                    $schedule[] = array('filename' => substr($file, 0, -4));
                }
            } 
        }
        $this->data['schedule'] = $schedule;
        
        $this->getSetDaysCode();
        $this->getSetTimeslot();
        
        $this->data['daybookings'] = $this->timetable->getDayBookings();
        $this->data['periodbookings'] = $this->timetable->getPeriodBookings();
        $this->data['coursebookings'] = $this->timetable->getCourseBookings();
        
        /// Rendering
        $this->data['pagebody'] = 'welcome';
        $this->render();
    }
    
    // Gets days code to populate the dropdown menu in the view
    public function getSetDaysCode() {
        $this->data['daycode'] = $this->timetable->getDayCode();
    }
    
    // Gets timeslot/period code to populate the dropdown menu in the view
    public function getSetTimeslot() {
        $this->data['timeslot'] = $this->timetable->getTimeslot();
    }
}
