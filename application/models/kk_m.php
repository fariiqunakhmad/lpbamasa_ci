<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kk_m extends MY_Model{
    public $_table = 'kelompokkeuangan';
    public $primary_key = 'IDKK';

    function get_records_dd($param) {
        $query1 = $this->db->get_where($this->_table, array('IDKK' => $param));
        $subQuery1 = $this->db->_compile_select();

        $this->db->_reset_select();
        $query2 = $this->db->get_where($this->_table, array('IDKK' => !$param));
        $subQuery2 = $this->db->_compile_select();

        $this->db->_reset_select();
        //$query = array_merge($query1, $query2);
        $this->db->from("($subQuery1 UNION $subQuery2)");
        $query=$this->db->get();
        return $query1->result();
    }
}
