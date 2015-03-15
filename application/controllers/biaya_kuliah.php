<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of biaya_kuliah
 *
 * @author Afa
 */
class Biaya_kuliah extends MY_Controller{
    protected $title    = "Biaya Kuliah";
    protected $model    = 'biaya_kuliah_m';
    protected $dd_model = array(
        'angkatan_m'    => 'IDA', 
        'kbk_m'         => 'NAMAKBK'
        );
    
    protected function get_data_from_form() {
        $data=array(
            'IDKBK'     => $this->input->post('txtidkbk'),
            'IDA'       => $this->input->post('txtida'),
            'BIAYA'     => $this->input->post('txtbiaya'),
            'STATR'     => 1
        );
        return $data;
    }
}
