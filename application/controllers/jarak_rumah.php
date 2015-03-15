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
            'JARAKMINJR'   => $this->input->post('txtjarakmin'),
            'JARAKMAXJR'   => $this->input->post('txtjarakmax'),
            'NOMINALTT'   => $this->input->post('txtnominaltt'),
            'STATR'     => 1
        );
        return $data;
    }
}
