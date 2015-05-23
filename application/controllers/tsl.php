<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
class Tsl extends MY_Controller {
    protected $title    = "Transaksi Sektor Lain";
    protected $model    = 'tsl_m';
    protected $related_model= array(
        'kk',
        'pegawai',
        'peg_pegawai'
    );
    protected $dd_model = array(
        'kk_m'                => 'NAMAKK',
        'pegawai_m'         => 'NAMAP'
    );
    function get_data_from_form() {
        $data=array(
            'IDTSL'     => $this->input->post('idtsl'),
            'TGLTSL'    => $this->input->post('tgltsl'),
            'URAIANTSL' => $this->input->post('uraiantsl'),
            'DKTSL'     => $this->input->post('dktsl'),
            'NOMINALTSL'=> $this->input->post('nominaltsl'),
            'IDKK'      => $this->input->post('idkk'),
            'NIP'       => $this->data['userid'],
            'PEG_NIP'   => $this->input->post('peg_nip'),
            'STATR'     => 0
        );
        return $data;
    }
}