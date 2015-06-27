<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Peran_pegawai_m extends MY_Model{
    public $_table = 'peranpegawai';
    public $primary_key = array('IDPERAN', 'NIP');
    public $belongs_to = array( 
        'peran' => array(
            'model' => 'peran_m',
            'primary_key' => 'IDPERAN' 
            ),
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            )
        );
}   
/* End of file detail_peran_m.php */
/* Location: ./application/models/detail_peran_m.php */
