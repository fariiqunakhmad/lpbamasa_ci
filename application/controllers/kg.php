<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kg
 *
 * @author Akhmad Fariiqun Awwa
 */
class Kg extends MY_Controller {
    protected $title    = "Komponen Gaji";
    protected $model    = 'kg_m';
    
    function get_data_from_form(){
        $data=array(
            'NAMAKG'   => $this->input->post('txtnamakg'),
            'STATR'     => 0
        );
        return $data;
    }
}
