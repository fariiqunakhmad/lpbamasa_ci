<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of jabatan_m
 *
 * @author Akhmad Fariiqun Awwa
 */
class Jabatan_m extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function get_all() {
        return $this->db->get("jabatan")->result();
    }
    function get($id)
    {
            //select produk berdasarkan id yang dimiliki
    }

    function add($data)
    {
            //untuk insert data ke database
            $this->db->insert('jabatan', $data);

    }

    function update($id)
    {
            //update produk berdasarkan id
    }

    function delete($id)
    {
            //delete produk berdasarkan id
    }
    //put your code here
}
