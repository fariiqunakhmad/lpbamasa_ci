<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Izin_peran_m extends MY_Model{
    public $_table = 'izinperan';
    public $primary_key = array('IDPERAN', 'IDIZIN');
    public $belongs_to = array( 
        'peran' => array(
            'model'         => 'peran_m',
            'primary_key'   => 'IDPERAN' 
            ),
        'izin'   => array(
            'model'         => 'izin_m',
            'primary_key'   => 'IDIZIN' 
            )
        );
}   
/* End of file detail_peran_m.php */
/* Location: ./application/models/detail_peran_m.php */
