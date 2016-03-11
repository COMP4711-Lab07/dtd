<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {
    
    public function index() {
        $this->load->model('timetable');
        
        /// Table for data
        $this->load->library('table');
        $data = array(
            array('Name', 'Color', 'Size'),
            array('Fred', 'Blue', 'Small'),
            array('Mary', 'Red', 'Large'),
            array('John', 'Green', 'Medium')	
        );
        $this->data['thetable'] = $this->table->generate($data);
                
        /// Rendering
        $this->data['pagebody'] = 'welcome';
        $this->render();
    }
    
    public function search() {
        
    }
}
