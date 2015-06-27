<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    private $data;
    private $view;
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'html'));
        //check session
        is_loged_in();
        //innitial session data
        $session_data = $this->session->userdata('logged_in');
        //print_r($session_data);
        $this->data['userid']   = $session_data['id'];
        $this->data['username'] = $session_data['name'];
        $this->data['authority']= $session_data['authority'];
        $this->data['useras']   = $session_data['useras'];
        
        $this->view['sidenav']='template/sidenav'.$this->data['useras']['id'];
        $this->view['topnav'] ='template/topnav';
        //print_session('Home');

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

