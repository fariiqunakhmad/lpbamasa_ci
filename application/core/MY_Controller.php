<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
     * $dd_model adalah variabel untuk inisialisasi dropdown pada form
     * ex:
       protected $dd_model = array(
        'angkatan_m'    => 'IDA', 
        'kbk_m'         => 'NAMAKBK'
        );  
     */
    protected $dd_model = null;
    protected $obj;
    
    function __construct() {
        parent::__construct();
        $this->obj = $this->uri->segment(1);
        $this->load->model($this->model,'mdl');
    }
    function index() {
        $data['title']  = 'Daftar '.$this->title;
        $data['table']  = $this->obj;
        $data['records']= $this->mdl->get_all();
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
        $id=$this->get_id_from_param();
        if ($id == NULL){
            $data['title']  ='Form Insert '.$this->title;
            $data['record'] = NULL;
            $data['action'] = base_url().$this->obj.'/insert';
        }else{
            $param='';
            if(is_array($id)){
                foreach ($id as $value) {
                    $param .= "/".$value;
                }
            }
            else{
                $param .= "/".$id;
            }
            $data['title']  ='Form Update '.$this->title;
            $data['record'] = $this->mdl->get($id);
            $data['action'] = base_url().$this->obj.'/update'.$param;
        }
        if($this->dd_model != null){
            foreach ($this->dd_model as $mdl => $value) {
                $this->load->model($mdl);
                $data["records$mdl"] =  $this->$mdl->dropdown($value);
            } 
        }
        $view['topnav'] ='admin_topnav';
        $view['sidenav']='admin_sidenav';
        $view['content']='form_'.$this->obj;
        $this->page->view($view, $data);
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
    protected function get_id_from_param() {
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
}
