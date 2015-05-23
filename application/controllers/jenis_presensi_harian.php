<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of jabatan
 *
 * @author Akhmad Fariiqun Awwa
 */
class Jenis_presensi_harian extends MY_Controller {
    protected $title    = "Jenis Presensi Harian";
    protected $model    = 'jenis_presensi_harian_m';
    
    function get_data_from_form(){
        $data=array(
            'NAMAJPH' => $this->input->post('namajph'),
            'KETERANGANJPH' => $this->input->post('keteranganjph'),
            'STATR'     => 0
        );
        return $data;
    }
}
