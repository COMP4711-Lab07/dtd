<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {
    
    protected $data = array();
    
    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = 'Timetable SET_4B';
        $this->data['pagetitle'] = 'Timetable SET_4B';
    }
    
    function render() {
        $this->load->library('parser');
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }
}
