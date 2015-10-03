<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penggajian_m extends MY_Model{
    public $_table = 'penggajian';
    public $primary_key = 'IDGAJI';
    public $belongs_to = array(
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            ),
        'kas1'       => array(
            'model'         => 'kas_m',
            'primary_key'   => 'IDKAS',
            'with'          => array('pegawai', 'kk')
            ),
        'kas2'       => array(
            'model'         => 'kas_m',
            'primary_key'   => 'KAS_IDKAS',
            'with'          => array('pegawai', 'kk')
            )
        );
    function get_last_by_id($param){
        $this->_database->like('IDGAJI', $param);
        return $this->order_by('IDGAJI', 'DESC')->limit(1)->get_all();
    }
}   
/* End of file Penggajian_m.php */
/* Location: ./application/models/Penggajian_m.php */
