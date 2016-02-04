<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Detail_penggajian_m extends MY_Model{
    public $_table = 'detailpenggajian';
    public $primary_key = array('IDKGP', 'IDGAJI');
    public $belongs_to = array( 
        'komponen_gaji_pegawai' => array(
            'model' => 'komponen_gaji_pegawai_m',
            'primary_key' => 'IDKGP' 
            ),
        'kg' => array(
            'model' => 'kg_m',
            'primary_key' => 'IDKGDP' 
            ),
        'penggajian'   => array(
            'model' => 'penggajian_m',
            'primary_key' => 'IDGAJI' 
            )
        );
        function get_pegawai($idgaji){
            $query= $this->db->query("SELECT dp.IDGAJI AS IDGAJI, dp.NIPDP AS NIP, p.NAMAP AS NAMA, SUM(dp.SUBTOTALDP) AS JUMLAH 
                FROM detailpenggajian dp, pegawai p
                WHERE p.NIP=dp.NIPDP AND dp.IDGAJI='$idgaji'
                GROUP BY dp.NIPDP");
            return $query->result();
        }
        function get_last_gaji_by_pegawai($nip) {
            $query= $this->db->query("SELECT IDGAJI, SUM(SUBTOTALDP) AS NOMINAL FROM `detailpenggajian` WHERE NIPDP='$nip' AND STATR=0 GROUP BY IDGAJI ORDER BY IDGAJI DESC LIMIT 1");
            return $query->result();
        }
}   
/* End of file detail_penggajian_m.php */
/* Location: ./application/models/detail_penggajian_m.php */
