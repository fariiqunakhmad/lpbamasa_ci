<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Komponen_gaji_pegawai_m extends MY_Model{
    public $_table = 'komponengajipegawai';
    public $primary_key = 'IDKGP';
    public $belongs_to = array( 
        'kg' => array(
            'model' => 'kg_m',
            'primary_key' => 'IDKG' 
            ),
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            )
        );
}   
/* End of file Komponen_gaji_pegawai_m.php */
/* Location: ./application/models/Komponen_gaji_pegawai_m.php */
