<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Kbk extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('kbk_m');
    }
    function index() {
        $data['records'] = $this->kbk_m->get_all();
        
        $this->load->view('maincss');
        $this->load->view('nav');
        $this->load->view('daftar_kbk', $data);
        $this->load->view('mainjs');
    }
    
    function load_form() {
        $param=$this->uri->segment(3);
        $data = array();
        if ($param === FALSE){
            //echo 'param kosong';
            $data['records'] = NULL;
            $data['action'] = base_url().$this->uri->slash_segment(1).'insert';
        }else{
            //echo $param;
            $data['records'] = $this->kbk_m->get($param);
            $data['action'] = base_url().$this->uri->slash_segment(1).'update/'.$param;
        }
        $this->load->view('maincss');
        $this->load->view('nav');
        $this->load->view('form_kbk', $data);
        $this->load->view('mainjs');
    }
    function insert() {
        $data=array(
            'NAMAKBK'   => $this->input->post('txtnamakbk'),
            'STATR'     => 1
        );
        $this->kbk_m->insert($data);
        redirect($this->uri->segment(1), 'refresh');
    }
    function update() {
        $param= $this->uri->segment(3);
        $data=array(
            'IDKBK'     => $param,
            'NAMAKBK'   => $this->input->post('txtnamakbk'),
            'STATR'     => 1
        );
        $this->kbk_m->update($param, $data);
        redirect($this->uri->segment(1), 'refresh');
    }
    function delete()
    {
     $this->kbk_m->delete($this->uri->segment(3));
     redirect($this->uri->segment(1), 'refresh');
    }
}
