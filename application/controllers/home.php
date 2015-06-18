<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    private $data;
    private $view;
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'html'));
        //check session
        if(!$this->session->userdata('logged_in')){
            redirect('authentication', 'refresh');
        }
        
        //innitial session data
        $session_data = $this->session->userdata('logged_in');
        //print_r($session_data);
        $this->data['userid']   = $this->session->userdata('logged_in')['id'];
        $this->data['username'] = $this->session->userdata('logged_in')['name'];
        $this->data['authority']= $this->session->userdata('logged_in')['authority'];
        $this->data['useras']   = $this->session->userdata('logged_in')['useras'];
        
        $this->view['sidenav']='sidenav'.$this->data['useras']['id'];
        $this->view['topnav'] ='topnav';
    }
    function index() {
        
        $this->data['title']  ='Dasboard';
        $this->view['css']    =array(
            'assets/css/plugins/timeline.css',
            'assets/css/plugins/morris.css'
        );
        //$this->view['content']='home';
        $this->view['js']     =array(
            'assets/js/plugins/morris/raphael.min.js',
            'assets/js/plugins/morris/morris.min.js',
            'assets/js/plugins/morris/morris-data.js'
        );
        $this->page->view($this->view, $this->data);
    }

}

