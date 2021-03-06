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
            ),
        'kas'       => array(
            'model'         => 'kas_m',
            'primary_key'   => 'IDKAS',
            'with'          => array('pegawai', 'kk')
            )
        );
    function get_last_by_id($param){
        $this->_database->like($this->primary_key, $param);
        return $this->order_by($this->primary_key, 'DESC')->limit(1)->get_all();
    }
}   
/* End of file Pendaftaran_wisuda_m.php */
/* Location: ./application/models/Pendaftaran_wisuda_m.php */
