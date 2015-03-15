<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of jabatan
 *
 * @author Akhmad Fariiqun Awwa
 */
class Jabatan extends MY_Controller {
    protected $title    = "Jabatan";
    protected $model    = 'jabatan_m';
    
    function get_data_from_form(){
        $data=array(
            'NAMAJAB'   => $this->input->post('txtnamajab'),
            'NOMINALTJ' => $this->input->post('txttunjanganjab'),
            'STATR'     => 1
        );
        return $data;
    }
}
