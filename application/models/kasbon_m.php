<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kasbon_m extends MY_Model{
    public $_table = 'kasbon';
    public $primary_key = 'IDKB';
    public $belongs_to = array(
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
/* End of file Kasbon_m.php */
/* Location: ./application/models/Kasbon_m.php */
