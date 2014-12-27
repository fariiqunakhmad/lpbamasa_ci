<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
   
class User extends CI_Model {
  
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
  
    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('idk, namak');
        $this->db->from('kota');
        $this->db->where('idk', $username);
        $this->db->where('namak', $password);
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