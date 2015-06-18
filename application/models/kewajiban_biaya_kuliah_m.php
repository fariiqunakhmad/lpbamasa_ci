<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kewajiban_biaya_kuliah_m extends MY_Model{
    public $_table = 'kewajibanbk';
    public $primary_key = array('IDKBK', 'IDA', 'IDPA', 'NIM');
    public $belongs_to = array( 
        'kbk' => array(
            'model' => 'kbk_m',
            'primary_key' => 'IDKBK' 
            ),
        'angkatan'   => array(
            'model' => 'angkatan_m',
            'primary_key' => 'IDA' 
            ),
        'periode_akademik' => array(
            'model' => 'periode_akademik_m',
            'primary_key' => 'IDPA' 
            ),
        'mahasiswa' => array(
            'model' => 'mahasiswa_m',
            'primary_key' => 'NIM' 
            ),
        'pembayaran_biaya_kuliah'   => array(
            'model' => 'pembayaran_biaya_kuliah_m',
            'primary_key' => 'IDPBK' 
            ),
        'biaya_kuliah'=>array(
            'model'=>'biaya_kuliah_m',
            'primary_key'=>array('IDKBK','IDA')
        )
        );
}   
/* End of file Kewajiban_biaya_kuliah_m.php */
/* Location: ./application/models/Kewajiban_biaya_kuliah_m.php */
