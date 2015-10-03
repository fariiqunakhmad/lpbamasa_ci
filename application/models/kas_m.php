<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kas_m extends MY_Model{
    public $_table = 'kas';
    public $primary_key = 'IDKAS';
    public $belongs_to = array(
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
        ),
        'kk'   => array(
            'model' => 'kk_m',
            'primary_key' => 'IDKK' 
        )
        );
    function get_last_by_id($param){
        $this->_database->like('IDKAS', $param);
        return $this->order_by('IDKAS', 'DESC')->limit(1)->get_all();
    }
    function hard_delete($param) {
        $this->_database->delete($this->_table, array($this->primary_key => $param));
    }
    function get_dk_kas_statistic($n) {
        $query= $this->db->query(
            "SELECT * 
            FROM (
                    SELECT 
                            DATE_FORMAT(TGLKAS, '%Y-%m') AS BULAN,
                            (SELECT SUM(k1.NOMINALKAS) FROM KAS k1 WHERE DATE_FORMAT(k1.TGLKAS, '%Y-%m') <= BULAN AND DKKAS=1 AND k1.NIP != '' AND k.STATR = 0) AS DEBET,
                            (SELECT SUM(k1.NOMINALKAS) FROM KAS k1 WHERE DATE_FORMAT(k1.TGLKAS, '%Y-%m') <= BULAN AND DKKAS=2 AND k1.NIP != '' AND k.STATR = 0) AS KREDIT,
                            (SELECT SUM(set_nominalkas(k1.NOMINALKAS, k1.DKKAS)) FROM KAS k1 WHERE DATE_FORMAT(k1.TGLKAS, '%Y-%m') <= BULAN AND k1.NIP != '' AND k.STATR = 0) AS SALDO
                    FROM KAS k
                    WHERE k.NIP != '' AND k.STATR = 0 
                    GROUP BY BULAN 
                    ORDER BY BULAN DESC LIMIT $n
            ) d ORDER BY d.BULAN"
        );
        return $query->result();
    }
    function get_detail_sector($dk) {
        $query= $this->db->query(
            "SELECT kk.NAMAKK AS label, SUM(k.NOMINALKAS) AS value
            FROM kas k, kelompokkeuangan kk 
            WHERE k.IDKK = kk.IDKK AND DKKAS=$dk AND k.NIP != '' AND k.STATR = 0
            GROUP BY kk.NAMAKK"
        );
        return $query->result();
    }
    function get_detail_sector_in_period($dk, $date1, $date2) {
        $q="SELECT k.IDKK AS IDKK, kk.NAMAKK AS NAMAKK, SUM(k.NOMINALKAS) AS TOTAL
            FROM kas k, kelompokkeuangan kk 
            WHERE k.IDKK = kk.IDKK AND DKKAS=$dk AND k.NIP != '' AND k.STATR = 0 AND k.TGLKAS BETWEEN '$date1' AND '$date2' 
            GROUP BY kk.NAMAKK ORDER BY IDKK"
                ;
        $query= $this->_database->query($q);
        return $query->result();
    }
}
/* End of file Kasbon_m.php */
/* Location: ./application/models/Kasbon_m.php */
