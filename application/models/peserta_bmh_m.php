<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Peserta_bmh_m extends MY_Model{
    public $_table = 'pesertabmh';
    public $primary_key = 'IDPBMH';
    public $belongs_to = array(
        'pekerjaan'         => array(
            'model'         => 'pekerjaan_m',
            'primary_key'   => 'IDJ' 
        ),
        'kota_lahir'        => array(
            'model'         => 'kota_m',
            'primary_key'   => 'IDK' 
        ),
        'kota'              => array(
            'model'         => 'kota_m',
            'primary_key'   => 'KOT_IDK' 
        )
    );
}   
/* End of file Peserta_bmh_m.php */
/* Location: ./application/models/Peserta_bmh_m.php */
