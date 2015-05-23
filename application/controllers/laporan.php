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
        if(!$this->session->userdata('logged_in')){
            redirect('authentication', 'refresh');
        }
        //innitial session data
        $session_data = $this->session->userdata('logged_in');
        $this->data['userid'] = $session_data['id'];
        $this->data['username'] = $session_data['name'];
        $this->data['userauthority'] = $session_data['authority'];
        
        $this->view['topnav'] = 'admin_topnav';
        $this->view['sidenav']= 'admin_sidenav';
        
        
        //innitial name of this class object
        $this->obj = $this->uri->segment(1);
        
        //load model
        $this->load->model($this->model,'mdl');
        if($this->related_model != null){
            foreach ($this->related_model as $value) {
                $this->mdl->with($value);
            }
        }
        
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
        $this->view['content']='form_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
    function insert() {
        $data = $this->get_data_from_form();
        $this->mdl->insert($data);
        redirect($this->obj, 'refresh');
    }
    function update() {
        $data = $this->get_data_from_form();
        $id= $this->get_id_from_param();
        $this->mdl->update($id, $data);
        redirect($this->obj, 'refresh');
    }
    function delete() {
        $id= $this->get_id_from_param();
        $this->mdl->delete($id);
        redirect($this->obj, 'refresh');
    }
    protected function get_data_from_form() {
        $data=array();
        return $data;
    }
    
    protected function printit($param) {
        return $param;
    }
}
