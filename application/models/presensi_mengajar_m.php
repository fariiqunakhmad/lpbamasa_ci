<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Presensi_mengajar_m extends MY_Model{
    public $_table = 'presensimengajar';
    public $primary_key = array('PERTEMUAN', 'IDKMK');
    public $belongs_to = array(
        'kelas_mk'   => array(
            'model' => 'kelas_mk_m',
            'primary_key' => 'IDKMK' 
            ),
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            )
        );
}   
/* End of file Presensi_mengajar_m.php */
/* Location: ./application/models/Presensi_mengajar_m.php */
