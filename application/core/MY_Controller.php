<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * made by Akhmad Fariiqun Awwaluddin
 * @copyright Copyright (c) 2015, Akhmad Fariiqun Awwaluddin
 */

/**
 * Description of MY_Controller
 *
 * @author Afa
 */
class MY_Controller extends CI_Controller{
    protected $title    = "Title";
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
            $this->session->set_userdata('last_page', current_url());
            redirect('/authentication', 'refresh');
        }
        //innitial session data
        $session_data = $this->session->userdata('logged_in');
        //print_r($session_data);
        
        $this->data['userid']   = $this->session->userdata('logged_in')['id'];
        $this->data['username'] = $this->session->userdata('logged_in')['name'];
        $this->data['authority']= $this->session->userdata('logged_in')['authority'];
        $this->data['useras']   = $this->session->userdata('logged_in')['useras'];
        $this->view['css'] = array();
        $this->view['js'] = array();
        $this->view['sidenav']='sidenav'.$this->data['useras']['id'];
        $this->view['topnav'] ='topnav';
        
        
        //innitial name of this/controller class object
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
        $this->view['css']    = array(
//            'assets/css/plugins/dataTables.bootstrap.css'
            'assets/css/plugins/bootstrap-table.css'
            );
        $this->view['content']= 'daftar_'.$this->obj;
        $this->view['js']     = array(
//            'assets/js/plugins/dataTables/jquery.dataTables.js',
//            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
            'assets/js/plugins/bootstrap-table/bootstrap-table.js',
            'assets/js/plugins/bootstrap-table/export/bootstrap-table-export.js',
            'assets/js/plugins/bootstrap-table/export/jquery.plugin/tableExport.js',
            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jquery.base64.js',
//            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/sprintf.js',
//            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/jspdf.js',
//            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/base64.js'
            );
//        $this->view['script'] = "$('#".$this->data['table']."').dataTable();";
        $this->view['script'] = "$('#".$this->data['table']."').bootstrapTable();";
        $this->page->view($this->view, $this->data);
    }
    function load_form() {
        $id=$this->get_id_from_url();
        if ($id == NULL){
            $this->data['title']  ='Form Insert '.$this->title;
            $this->data['record'] = NULL;
            $this->data['action'] = base_url().$this->obj.'/insert';
        }else{
            $this->data['title']  ='Form Update '.$this->title;
            $this->data['record'] = $this->mdl->get($id);
            $param= $this->make_url_param($id);
            $this->data['action'] = base_url().$this->obj.'/update'.$param;
        }
        $this->make_dd_resource();
//        $this->view['css']     = array(
//            'assets/css/plugins/validator/Bootstrap-Validators.css'
//            );
//        $this->view['js']     = array(
//            'assets/js/plugins/validator/Bootstrap-Validators.js',
//            'assets/js/form_validator/'.$this->obj.'.js'
//            );
        $this->view['content']='form_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
    protected function make_url_param($id){
        $param='';
        if(is_array($id)){
            foreach ($id as $value) {
                $param .= "/".$value;
            }
        }
        else{
            $param .= "/".$id;
        }
        return $param;
    }
    protected function make_dd_resource() {
        if($this->dd_model != null){
            foreach ($this->dd_model as $mdl => $value) {
                $this->load->model($mdl);
                $this->data["dd_$mdl"] =  $this->$mdl->dropdown($value);
            }
        }
        array_push($this->view['css'], 'assets/css/plugins/select/bootstrap-select.css');
        array_push($this->view['js'], 'assets/js/plugins/select/bootstrap-select.js');
    }
    function insert() {
        $data = $this->get_data_from_form();
        $this->mdl->insert($data);
        redirect($this->obj, 'refresh');
    }
    function update() {
        $data = $this->get_data_from_form();
        $id= $this->get_id_from_url();
        $this->mdl->update($id, $data);
        redirect($this->obj, 'refresh');
    }
    function delete() {
        $id= $this->get_id_from_url();
        $this->mdl->delete($id);
        redirect($this->obj, 'refresh');
    }
    protected function get_data_from_form() {
        $data=array();
        return $data;
    }
    protected function get_id_from_url() {
        if(is_array($this->mdl->primary_key())){
            $is_full = TRUE;
            for($i=3; $i<count($this->mdl->primary_key())+3;$i++){
                if($this->uri->segment($i)!=NULL){
                    $is_full *= TRUE;
                }
                else{
                    $is_full *= FALSE;
                }
            }
            if($is_full == TRUE){
                $id = array();
                for($i=3; $i<count($this->mdl->primary_key())+3;$i++){
                    array_push($id, $this->uri->segment($i));
                }
            }
            else{
                $id = NULL;
            }
        }
        else{
            if($this->uri->segment(3)!= NULL){
                $id = $this->uri->segment(3);
            }
            else{
                $id = NULL;
            }
        }
        return $id;
    }
    protected function printit($param) {
        return $param;
    }
}
