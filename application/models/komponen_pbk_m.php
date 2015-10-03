<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Komponen_pbk_m extends MY_Model{
    public $_table = 'komponenpbk';
    public $primary_key = array('IDPBK', 'IDWBK');
    public $belongs_to = array( 
        'pembayaran_biaya_kuliah' => array(
            'model'         => 'pembayaran_biaya_kuliah_m',
            'primary_key'   => 'IDPBK' 
            ),
        'kewajiban_biaya_kuliah'   => array(
            'model'         => 'kewajiban_biaya_kuliah_m',
            'primary_key'   => 'IDWBK',
            'with'          => array('kbk')
            )
        );
        function get_idwbk_like($param) {
            $this->_database->select('IDWBK')->like('IDWBK', $param);
            return $this->get_all();
        }
}   
/* End of file detail_peran_m.php */
/* Location: ./application/models/detail_peran_m.php */
