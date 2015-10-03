<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
        //print_session('Home');

    }
    function index() {
        $this->load->model('kas_m', 'kas');
        $this->data['title']  ='Dasboard';
        $this->view['css']    =array(
            'assets/css/plugins/timeline.css',
            'assets/css/plugins/morris.css'
        );
        $this->view['content']='home';
        $this->view['js']     =array(
            'assets/js/plugins/morris/raphael.min.js',
            'assets/js/plugins/morris/morris.js',
            'assets/js/plugins/morris/morris-data.js'
        );
        $this->load->model('pembayaran_biaya_kuliah_m');
        $this->load->model('pendaftaran_wisuda_m');
        $this->load->model('pendaftaran_bmh_m');
        $this->load->model('penggajian_m');
        $this->load->model('kasbon_m');
        $this->load->model('tsl_m');
        
        
        $notif['pbk']   =  $this->pembayaran_biaya_kuliah_m->count_nv();
        $notif['pw']    =  $this->pendaftaran_wisuda_m->count_nv();
        $notif['pbmh']  =  $this->pendaftaran_bmh_m->count_nv();
        $notif['gp']    =  $this->penggajian_m->count_nv();
        $notif['kb']    =  $this->kasbon_m->count_nv();
        $notif['tsl']   =  $this->tsl_m->count_nv();
        $this->data['notif']=$notif;
        $this->data['today']=$this->kas->get_dk_kas_statistic(1)[0];
        
        $this->view['script']= [
            "Morris.Line({
                element: 'kas-3-line-chart',
                data: ". json_encode($this->kas->get_dk_kas_statistic(6)).",
                xkey: 'BULAN',
                ykeys: ['DEBET','KREDIT','SALDO'],
                labels: ['DEBET','KREDIT','SALDO'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true,
                postUnits : ',00',
                preUnits : 'Rp '
            });",
            "Morris.Donut({
                element: 'd-donut-chart',
                data: ". json_encode($this->kas->get_detail_sector(1)).",
                resize: true
            });",
            "Morris.Donut({
                element: 'k-donut-chart',
                data: ". json_encode($this->kas->get_detail_sector(2)).",
                resize: true
            });"
        ];
        $this->page->view($this->view, $this->data);
    }

}

