<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pendaftaran_bmh_m extends MY_Model{
    public $_table = 'pendaftaranbmh';
    public $primary_key = 'IDDAFTARBMH';
    public $belongs_to = array( 
        'peserta_bmh' => array(
            'model' => 'peserta_bmh_m',
            'primary_key' => 'IDPBMH' 
            ),
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            ),
        'bmh'   => array(
            'model' => 'bmh_m',
            'primary_key' => 'IDBMH' 
            )
        );
}   
/* End of file Pendaftaran_bmh_m.php */
/* Location: ./application/models/Pendaftaran_bmh_m.php */
