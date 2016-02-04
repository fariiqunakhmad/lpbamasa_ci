<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kasbon_m extends MY_Model{
    public $_table      = 'kasbon';
    public $primary_key = 'IDKB';
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
    function hard_delete($param) {
        $this->_database->delete($this->_table, array($this->primary_key => $param));
    }
    function get_sah($nip=NULL) {
        $this->_database->join('kas', "kas.IDKAS = kasbon.IDKAS");
        $this->_database->where('kas.NIP != ""');
        $this->_database->where('kasbon.STATR = "0"');
        if($nip==NULL){
            return $this->with_deleted()->get_many_by('STATKB',0);
        }else{
            return $this->with_deleted()->get_many_by(['STATKB'=>0, 'kasbon.NIP'=>$nip]);
        }
    }
}
/* End of file Kasbon_m.php */
/* Location: ./application/models/Kasbon_m.php */
