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
}   
/* End of file Presensi_harian_m.php */
/* Location: ./application/models/Presensi_harian_m.php */
