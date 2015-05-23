<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kasbon extends MY_Controller {
    protected $title    = "Kasbon";
    protected $model    = 'kasbon_m';
    protected $related_model= array(
        'pegawai',
        'peg_pegawai'
    );
    protected $dd_model = array(
        'pegawai_m'         => 'NAMAP'
    );
    function get_data_from_form() {
        $data=array(
            'IDKB'          => $this->input->post('idkb'),
            'TGLKB'         => $this->input->post('tglkb'),
            'NIP'           => $this->input->post('nip'),
            'KETERANGANKB'  => $this->input->post('keterangankb'),
            'NOMINALKB'     => $this->input->post('nominalkb'),
            'QTYCICILANKB'  => $this->input->post('qtycicilankb'),
            'STATKB'        => 0,
            'PEG_NIP'       => $this->data['userid'],
            'STATR'         => 0
        );
        return $data;
    }
}