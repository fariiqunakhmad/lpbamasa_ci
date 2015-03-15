<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //Memanggil fungsi session Codeigniter
/**
 * Description of home
 *
 * @author Akhmad Fariiqun Awwa
 */
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'html'));
    }
    function index() {
//      if($this->session->userdata('logged_in')){
            $data['title']  ='Dasboard';
//          $session_data = $this->session->userdata('logged_in');
//          $data['username'] = $session_data['username'];
            $data['username'] = "admin";
        
            $view['css']    =array(
                'assets/css/plugins/timeline.css',
                'assets/css/plugins/morris.css'
            );
            $view['topnav'] ='admin_topnav';
            $view['sidenav']='admin_sidenav';
            $view['content']='home';
            $view['js']     =array(
                'assets/js/plugins/morris/raphael.min.js',
                'assets/js/plugins/morris/morris.min.js',
                'assets/js/plugins/morris/morris-data.js'
            );
            $this->page->view($view, $data);
//      } else {
//          //Jika tidak ada session di kembalikan ke halaman login
//          redirect('home/login', 'refresh');
//      }
    }
    function login() {
        if($this->session->userdata('logged_in')){
            redirect('home', 'refresh');
        } else {
            $this->load->helper(array('form'));
            $this->load->view('login'); 
        }
    }
    function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
}

