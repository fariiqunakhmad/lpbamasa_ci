<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tsl_m extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function get_records()
    {
     $query = $this->db->get('tsl');
     return $query->result();
    }

    function add_record($tsl) 
    {
     $this->db->insert('tsl', $tsl);
     return;
    }

    function update_record($tsl) 
    {
     $this->db->where('idtsl', 12);
     $this->db->update('tsl', $tsl);
    }

    function delete_row()
    {
     $this->db->where('idtsl', $this->uri->segment(3));
     $this->db->delete('tsl');
    }
    
}
