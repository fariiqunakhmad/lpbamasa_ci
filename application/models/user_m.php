<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
   
class User_m extends CI_Model {
  
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
  
    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('nip', $username);
        $this->db->where('passp', $password);
        $this->db->limit(1);
          
        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }
}
   
/* End of file login_m.php */
/* Location: ./application/models/login_m.php */