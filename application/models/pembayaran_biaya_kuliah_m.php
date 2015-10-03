<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pembayaran_biaya_kuliah_m extends MY_Model{
    public $_table = 'pembayaranbiayakuliah';
    public $primary_key = 'IDPBK';
    public $belongs_to = array(
        'pegawai'   => array(
            'model'         => 'pegawai_m',
            'primary_key'   => 'NIP' 
            ),
        'mahasiswa' => array(
            'model'         => 'mahasiswa_m',
            'primary_key'   => 'NIM' 
            ),
        'kas'       => array(
            'model'         => 'kas_m',
            'primary_key'   => 'IDKAS',
            'with'          => array('pegawai', 'kk')
            )
        );
//        public function get_all($nip = NULL) {
//            if ($nip==NULL){
//                parent::get_all();
//            } else{
//                parent::get_many_by('NIP', $nip);
//            }
//        }
    public function set_where($params) {
        parent::_set_where($params);
    }
    
    
}   
/* End of file Pembayaran_biaya_kuliah_m.php */
/* Location: ./application/models/Pembayaran_biaya_kuliah_m.php */
