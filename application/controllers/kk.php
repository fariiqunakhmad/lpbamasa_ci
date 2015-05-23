<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Kk extends MY_Controller {
    protected $title    = "Kelompok Keuangan";
    protected $model    = 'kk_m';
    
    function get_data_from_form(){
        $data=array(
            'IDKK'     => $this->input->post('txtidkk'),
            'NAMAKK'   => $this->input->post('txtnamakk'),
            'STATR'     => 0
        );
        return $data;
    }
}
