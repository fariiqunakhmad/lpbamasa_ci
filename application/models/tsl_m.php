<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tsl_m extends MY_Model{
    public $_table      = 'tsl';
    public $primary_key = 'IDTSL';
    public $belongs_to  = array( 
        'pegawai'   => array(
            'model'         => 'pegawai_m',
            'primary_key'   => 'NIP' 
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
/* End of file Tsl_m.php */
/* Location: ./application/models/Tsl_m.php */