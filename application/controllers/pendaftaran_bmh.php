<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pendaftaran_bmh extends MY_Controller {
    protected $title    = "Pendaftaran Peserta BMH";
    protected $model    = 'pendaftaran_bmh_m';
    protected $related_model= array(
        'peserta_bmh',
        'bmh',
        'pegawai'  
    );
    protected $dd_model = array(
        'peserta_bmh_m'     => 'NAMAPBMH',
        'bmh_m'             => 'IDBMH',
        'pegawai_m'         => 'NAMAP'
    );
    function get_data_from_form() {
        $data=array(
            'NAMAKBK'   => $this->input->post('txtnamakbk'),
            'STATR'     => 0
        );
        return $data;
    }
}
