<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //Memanggil fungsi session Codeigniter
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Akhmad Fariiqun Awwa
 */
class Home extends CI_Controller{
    //put your code here
    function __construct()
    {
      parent::__construct();
      $this->load->helper(array('form', 'html'));
    }

    function index()
    {
      if($this->session->userdata('logged_in'))
      {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $this->load->view('home', $data);
      }
      else
      {
        //Jika tidak ada session di kembalikan ke halaman login
        redirect('home/login', 'refresh');
      }
    }

    function login()
    {
      if($this->session->userdata('logged_in'))
      {
        redirect('home', 'refresh');
      }
      else 
      {
        $this->load->helper(array('form'));
        $this->load->view('login'); 
      }
    }

    function logout()
    {
      $this->session->unset_userdata('logged_in');
      session_destroy();
      redirect('home', 'refresh');
    }

}

