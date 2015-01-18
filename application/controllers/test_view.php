<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test_view
 *
 * @author Akhmad Fariiqun Awwa
 */
class test_view extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
  
    function index() {
        $this->load->view('clientresource');
//        $this->load->view('nav');
        $this->load->view('form_kasbon');
        $this->load->view('daftar_kasbon');
        $this->load->view('form_pembayaran_bk');
        $this->load->view('daftar_pembayaran_bk');
        $this->load->view('form_tsl');
        $this->load->view('daftar_tsl');
        $this->load->view('form_penggajian');
        $this->load->view('daftar_gaji_bulanan');
        $this->load->view('daftar_penggajian');
        $this->load->view('form_pendaftaran_bmh');
        $this->load->view('daftar_pendaftaran_bmh');
        $this->load->view('form_pendaftaran_wisuda');
        $this->load->view('daftar_pendaftaran_wisuda');
        $this->load->view('form_absensi_mengajar');
        $this->load->view('form_absensi_pegawai');
        $this->load->view('form_setup_absensi');

    }
}
