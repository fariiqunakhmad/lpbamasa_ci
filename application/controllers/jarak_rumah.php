<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of jarak_rumah
 *
 * @author Akhmad Fariiqun Awwa
 */
class Jarak_rumah extends MY_Controller {
    protected $title    = "Golongan Jarak Rumah";
    protected $model    = 'jarak_rumah_m';
    
    function get_data_from_form(){
        $data=array(
            'IDJR'          => $this->input->post('idjr'),
            'JARAKMINJR'    => $this->input->post('jarakminjr'),
            'NOMINALTT'     => $this->input->post('nominaltt'),
            'STATR'         => 0
        );
        return $data;
    }
}
