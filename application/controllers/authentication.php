<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //Memanggil fungsi session Codeigniter
/**
 * Description of home
 *
 * @author Akhmad Fariiqun Awwa
 */
class Authentication extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('pegawai_m');
        $this->load->model('hak_akses_m');
        $this->load->model('detail_hak_akses_m');
        $this->load->model('mahasiswa_m');
        
    }
    function index() {
        if($this->session->userdata('logged_in')){
            redirect('home', 'refresh');
        } else {
            $this->load->helper(array('form'));
            $this->load->view('login'); 
        }
    }
    function verify_login() {
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
        
        $param=array(
            'NIP' => $username,
            'PASSP'=> md5($password)
        );
        $result = $this->pegawai_m->limit(1)->get_by($param);
        //echo var_dump($result);
        if($result) {
            $user_data = array(
                'id'        => $result->NIP,
                'name'      => $result->NAMAP
            );
            $detail_hak_akses = $this->detail_hak_akses_m->with('hak_akses')->get_many_by('NIP', $result->NIP);
            foreach ($detail_hak_akses as $key => $value) {
                $user_data['authority'][$key]=$value->hak_akses->NAMAHAK;
            }
            $this->session->set_userdata('logged_in', $user_data);
            return TRUE;
        } else {
            $param=array(
                'NIM' => $username,
                'PASSM'=> md5($password)
            );
            $result = $this->mahasiswa_m->limit(1)->get_by($param);
            if ($result) {
                $user_data = array(
                    'id'        => $result->NIP,
                    'name'      => $result->NAMAP,
                    'authority' => 'mahasiswa'
                );
                $this->session->set_userdata('logged_in', $user_data);
                return TRUE;
            } else {
                //if form validate false
                $this->form_validation->set_message('check_database', 'Invalid username or password');
                return FALSE;
            }
        }
    }
    function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
}

