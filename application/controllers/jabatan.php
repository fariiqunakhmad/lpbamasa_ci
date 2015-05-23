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
            'IDJAB'     => $this->input->post('idjab'),
            'NAMAJAB'   => $this->input->post('namajab'),
            'NOMINALTJ' => $this->input->post('nominaltj'),
            'STATR'     => 0
        );
        return $data;
    }
}
