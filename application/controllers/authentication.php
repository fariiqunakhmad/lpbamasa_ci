<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //Memanggil fungsi session Codeigniter
/**
 * Description of home
 *
 * @author Akhmad Fariiqun Awwa
 */
class Authentication extends CI_Controller{
    protected $user_data, $user_access;
    function __construct(){
        parent::__construct();
        $this->user_data=$this->session->userdata('logged_in');
    }
    function index() {
        if($this->session->userdata('logged_in') ){
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
        $this->load->model('pegawai_m');
        $result = $this->pegawai_m->limit(1)->get_by($param);
        if($result) {
            $this->user_data['id']       = $result->NIP;
            $this->user_data['name']     = $result->NAMAP;
            $this->set_peran_pegawai($result->NIP);
            
            $min=4;
            foreach ($this->user_data['authority'] as $key => $value) {
                if($key<$min){
                    $min=$key;
                }
            }
            $this->set_user_as($min);
            
            $this->set_session();
            
            return TRUE;
        } else {
            $param=array(
                'NIM' => $username,
                'PASSM'=> md5($password)
            );
            $this->load->model('mahasiswa_m');
            $resultm = $this->mahasiswa_m->limit(1)->get_by($param);
            if ($resultm) {
                $this->user_data['id']        = $resultm->NIM;
                $this->user_data['name']      = $resultm->NAMAM;
                
                $this->user_data['authority'][4] = 'Mahasiswa';
                
                $this->set_user_as(4);
                $this->set_session();
                return TRUE;
            } else {
                //if form validate false
                $this->form_validation->set_message('check_database', 'Invalid username or password');
                return FALSE;
            }
        }
    }
    private function set_peran_pegawai($NIP) {
        $this->load->model('peran_m');
        $this->load->model('peran_pegawai_m');
        $peran_pegawai =$this->peran_pegawai_m->with('peran')->get_many_by('NIP', $NIP);
        if ($peran_pegawai) {
            foreach ($peran_pegawai as $value) {
                $this->user_data['authority'][$value->IDPERAN] =$value->peran->NAMAPERAN;
            }
            return TRUE;
        }
    }
    private function set_izin($idperan) {
        $this->load->model('izin_m');
        $this->load->model('izin_peran_m');
        $izin_peran =$this->izin_peran_m->with('izin')->get_many_by('IDPERAN', $idperan);
        if($izin_peran){
            foreach ($izin_peran as $key =>$value) {
                $u_access[$key]=$value->izin->FUNGSIIZIN;
            }
            $this->user_access=  array_chunk($u_access, 20);
            return TRUE;
        }
    }
    private function set_user_as($idperan) {
        $this->load->model('peran_m');
        $ha=  $this->peran_m->get_by('IDPERAN',$idperan);
        if($ha){
            $this->user_data['useras']['id']  =$ha->IDPERAN;
            $this->user_data['useras']['name']=$ha->NAMAPERAN;
            $this->set_izin($idperan);
            return TRUE;
        }  else {
            return FALSE;
        }
    }
    function change_user_as() {
        $idperan=$this->uri->segment(3);
        $this->unset_session_access();
        $this->set_user_as($idperan);
        $this->set_session();
        redirect('home', 'refresh');
    }
    private function set_session(){
        $this->session->set_userdata('logged_in', $this->user_data);
        for($i=0; $i<count($this->user_access);$i++){
            $this->session->set_userdata('access'.$i, $this->user_access[$i]);
        } 
    }
    function logout(){
        $this->session->unset_userdata('logged_in');
        $this->unset_session_access();
        session_destroy();
        redirect('home', 'refresh');
    }
    private function unset_session_access() {
        $i=0;
        while ($this->session->userdata('access'.$i)) {
            $this->session->unset_userdata('access'.$i);
            $i++;
        }
    }
}

