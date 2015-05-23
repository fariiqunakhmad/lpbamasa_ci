<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of wisuda
 *
 * @author Akhmad Fariiqun Awwa
 */
class Wisuda extends MY_Controller {
    protected $title    = "Periode Wisuda";
    protected $model    = 'wisuda_m';
    protected $related_model= array(
        'pegawai'  
    );
    protected $dd_model = array(
        'pegawai_m'         => 'NAMAP'
    );
    function get_data_from_form(){
        $data=array(
            'NIP'       => $this->input->post('nip'),
            'TGLW'      => $this->input->post('tglw'),
            'PERIODEW'  => $this->input->post('periodew'),
            'TEMPATW'   => $this->input->post('tempatw'),
            'BIAYAW'    => $this->input->post('biayaw'),
            'STATR'     => 0
        );
        return $data;
    }
}
