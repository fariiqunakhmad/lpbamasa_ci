<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Kbk_1 extends CI_Controller {
    protected $title    = "Komponen Biaya Kuliah";
    protected $obj      = "kbk";
    function __construct() {
        parent::__construct();
        $this->load->model($this->obj.'_m','model');
    }
    function index() {
        $data['title']  = 'Daftar '.$this->title;
        $data['table']  = $this->uri->segment(1);
        $data['records']= $this->model->get_all();
        $view['css']    = 'assets/css/plugins/dataTables.bootstrap.css';
        $view['topnav'] = 'admin_topnav';
        $view['sidenav']= 'admin_sidenav';
        $view['content']= 'daftar_'.$this->obj;
        $view['js']     = array(
            'assets/js/plugins/dataTables/jquery.dataTables.js',
            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
            );
        $view['script'] = "$('#".$data['table']."').dataTable();";
        $this->page->view($view, $data);
    }
    function load_form() {
        
        $param=$this->uri->segment(3);
        if ($param === FALSE){
            $data['title']='Form Insert '.$this->title;
            $data['record'] = NULL;
            $data['action'] = base_url().$this->uri->slash_segment(1).'insert';
        }else{
            $data['title']='Form Update '.$this->title;
            $data['record'] = $this->model->get($param);
            $data['action'] = base_url().$this->uri->slash_segment(1).'update/'.$param;
        }
        $view['topnav'] ='admin_topnav';
        $view['sidenav']='admin_sidenav';
        $view['content']='form_'.$this->obj;
        
        $this->page->view($view, $data);
    }
    function get_data_from_form() {
        $data=array(
            'NAMAKBK'   => $this->input->post('txtnamakbk'),
            'STATR'     => 1
        );
        return $data;
    }
    function insert() {
        $data = $this->get_data_from_form();
        $this->model->insert($data);
        redirect($this->uri->segment(1), 'refresh');
    }
    function update() {
        $param= $this->uri->segment(3);
        $data = $this->get_data_from_form();
        $this->model->update($param, $data);
        redirect($this->uri->segment(1), 'refresh');
    }
    function delete() {
        $this->model->delete($this->uri->segment(3));
        redirect($this->uri->segment(1), 'refresh');
    }
}
