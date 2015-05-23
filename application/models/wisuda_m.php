<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wisuda_m extends MY_Model{
    public $_table      = 'wisuda';
    public $primary_key = 'IDW';
    public $belongs_to = array(
        'pegawai'   => array(
            'model'         => 'pegawai_m',
            'primary_key'   => 'NIP' 
            )
        );
}
   
/* End of file .php */
/* Location: ./application/models/.php */