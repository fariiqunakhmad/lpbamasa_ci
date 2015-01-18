<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kkm
 *
 * @author Akhmad Fariiqun Awwa
 */
class kkm extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function get_records()
    {
     $query = $this->db->get('kelompokkeuangan');
     return $query->result();
    }
    function get_records_dd($param) {
        $query1 = $this->db->get_where('kelompokkeuangan', array('IDKK' => $param));
        $subQuery1 = $this->db->_compile_select();

$this->db->_reset_select();
        $query2 = $this->db->get_where('kelompokkeuangan', array('IDKK' => !$param));
        $subQuery2 = $this->db->_compile_select();

$this->db->_reset_select();
//$query = array_merge($query1, $query2);
        $this->db->from("($subQuery1 UNION $subQuery2)");
$query=$this->db->get();
        return $query1->result();
    }

    function add_record($param) 
    {
     $this->db->insert('kelompokkeuangan', $param);
     return;
    }

    function update_record($param) 
    {
     $this->db->where('idtsl', 12);
     $this->db->update('tsl', $param);
    }

    function delete_row()
    {
     $this->db->where('idtsl', $this->uri->segment(3));
     $this->db->delete('tsl');
    }
}
