<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Verify_login extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->model('user','',TRUE);
        
    }
  
    function index() {
        //Aksi untuk melakukan validasi
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
  
        if($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            //Go to private area
            redirect('home', 'refresh');
        }      
    }
  
    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        //query the database
        $result = $this->user->login($username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'id' => $row->idk,
                    'username' => $row->namak
                );
                //set session with value from database
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            //if form validate false
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return FALSE;
        }
    }
}
/* End of file verifylogin.php */
/* Location: ./application/controllers/verifylogin.php */