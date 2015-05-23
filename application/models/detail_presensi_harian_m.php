<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_presensi_harian_m extends MY_Model{
    public $_table = 'detailph';
    public $primary_key =array('IDJPH','TGLPH');
    public $belongs_to = array( 
        'pegawai' => array(
            'model' => 'pegawai_m', 
            'primary_key' => 'NIP' 
            ),
        'jenis_presensi_harian' => array(
            'model' => 'jenis_presensi_harian_m', 
            'primary_key' => 'IDJPH' 
            )
        );
}   
/* End of file detail_presensi_harian_m.php */
/* Location: ./application/models/detail_presensi_harian_m.php */
