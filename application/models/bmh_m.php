<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bmh_m extends MY_Model{
    public $_table = 'bmh';
    public $primary_key = 'IDBMH';
    public $belongs_to = array(
        'pegawai'   => array(
            'model'         => 'pegawai_m',
            'primary_key'   => 'NIP' 
            )
        );
}   
/* End of file bmh_m.php */
/* Location: ./application/models/bmh_m.php */
