<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_C extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_m','',TRUE);
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
    }
  
    function index() {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
            $this->load->view('home_v', $data);
        } else {
        //If no session, redirect to login page
            redirect('login_c', 'refresh');
        }
    }
  
    function logout() {
         //remove all session data
         $this->session->unset_userdata('logged_in');
         $this->session->sess_destroy();
         redirect(base_url('index.php/login_c'), 'refresh');
     }
  
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */

