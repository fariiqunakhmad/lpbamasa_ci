<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai_m extends MY_Model{
    public $_table = 'pegawai';
    public $primary_key = 'NIP';
    public $belongs_to = array( 
        'kota' => array(
            'model' => 'kota_m', 
            'primary_key' => 'IDK' 
            ),
        'kot_kota' => array(
            'model' => 'kota_m', 
            'primary_key' => 'KOT_IDK' 
            ),
        'jarak_rumah' => array(
            'model' => 'jarak_rumah_m', 
            'primary_key' => 'IDJR' 
            ),
        'masa_abdi' => array(
            'model' => 'masa_abdi_m', 
            'primary_key' => 'IDMA' 
            ),
        'jabatan' => array(
            'model' => 'jabatan_m', 
            'primary_key' => 'IDJAB' 
            ),
        'jenjang_pendidikan' => array(
            'model' => 'jenjang_pendidikan_m', 
            'primary_key' => 'IDJP' 
            ),
        );
    function get_last_by_tglmasukp($tglmasukp){
        $this->_database->like('TGLMASUKP', date('Y-m', strtotime(str_replace('-','/', $tglmasukp)) ));
        return $this->order_by('NIP', 'DESC')->limit(1)->get_all();
    }
    function dropdown($param, $jenisp= NULL) {
        if($jenisp!=NULL){
            $this->_database->where('JENISP',$jenisp);
        }
        return parent::dropdown($param);
    }
}   
/* End of file Pegawai_m.php */
/* Location: ./application/models/Pegawai_m.php */
