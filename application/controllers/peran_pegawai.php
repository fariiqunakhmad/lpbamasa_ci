<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Peran_pegawai extends MY_Controller{
    protected $title    = "Peran Pegawai";
    protected $model    = 'peran_pegawai_m';
    protected $related_model= array(
        'peran',
        'pegawai'  
    );
    protected $dd_model = array(
        'peran_m'   => 'NAMAPERAN', 
        'pegawai_m' => 'NAMAP'
        );
    
    protected function get_data_from_form() {
        $data=array(
            'IDPERAN'   => $this->input->post('txtidperan'),
            'NIP'       => $this->input->post('txtnip'),
            'STATR'     => 0
        );
        return $data;
    }
}
