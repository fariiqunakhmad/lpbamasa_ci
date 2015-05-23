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
        $this->data['userid'] = $session_data['id'];
        $this->data['username'] = $session_data['name'];
        $this->data['userauthority'] = $session_data['authority'];
        
        $this->view['topnav'] ='admin_topnav';
        $this->view['sidenav']='admin_sidenav';
    }
    function index() {
        
        $this->data['title']  ='Dasboard';
        $this->view['css']    =array(
            'assets/css/plugins/timeline.css',
            'assets/css/plugins/morris.css'
        );
        $this->view['content']='home';
        $this->view['js']     =array(
            'assets/js/plugins/morris/raphael.min.js',
            'assets/js/plugins/morris/morris.min.js',
            'assets/js/plugins/morris/morris-data.js'
        );
        $this->page->view($this->view, $this->data);
    }

}

