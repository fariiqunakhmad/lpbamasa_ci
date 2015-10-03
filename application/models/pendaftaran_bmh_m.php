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
/* End of file Pendaftaran_bmh_m.php */
/* Location: ./application/models/Pendaftaran_bmh_m.php */
