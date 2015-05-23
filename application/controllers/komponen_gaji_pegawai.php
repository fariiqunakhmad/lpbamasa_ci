<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Komponen_gaji_pegawai extends MY_Controller{
    protected $title    = "Komponen Gaji Pegawai";
    protected $model    = 'komponen_gaji_pegawai_m';
    protected $related_model= array(
        'kg',
        'pegawai'  
    );
    protected $dd_model = array(
        'kg_m'      => 'NAMAKG', 
        'pegawai_m' => 'NAMAP'
        );
    
    protected function get_data_from_form() {
        $data=array(
            'IDKBK'     => $this->input->post('txtidkbk'),
            'IDA'       => $this->input->post('txtida'),
            'BIAYA'     => $this->input->post('txtbiaya'),
            'STATR'     => 0
        );
        return $data;
    }
}
