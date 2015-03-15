<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of masa_abdi
 *
 * @author Akhmad Fariiqun Awwa
 */
class Masa_abdi extends MY_Controller {
    protected $title    = "Golongan Masa Abdi";
    protected $model    = 'masa_abdi_m';
    
    function get_data_from_form(){
        $data=array(
            'TAHUNMINMA'   => $this->input->post('txttahunmin'),
            'TAHUNMAXMA'   => $this->input->post('txttahunmax'),
            'NOMINALTA'   => $this->input->post('txtnominalta'),
            'STATR'     => 1
        );
        return $data;
    }
}
