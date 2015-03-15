<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of wisuda
 *
 * @author Akhmad Fariiqun Awwa
 */
class Wisuda extends MY_Controller {
    protected $title    = "Periode Wisuda";
    protected $model    = 'wisuda_m';
    
    function get_data_from_form(){
        $data=array(
            'TGLW'      => $this->input->post('txttglw'),
            'TEMPATW'    => $this->input->post('txttempatw'),
            'BIAYAW'      => $this->input->post('txtbiayaw'),
            'STATR'         => 1
        );
        return $data;
    }
}
