<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cicilan_kasbon_m extends MY_Model{
    public $_table = 'cicilankasbon';
    public $primary_key = array('IDKB', 'IDGAJI');
    public $belongs_to = array( 
        'kasbon' => array(
            'model' => 'kasbon_m',
            'primary_key' => 'IDKB' 
            ),
        'penggajian'   => array(
            'model' => 'penggajian_m',
            'primary_key' => 'IDGAJI' 
            )
        );
    function get_pegawai($idgaji){
        $query= $this->db->query("SELECT ck.IDGAJI AS IDGAJI, ck.IDKB AS IDKB, p.NIP AS NIP, p.NAMAP AS NAMA, SUM(ck.NOMINALCK) AS JUMLAH 
            FROM cicilankasbon ck, pegawai p, kasbon k
            WHERE ck.IDKB=k.IDKB AND p.NIP=k.NIP AND ck.IDGAJI='$idgaji'
            GROUP BY NIP");
        return $query->result();
    }
    function get_many_by_nip($idgaji, $nip) {
        $query= $this->db->query("SELECT ck.IDKB, ck.NOMINALCK 
            FROM cicilankasbon ck, pegawai p, kasbon k
            WHERE ck.IDKB=k.IDKB AND p.NIP=k.NIP AND ck.IDGAJI='$idgaji' AND k.NIP='$nip'");
        return $query->result();
    }
//    function get_all_by_kb(){
//        $query= $this->db->query("SELECT ck.IDKB, SUM(ck.NOMINALCK) AS JUMLAH 
//            FROM cicilankasbon ck, kasbon kb
//            WHERE ck.IDKB=kb.IDKB AND ck.STATR=0 AND kb.STATKB=0
//            GROUP BY ck.IDKB");
//        return $query->result();
//    }
    function get_sum($idgaji){
        $query= $this->db->query("SELECT IDKB, SUM(NOMINALCK) AS JUMLAH 
            FROM cicilankasbon
            WHERE STATR=0 AND IDKB IN (SELECT IDKB FROM cicilankasbon WHERE IDGAJI='$idgaji') 
            GROUP BY IDKB");
        return $query->result();
    }
}   
/* End of file cicilan_kasbon_m.php */
/* Location: ./application/models/cicilan_kasbon_m.php */
