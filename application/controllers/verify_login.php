<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Verify_login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('user_m','',TRUE);
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
        //echo $username, $password;
        $result = $this->user_m->login($username,md5($password));
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'id' => $row->NIP,
                    'username' => $row->NAMAP
                );
                $sess_array['id'];
                $sess_array['username'];
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