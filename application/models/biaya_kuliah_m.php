<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Biaya_kuliah_m extends MY_Model{
    public $_table = 'biayakuliah';
    public $primary_key =array('IDKBK','IDA');
    public $belongs_to = array( 
        'komponen_biaya_kuliah' => array(
            'model' => 'kbk_m',
            'primary_key' => 'IDKBK' 
            ),
        'angkatan'   => array(
            'model' => 'angkatan_m',
            'primary_key' => 'IDA' 
            )
        );
}   
/* End of file biaya_kuliah_m.php */
/* Location: ./application/models/biaya_kuliah_m.php */
