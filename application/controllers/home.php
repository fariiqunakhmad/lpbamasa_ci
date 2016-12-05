<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Home extends CI_Controller{
    private $data;
    private $view;
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'html'));
        //check session
        is_loged_in();
        //innitial session data
        $session_data = $this->session->userdata('logged_in');
        //print_r($session_data);
        $this->data['userid']   = $session_data['id'];
        $this->data['username'] = $session_data['name'];
        $this->data['authority']= $session_data['authority'];
        $this->data['useras']   = $session_data['useras'];
        
        $this->view['sidenav']='template/sidenav'.$this->data['useras']['id'];
        $this->view['topnav'] ='template/topnav';
        $this->view['js']     =[];
        $this->view['css']    =[];
    }
    function index() {
        $this->data['title']  ='Dasboard';
        $h='home'.$this->data['useras']['id'];
        $this->$h();
        $this->page->view($this->view, $this->data);
    }
    private function home1() {
        $this->load->model(['kas_m', 'pembayaran_biaya_kuliah_m', 'pendaftaran_wisuda_m', 'pendaftaran_bmh_m', 'penggajian_m', 'kasbon_m', 'tsl_m']);
        $this->data['today']    = $this->kas_m->get_resume_by_year()[0];        
        $this->data['notif']['pbk']   =  $this->pembayaran_biaya_kuliah_m->count_nv();
        $this->data['notif']['pw']    =  $this->pendaftaran_wisuda_m->count_nv();
        $this->data['notif']['pbmh']  =  $this->pendaftaran_bmh_m->count_nv();
        $this->data['notif']['gp']    =  $this->penggajian_m->count_nv();
        $this->data['notif']['kb']    =  $this->kasbon_m->count_nv();
        $this->data['notif']['tsl']   =  $this->tsl_m->count_nv();
        array_push($this->view['css'], 'assets/css/plugins/select/bootstrap-select.css');
        array_push($this->view['css'], 'assets/css/plugins/morris.css');
//        array_push($this->view['js'], 'assets/js/plugins/select/bootstrap-select.js');
        array_push($this->view['js'], 'assets/js/plugins/morris/raphael.min.js');
        array_push($this->view['js'], 'assets/js/plugins/morris/morris.js');
        array_push($this->view['js'], 'assets/js/modul/home.js');
        $this->data['years']        = $this->kas_m->get_years();
        $this->view['script']   = [
            "Morris.Line({
                element: 'kas-3-line-chart',
                data: ". json_encode($this->kas_m->get_dk_kas_statistic(6)).",
                xkey: 'BULAN',
                ykeys: ['DEBET','KREDIT','SALDO'],
                labels: ['PEMASUKAN','PENGELUARAN','SALDO'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true,
                postUnits : ',00',
                preUnits : 'Rp '
            });",
            "initKas();"
        ];
        $this->view['content']='home/home1';
    }
    private function home2() {
        $this->load->model(['pembayaran_biaya_kuliah_m', 'pendaftaran_wisuda_m', 'pendaftaran_bmh_m', 'penggajian_m', 'tsl_m']);
        $this->data['notif']['pbk']   =  $this->pembayaran_biaya_kuliah_m->count_nv();
        $this->data['notif']['pw']    =  $this->pendaftaran_wisuda_m->count_nv();
        $this->data['notif']['pbmh']  =  $this->pendaftaran_bmh_m->count_nv();
        $this->data['notif']['gp']    =  $this->penggajian_m->count_nv();
        $this->data['notif']['tsl']   =  $this->tsl_m->count_nv();
        $this->view['content']='home/home2';
    }
    private function home3() {
        $this->view['content']='home/home3';
    }
    private function home4() {
        $this->view['content']='home/home4';
    }
    function get_donut_material($dk, $tahun = NULL) {
        $this->load->model('kas_m');
        $data = $this->kas_m->get_all_sector_by_year($dk, $tahun);
        print_r(json_encode($data));
        //return json_encode($data);
    }
    function get_resume($tahun=NULL) {
        $this->load->model('kas_m');
        print_r(json_encode($this->kas_m->get_resume_by_year($tahun)));
    }
}

