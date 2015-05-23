<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Detail_penggajian_m extends MY_Model{
    public $_table = 'detailpenggajian';
    public $primary_key = array('IDKGP', 'IDGAJI');
    public $belongs_to = array( 
        'komponen_gaji_pegawai' => array(
            'model' => 'komponen_gaji_pegawai_m',
            'primary_key' => 'IDKGP' 
            ),
        'penggajian'   => array(
            'model' => 'penggajian_m',
            'primary_key' => 'IDGAJI' 
            )
        );
}   
/* End of file detail_penggajian_m.php */
/* Location: ./application/models/detail_penggajian_m.php */
