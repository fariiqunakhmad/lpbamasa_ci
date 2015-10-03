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
        is_loged_in();//check session
        //innitial session data
        $session_data = $this->session->userdata('logged_in');
        $this->data['userid']   = $session_data['id'];
        $this->data['username'] = $session_data['name'];
        $this->data['authority']= $session_data['authority'];
        $this->data['useras']   = $session_data['useras'];
        //end of innitial session data
        $this->view['css']      = array();
        $this->view['js']       = array();
        $this->view['sidenav']  ='template/sidenav'.$this->data['useras']['id'];
        $this->view['topnav']   ='template/topnav';
        $this->obj = $this->uri->segment(1);//innitial name of this controller class object
        $this->load->model($this->model,'mdl');//load model
        if($this->related_model != null){
            foreach ($this->related_model as $value) {
                $this->mdl->with($value);
            }
        }
    }
    function index() {
//        if(can_access($this->obj)){
            $this->data['title']  = 'Daftar '.$this->title;
            $this->data['table']  = $this->obj;
            $this->data['records']= $this->mdl->get_all();
            $this->view['css']    = array(
    //            'assets/css/plugins/dataTables.bootstrap.css'
                'assets/css/plugins/bootstrap-table.css'
                );
            $this->view['content']= $this->obj.'/daftar_'.$this->obj;
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
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function load_form() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
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
            $this->view['content']=$this->obj.'/form_'.$this->obj;
            $this->page->view($this->view, $this->data);
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    function insert() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $data = $this->get_data_from_form();
            $this->mdl->insert($data);
            redirect($this->obj, 'refresh');
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    function update() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $data = $this->get_data_from_form();
            $id= $this->get_id_from_url();
            $this->mdl->update($id, $data);
            redirect($this->obj, 'refresh');
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    function delete() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $id= $this->get_id_from_url();
            $this->mdl->delete($id);
            redirect($this->obj, 'refresh');
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
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
            foreach ($this->dd_model as $m => $value) {
                $this->load->model($m);
                $this->data["dd_$m"] =  $this->$m->dropdown($value);
            }
        }
        array_push($this->view['css'], 'assets/css/plugins/select/bootstrap-select.css');
        array_push($this->view['js'], 'assets/js/plugins/select/bootstrap-select.js');
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
    protected function print_it($view, $data, $filename, $size=NULL, $orientation=NULL) {
        
        $this->load->helper(array('dompdf', 'file'));
        $html = $this->load->view($view, $data, true);
        pdf_create($html, $filename, $size, $orientation);
            
        
    }
    protected function gen_id() {
        
    }
}

/**
 * Description of MY_Controller
 *
 * @author Afa
 */
class MY_Transaction extends MY_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('kas_m', 'kas');
        $this->mdl->with_deleted();
    }
    function index() {
            //$this->mdl->order_by($this->kas->primary_key, 'DESC');
            $this->data['title']  = 'Daftar '.$this->title;
            $this->data['table']  = $this->obj;
            
            $this->view['css']    = array(
                'assets/css/plugins/bootstrap-table.css'
                );
            $this->view['content']= $this->obj.'/daftar_'.$this->obj;
            $this->view['js']     = array(
                'assets/js/plugins/bootstrap-table/bootstrap-table.js',
                'assets/js/plugins/bootstrap-table/export/bootstrap-table-export.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/tableExport.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jquery.base64.js',
//                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/sprintf.js',
//                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/jspdf.js',
//                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/base64.js',
                );
//            $this->view['script'] = "$('#".$this->data['table']."').bootstrapTable();";
            
    }
    function detail($idtrans) {
        $this->data['trans']          =$this->mdl->get($idtrans);
        $this->load->view($this->obj.'/detail_'.$this->obj, $this->data);
    }
    function load_form() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $id=$this->get_id_from_url();
            if ($id == NULL){
                $this->data['title']  ='Form Insert '.$this->title;
                $this->data['record'] = NULL;
                $this->data['action'] = base_url().$this->obj.'/insert';
            }else{
                $this->data['title']  ='Form Update '.$this->title;
                $this->data['record'] = $this->mdl->with('kas')->get($id);
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
            $this->view['content']=$this->obj.'/form_'.$this->obj;
            $this->page->view($this->view, $this->data);
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    protected function gen_kas_id($dk, $idkk, $tglkas) {
        $param=$dk.$idkk.date('ymd', strtotime(str_replace('-','/', $tglkas)));
        $last=$this->kas->get_last_by_id($param);
        if($last){
            return $last[0]->IDKAS+1;
        }else{
            return $param.'001';
        }
    }
    function insert() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $value = $this->get_data_from_form();
            $this->kas->insert($value['kas']);
            $this->mdl->insert($value['data']);
            $this->kas->update($value['kas']['IDKAS'], ['REFKAS'=>$value['idtrans']]);
            if($value['kas']['DKKAS']==1){
                redirect($this->obj.'/nota/'.$value['idtrans'], 'refresh');
            } else {
                redirect($this->obj, 'refresh');
            }
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    function accept($idtrans) {
//        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $data['NIP']    = $this->data['userid'];
            //$data['REFKAS'] = $idtrans;
            $idkas= $this->mdl->get($idtrans)->IDKAS;
            $this->kas->update($idkas, $data);
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function update($idtrans) {
//        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $value = $this->get_data_from_form();
            $idkas= $this->mdl->get($idtrans)->IDKAS;
            $this->kas->update($idkas, $value['kas']);
            $this->mdl->update($idtrans, $value['data']);
            $dkkas= $this->mdl->get($idtrans)->DKKAS;
            if($dkkas==1){
                redirect($this->obj.'/nota/'.$idtrans, 'refresh');
            } else {
                redirect($this->obj, 'refresh');
            }
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function delete($idtrans) {
//        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $idkas= $this->mdl->get($idtrans)->IDKAS;
            $this->mdl->delete($idtrans);
            $this->kas->delete($idkas);
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function delete_kas($idtrans) {
//        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $idkas= $this->mdl->get($idtrans)->IDKAS;
            $this->kas->delete($idkas);
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function delete_trans($idtrans) {
//        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $this->mdl->delete($idtrans);
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function cancel_delete($idtrans) {
//        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $idkas= $this->mdl->get($idtrans)->IDKAS;
            $this->mdl->update($idtrans, array('STATR'=>0));
            $this->kas->update($idkas, array('STATR'=>0));
            redirect($this->obj, 'refresh');
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
//    function cancel_delete_kas($idtrans) {
////        if(can_access($this->obj.'/'.$this->uri->segment(2))){
//            $idkas= $this->mdl->get($idtrans)->IDKAS;
//            $this->kas->update($idkas, array('STATR'=>0));
//            redirect($this->obj, 'refresh');
////        } else {
////            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
////        }
//    }
    function cancel_delete_trans($idtrans) {
//        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $this->mdl->update($idtrans, array('STATR'=>0));
            redirect($this->obj, 'refresh');
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function nota($idtrans) {
        $this->data['nota']=$row=$this->mdl->get($idtrans);
        $this->load->view($this->obj.'/nota_'.$this->obj, $this->data);
    }
    
}
