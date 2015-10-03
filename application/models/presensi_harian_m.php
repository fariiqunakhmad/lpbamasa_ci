<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Presensi_harian_m extends MY_Model{
    public $_table = 'presensiharian';
    public $primary_key =array('NIP','IDJPH','TGLHK');
    public $belongs_to = array( 
        'pegawai' => array(
            'model' => 'pegawai_m', 
            'primary_key' => 'NIP' 
            ),
        'jenis_presensi_harian' => array(
            'model' => 'jenis_presensi_harian_m', 
            'primary_key' => 'IDJPH' 
            ),
        'hari_kerja' => [
            'model' => 'hari_kerja_m', 
            'primary_key' => 'TGLHK'
        ]
        );
    function get_like($idjph, $key, $value) {
        $this->_database->where('IDJPH', $idjph); 
        $this->_database->like($key, $value);
        return $this->get_all();
    }
    function rekap_2($bulan) {
        $this->_database->select('NIP, COUNT(NIP) AS JUMLAHHADIR');
        $this->_database->like('TGLHK', $bulan);
        $this->_database->group_by('NIP');
        
        $param=array('IDJPH'=>2, 'KETPH'=>'h');
        return $this->get_many_by($param);
    }
        
}   
/* End of file detail_presensi_harian_m.php */
/* Location: ./application/models/detail_presensi_harian_m.php */
