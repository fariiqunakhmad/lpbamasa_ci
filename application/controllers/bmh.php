<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bmh extends MY_Controller {
    protected $title    = "Kegiatan Bimbingan Manasik Haji";
    protected $model    = 'bmh_m';
    protected $related_model= array(
        'pegawai'  
    );
    protected $dd_model = array(
        'pegawai_m'         => 'NAMAP'
    );
    function get_data_from_form() {
        $data=array(
            'NIP'           => $this->input->post('nip'),
            'TAHUNBMH'      => $this->input->post('tahunbmh'),
            'PERIODEBMH'    => $this->input->post('periodebmh'),
            'TGLMULAIBMH'   => $this->input->post('tglmulaibmh'),
            'TGLAKHIRBMH'   => $this->input->post('tglakhirbmh'),
            'BIAYABMH'      => $this->input->post('biayabmh'),
            'STATR'         => 0
        );
        return $data;
    }
}    
