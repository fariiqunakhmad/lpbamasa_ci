<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pembayaran_biaya_kuliah_m extends MY_Model{
    public $_table = 'pembayaranbiayakuliah';
    public $primary_key = 'IDPBK';
    public $belongs_to = array( 
        'periode_akademik' => array(
            'model' => 'periode_akademik_m',
            'primary_key' => 'IDPA' 
            ),
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            ),
        'mahasiswa'   => array(
            'model' => 'mahasiswa_m',
            'primary_key' => 'NIM' 
            )
        
        );
        
}   
/* End of file Pembayaran_biaya_kuliah_m.php */
/* Location: ./application/models/Pembayaran_biaya_kuliah_m.php */
