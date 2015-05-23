<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Biaya_kuliah extends MY_Controller{
    protected $title    = "Biaya Kuliah";
    protected $model    = 'biaya_kuliah_m';
    protected $related_model= array(
        'angkatan',
        'komponen_biaya_kuliah'  
    );
    protected $dd_model = array(
        'angkatan_m'    => 'IDA', 
        'kbk_m'         => 'NAMAKBK'
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
