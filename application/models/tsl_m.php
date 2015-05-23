<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tsl_m extends MY_Model{
    public $_table = 'tsl';
    public $primary_key = 'IDTSL';
    public $belongs_to = array( 
        'kk'        => array(
            'model' => 'kk_m',
            'primary_key' => 'IDKK' 
            ),
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            ),
        'peg_pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'PEG_NIP' 
            )
        );
}   
/* End of file Tsl_m.php */
/* Location: ./application/models/Tsl_m.php */