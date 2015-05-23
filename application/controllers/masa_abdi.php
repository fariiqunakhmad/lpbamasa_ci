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
            'IDMA'   => $this->input->post('idma'),
            'TAHUNMINMA'   => $this->input->post('tahunminma'),
            'NOMINALTA'   => $this->input->post('nominalta'),
            'STATR'     => 0
        );
        return $data;
    }
}
