<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Kbk extends MY_Controller {
    protected $title    = "Komponen Biaya Kuliah";
    protected $model    = 'kbk_m';
    
    function get_data_from_form() {
        $data=array(
            'NAMAKBK'   => $this->input->post('txtnamakbk'),
            'STATR'     => 0
        );
        return $data;
    }
}
