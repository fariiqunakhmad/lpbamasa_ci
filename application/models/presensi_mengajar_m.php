<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Presensi_mengajar_m extends MY_Model{
    public $_table = 'presensimengajar';
    public $primary_key = array('IDKMK','PERTEMUAN');
    public $belongs_to = array(
        'kelas_mk'   => array(
            'model' => 'kelas_mk_m',
            'primary_key' => 'IDKMK' 
            ),
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            )
        );
    function rekap_per_dosen($bulan) {
        $this->_database->select('NIP, COUNT(NIP) AS JUMLAHHADIR');
        $this->_database->group_by('NIP');
        $this->_database->like('TGLMENGAJAR', $bulan);
        return $this->get_all();
    }
    function get_data_for_ta($bulan) {
        $this->_database->select('NIP, TGLMENGAJAR as TGL');
        $this->_database->like('TGLMENGAJAR', $bulan);
        return $this->get_all();
    }
}   
/* End of file Presensi_mengajar_m.php */
/* Location: ./application/models/Presensi_mengajar_m.php */
