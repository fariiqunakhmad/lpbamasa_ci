<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tsl
 *
 * @author Akhmad Fariiqun Awwa
 */
class tsl extends CI_Controller{
    //put your code here
    function __construct()
    {
      parent::__construct();
      $this->load->model('tslm','',TRUE);
      $this->load->model('kkm','',TRUE);
    }
    
    function index()
    {
     $data = array();

     if($query = $this->tslm->get_records())
     {
      $data['records'] = $query;
     }
     //$this->load->view('clientresource');
     $this->load->view('maincss');
     $this->load->view('nav');
     $this->load->view('daftar_tsl', $data);
     $this->load->view('mainjs');
    }
    function load_form($param=NULL) {
        $data = array();
        if ($param==NULL){
            //echo 'param kosong';
            if($query = $this->kkm->get_records()){
                $data['records'] = $query;
            }
        }else{
            //echo $param;
            if($query = $this->kkm->get_records_dd($param)){
                $data['records'] = $query;
            }
        }
        //$this->load->view('clientresource');
        $this->load->view('maincss');
        $this->load->view('nav');
        $this->load->view('form_tsl', $data, $param);
        $this->load->view('mainjs');
    }
    function create()
    {
     $data = array(
      'IDTSL' => $this->input->post('txtidtsl'),
      'NIP' => $this->input->post('txtnip'),
      'IDKK' => $this->input->post('txtidkk'),
      'TGLTSL' => $this->input->post('txttgltsl'),
      'URAIANTSL' => $this->input->post('txturaiantsl'),
      'DKTSL' => $this->input->post('rdktsl'),
      'NILAITSL' => $this->input->post('txtnominaltsl'),
      'STATTSL' => $this->input->post('rstattsl'),
     );
     echo $data['IDTSL'], $data['NIP'], $data['IDKK'], $data['TGLTSL'], $data['URAIANTSL'], $data['DKTSL'], $data['NILAITSL'], $data['STATTSL']; 
     $this->tslm->add_record($data);
     redirect('tsl', 'refresh');
    }

    function update()
    {
     $data = array(
      'title' => 'My Freshly UPDATED Title',
      'content' => 'Content should go here; it is updated.' 
     );

     $this->tslm->update_record($data);
    }


    function delete()
    {
     $this->tslm->delete_row();
     redirect('tsl', 'refresh');
    }
}
