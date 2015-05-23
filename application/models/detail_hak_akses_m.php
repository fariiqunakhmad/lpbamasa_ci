<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Detail_hak_akses_m extends MY_Model{
    public $_table = 'detailhakakses';
    public $primary_key = array('IDHAK', 'NIP');
    public $belongs_to = array( 
        'hak_akses' => array(
            'model' => 'hak_akses_m',
            'primary_key' => 'IDHAK' 
            ),
        'pegawai'   => array(
            'model' => 'pegawai_m',
            'primary_key' => 'NIP' 
            )
        );
}   
/* End of file detail_hak_akses_m.php */
/* Location: ./application/models/detail_hak_akses_m.php */
