<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hari_kerja_m extends MY_Model{
    public $_table      = 'harikerja';
    public $primary_key = 'TGLHK';
    public $has_many= array( 
        'presensi_harian' => array(
            'model' => 'presensi_harian_m', 
            'primary_key' => array('NIP','IDJPH','TGLHK') 
            ) 
        );
    function get_dates($bulan=NULL) {
        $this->_database->select('TGLHK');
        $this->_database->order_by("TGLHK", "asc");
        if($bulan!=NULL){
            $this->_database->like('TGLHK', $bulan);
            $dates = $this->get_all();
        } else {
            $dates = $this->get_all();
        }
        return $dates;
    }
    function get_months() {
        $query= $this->db->query("SELECT DATE_FORMAT(TGLHK, '%Y-%m') AS BULAN FROM harikerja WHERE STATR = 0 GROUP BY DATE_FORMAT(TGLHK, '%Y%m')");
        return $query->result();
    }
}   
/* End of file Presensi_harian_m.php */
/* Location: ./application/models/Presensi_harian_m.php */
