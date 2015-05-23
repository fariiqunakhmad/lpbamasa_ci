<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of hak_akses
 *
 * @author Akhmad Fariiqun Awwa
 */
class Hak_akses extends MY_Controller {
    protected $title    = "Hak Akses";
    protected $model    = 'hak_akses_m';
    
    function get_data_from_form(){
        $data=array(
            'NAMAHAK'   => $this->input->post('txtnamahak'),
            'STATR'     => 0
        );
        return $data;
    }
}
