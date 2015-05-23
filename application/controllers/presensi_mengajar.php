<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of absensi
 *
 * @author Akhmad Fariiqun Awwa
 */
class Presensi_mengajar extends MY_Controller{
    protected $title    = "Presensi Mengajar";
    protected $model    = 'presensi_mengajar_m';
    protected $dd_model = array(
        'kelas_mk_m'    => 'NAMAKMK', 
        'pertemuan_m'   => 'PERTEMUAN',
        'pegawai_m'     => 'NAMAP'
        );
    
    protected function get_data_from_form() {
        $data=array(
            'IDKMK'         => $this->input->post('idkmk'),
            'PERTEMUAN'     => $this->input->post('pertemuan'),
            'NIP'           => $this->input->post('nip'),
            'TGLMENGAJAR'   => $this->input->post('tglmengajar'),
            'STATR'         => 0
        );
        return $data;
    }
    
}
