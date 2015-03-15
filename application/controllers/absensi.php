<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of absensi
 *
 * @author Akhmad Fariiqun Awwa
 */
class Absensi extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('absensi_m');
    }
    function index() {
        $data['title']  = 'Daftar Komponen Biaya Kuliah';
        $data['table']  = $this->uri->segment(1);
        $data['records']= $this->absensi_m->get_all();
        $view['css']    = 'assets/css/plugins/dataTables.bootstrap.css';
        $view['topnav'] = 'admin_topnav';
        $view['sidenav']= 'admin_sidenav';
        $view['content']= 'daftar_absensi';
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
            $data['title']='Form Komponen Biaya Kuliah';
            $data['record'] = NULL;
            $data['action'] = base_url().$this->uri->slash_segment(1).'insert';
        }else{
            $data['title']='Form Komponen Biaya Kuliah';
            $data['record'] = $this->absensi_m->get($param);
            $data['action'] = base_url().$this->uri->slash_segment(1).'update/'.$param;
        }
        $view['css']    = 'assets/css/plugins/calendar.css';
        $view['topnav'] ='admin_topnav';
        $view['sidenav']='admin_sidenav';
        $view['content']='form_absensi';
        $view['js']     = 'assets/js/plugins/calendar/calendar.js';
        $view['script'] = array(
            " var calendar = $('#calendar').calendar({",
            " \tevents_source: function(){return [];}",
            "});"
        );
        //"$('#".$data['table']."').dataTable();";
        
        $this->page->view($view, $data);
    }
    function get_data_from_form() {
        $data=array(
            'NAMAKBK'   => $this->input->post('dda'),
            'STATR'     => 1
        );
        return $data;
    }
    function insert() {
        $data = $this->get_data_from_form();
        echo var_dump($data);
        $this->absensi_m->insert($data);
        //redirect($this->uri->segment(1), 'refresh');
    }
    function update() {
        $param= $this->uri->segment(3);
        $data = $this->get_data_from_form();
        $this->absensi_m->update($param, $data);
        redirect($this->uri->segment(1), 'refresh');
    }
    function delete() {
        $this->absensi_m->delete($this->uri->segment(3));
        redirect($this->uri->segment(1), 'refresh');
    }
}
