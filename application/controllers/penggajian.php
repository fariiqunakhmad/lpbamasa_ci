<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Penggajian extends MY_Controller {
    protected $title    = "Penggajian";
    protected $model    = 'penggajian_m';
    protected $related_model= array(
        'pegawai'  
    );
    function get_data_from_form() {
        $data=array(
            'IDGAJI'        => $this->input->post('idgaji'),
            'BULANGAJI'     => $this->input->post('bulangaji'),
            'TAHUNGAJI'     => $this->input->post('tahungaji'),
            'TGLSETUPGAJI'  => date("Y-m-d"),
            'NIP'           => $this->data['userid'],
            'STATR'         => 0
        );
        return $data;
    }
    public function insert() {
        //parent::insert();
        $this->load->model('detail_presensi_harian_m');
        $i = $this->detail_presensi_harian_m->rekap_kehadiran();
        print_r($i);
        
        
        
    }
}
