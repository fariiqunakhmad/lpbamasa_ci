<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Laporan extends CI_Controller{
    protected $title    = "Laporan";
    protected $model    = null;
    /**
     *
     * $related_model adalah variabel untuk menyimpan nama model yang berelasi dengan model utama
     * ex:
       protected $related_model = array(
        'angkatan', 
        'kbk'
        );  
     */
    protected $related_model = null;
    /**
     *
     * $dd_model adalah variabel untuk inisialisasi dropdown pada form
     * ex:
       protected $dd_model = array(
        'angkatan_m'    => 'IDA', 
        'kbk_m'         => 'NAMAKBK'
        );  
     */
    protected $dd_model = null;
    protected $obj;
    protected $data;
    protected $view;
    function __construct() {
        parent::__construct();
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
        //innitial name of this/controller class object
        $this->obj = $this->uri->segment(1);
        
    }
    function index() {
        $this->data['title']  = 'Daftar '.$this->title;
        $this->data['table']  = $this->obj;
        $this->data['records']=$this->mdl->get_all();
        $this->view['css']    = 'assets/css/plugins/dataTables.bootstrap.css';
        $this->view['content']= 'daftar_'.$this->obj;
        $this->view['js']     = array(
            'assets/js/plugins/dataTables/jquery.dataTables.js',
            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
            );
        $this->view['script'] = "$('#".$this->data['table']."').dataTable();";
        $this->page->view($this->view, $this->data);
    }
    function load_form() {
        $this->data['title']  ='Form '.$this->title;
        $this->data['record'] = NULL;
        $this->data['action'] = base_url().$this->obj.'/generate';
        $this->view['content']=  $this->obj.'/form_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
    function generate() {
        $date = $this->get_data_from_form();
        //$this->data['pbk']=$this->rekap_pembayaran_biaya_kuliah($date[0], $date[1]);
        $this->data['pbk']      =  $this->rekap('pembayaran_biaya_kuliah_m', 'TGLPBK', $date[0], $date[1], 'NOMINALPBK');
        $this->data['pbw']      =  $this->rekap('pendaftaran_wisuda_m', 'TGLPW', $date[0], $date[1], 'BAYARPW');
        $this->data['pbb']      =  $this->rekap('pendaftaran_bmh_m', 'TGLDAFTARBMH', $date[0], $date[1], 'BAYARDAFTARBMH');
        $this->data['kasbon']   =  $this->rekap('kasbon_m', 'TGLKB', $date[0], $date[1], 'NOMINALKB');
        $this->data['pbk1']     =  $this->rekap('pembayaran_biaya_kuliah_m', 'TGLPBK', $date[0], $date[1], 'NOMINALPBK');
        
        $this->data['title']  = 'Daftar '.$this->title;
        $this->data['table']  = $this->obj;
        //$this->data['records']=$this->mdl->get_all();
        $this->view['css']    = 'assets/css/plugins/dataTables.bootstrap.css';
        $this->view['content']= $this->obj.'/'.$this->obj;
        $this->view['js']     = array(
            'assets/js/plugins/dataTables/jquery.dataTables.js',
            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
            );
        $this->view['script'] = "$('#".$this->data['table']."').dataTable();";
        $this->page->view($this->view, $this->data);
    }
    private function rekap_pembayaran_biaya_kuliah ($date1, $date2) {
        $this->load->model('pembayaran_biaya_kuliah_m');
        $row = $this->pembayaran_biaya_kuliah_m->get_in_a_range('TGLPBK', $date1, $date2);
        $total=0;
        foreach ($row as $value) {
            $total += $value->NOMINALPBK;
        }
        return $total;
    }
    private function rekap($model, $param, $value1, $value2, $col) {
        $this->load->model($model);
        $row = $this->$model->get_in_a_range($param, $value1, $value2);
        $total=0;
        foreach ($row as $value) {
            $total += $value->$col;
        }
        return $total;
    }
    
    protected function get_data_from_form() {
        $data=array($this->input->post('tgl1'),$this->input->post('tgl2'),
        );
        return $data;
    }
    
    protected function printit($param) {
        return $param;
    }
}
