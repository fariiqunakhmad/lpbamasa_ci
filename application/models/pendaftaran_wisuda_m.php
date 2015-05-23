<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran_wisuda_m extends MY_Model{
    public $_table = 'pendaftaranwisuda';
    public $primary_key = 'IDPW';
    public $belongs_to = array( 
        'wisuda'        => array(
            'model' => 'wisuda_m',
            'primary_key' => 'IDW' 
            ),
        'mahasiswa'   => array(
            'model' => 'mahasiswa_m',
            'primary_key' => 'NIM' 
            ),
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            )
        );
}   
/* End of file Pendaftaran_wisuda_m.php */
/* Location: ./application/models/Pendaftaran_wisuda_m.php */
