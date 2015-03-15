<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of bmh
 *
 * @author Akhmad Fariiqun Awwa
 */
class Bmh extends MY_Controller {
    protected $title    = "Kegiatan Bimbingan Manasik Haji";
    protected $model    = 'bmh_m';
    function get_data_from_form() {
        $data=array(
            'TAHUNBMH'      => $this->input->post('txttahunbmh'),
            'PERIODEBMH'    => $this->input->post('txtperiodebmh'),
            'TGLMULAIBMH'   => $this->input->post('txttglmulaibmh'),
            'TGLAKHIRBMH'   => $this->input->post('txttglakhirbmh'),
            'BIAYABMH'      => $this->input->post('txtbiayabmh'),
            'STATR'         => 1
        );
        return $data;
    }
}    
