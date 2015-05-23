<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pembayaran_biaya_kuliah extends MY_Controller {
    protected $title    = "Pembayaran Biaya Kuliah";
    protected $model    = 'pembayaran_biaya_kuliah_m';
    protected $related_model= array(
        'mahasiswa',
        'pegawai',
        'periode_akademik'
    );
    protected $dd_model = array(
        'mahasiswa_m'       => 'NAMAM',
        'pegawai_m'         => 'NAMAP',
        'periode_akademik_m'=> 'IDPA'
    );
    
    function get_data_from_form() {
        $data=array(
            'NAMAKBK'   => $this->input->post('txtnamakbk'),
            'STATR'     => 0
        );
        return $data;
    }
    function detail($param) {
        
    }
}
