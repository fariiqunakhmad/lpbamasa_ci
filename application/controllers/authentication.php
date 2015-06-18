<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //Memanggil fungsi session Codeigniter
/**
 * Description of home
 *
 * @author Akhmad Fariiqun Awwa
 */
class Authentication extends CI_Controller{
    protected $user_data;
    function __construct(){
        parent::__construct();
        $this->load->model('pegawai_m');
        $this->load->model('hak_akses_m');
        $this->load->model('detail_hak_akses_m');
        $this->load->model('mahasiswa_m');
        $this->user_data=$this->session->userdata('logged_in');
        
    }
    function index() {
        
        if($this->session->userdata('logged_in')){
            if($this->session->userdata('last_page')){
                redirect($this->session->userdata('last_page'), 'refresh');
            }  else {
                redirect('home', 'refresh');
            }
            
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
            redirect('authentication', 'refresh');
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
        if($result) {
            $this->user_data['id']       = $result->NIP;
            $this->user_data['name']     = $result->NAMAP;

            $detail_hak_akses =$this->detail_hak_akses_m->with('hak_akses')->get_many_by('NIP', $result->NIP);
           
            foreach ($detail_hak_akses as $key => $value) {
                $this->user_data['authority'][$key]['id']   =$value->IDHAK;
                $this->user_data['authority'][$key]['name'] =$value->hak_akses->NAMAHAK;
            }
            $this->user_data['useras']['id']  =$this->user_data['authority'][0]['id'];
            $this->user_data['useras']['name']=$this->user_data['authority'][0]['name'];
            $this->user_data['logged_in']=TRUE;
            $this->session->set_userdata('logged_in', $this->user_data);
            return TRUE;
        } else {
            $param=array(
                'NIM' => $username,
                'PASSM'=> md5($password)
            );
            $result = $this->mahasiswa_m->limit(1)->get_by($param);
            if ($result) {
                $this->user_data['id']        = $result->NIP;
                $this->user_data['name']      = $result->NAMAP;
                $this->user_data['authority'] = 'mahasiswa';
                
                $this->session->set_userdata('logged_in', $this->user_data);
                return TRUE;
            } else {
                //if form validate false
                $this->form_validation->set_message('check_database', 'Invalid username or password');
                return FALSE;
            }
        }
    }
    function set_user_as() {
        $param=$this->uri->segment(3);
        $ha=  $this->hak_akses_m->get_by('IDHAK',$param);
        $this->user_data['useras']['id']  =$ha->IDHAK;
        $this->user_data['useras']['name']=$ha->NAMAHAK;
        $this->session->set_userdata('logged_in', $this->user_data);
        //print_r($this->user_data);
        redirect('home', 'refresh');
    }
    function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
}

