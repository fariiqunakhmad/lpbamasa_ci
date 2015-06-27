<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of peran
 *
 * @author Akhmad Fariiqun Awwa
 */
class Peran extends MY_Controller {
    protected $title    = "Peran";
    protected $model    = 'peran_m';
    
    function get_data_from_form(){
        $data=array(
            'NAMAPERAN'   => $this->input->post('txtnamaperan'),
            'STATR'     => 0
        );
        return $data;
    }
}
