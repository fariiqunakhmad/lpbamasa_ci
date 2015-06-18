<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Presensi_harian_m extends MY_Model{
    public $_table      = 'presensiharian';
    public $primary_key = array('IDJPH', 'TGLPH');
    public $belongs_to  = array( 
        'jenisph'  => array(
            'model' => 'jenis_presensi_harian_m', 
            'primary_key' => 'IDJPH' 
            )
        );
    public $has_many= array( 
        'detailph' => array(
            'model' => 'detail_presensi_harian_m', 
            'primary_key' => 'TGLPH' 
            ) 
        );
    function get_dates($idjph, $bulan=NULL) {
        //echo $like;
        
        $this->_database->select('TGLPH');
        if($bulan!=NULL){
            
            $this->_database->where('IDJPH', $idjph);
            $this->_database->like('TGLPH', $bulan);
            $dates = $this->get_all();
        } else {
            $dates = $this->get_many_by('IDJPH', $idjph);
        }
        return $dates;
    }
    function get_months($idjph) {
        $query= $this->db->query("SELECT DATE_FORMAT(TGLPH, '%Y-%m') AS BULAN, COUNT(IDJPH) AS JUMLAH FROM presensiharian WHERE IDJPH = $idjph AND STATR = 0 GROUP BY DATE_FORMAT(TGLPH, '%Y%m')");
        return $query->result();
    }
}   
/* End of file Presensi_harian_m.php */
/* Location: ./application/models/Presensi_harian_m.php */
