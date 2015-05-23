<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penggajian_m extends MY_Model{
    public $_table = 'penggajian';
    public $primary_key = 'IDGAJI';
    public $belongs_to = array(
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            )
        );
}   
/* End of file Penggajian_m.php */
/* Location: ./application/models/Penggajian_m.php */
