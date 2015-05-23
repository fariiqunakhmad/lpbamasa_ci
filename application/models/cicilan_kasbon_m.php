<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cicilan_kasbon_m extends MY_Model{
    public $_table = 'cicilankasbon';
    public $primary_key = array('IDKB', 'IDGAJI');
    public $soft_delete = FALSE;
    public $belongs_to = array( 
        'kasbon' => array(
            'model' => 'kasbon_m',
            'primary_key' => 'IDKB' 
            ),
        'penggajian'   => array(
            'model' => 'penggajian_m',
            'primary_key' => 'IDGAJI' 
            )
        );
}   
/* End of file cicilan_kasbon_m.php */
/* Location: ./application/models/cicilan_kasbon_m.php */
