<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pegawai extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('pegawai_m');
        $this->load->model('angkatan_m');
        $this->load->model('kbk_m');
    }
    function index() {
        $data['title']          ='Daftar Biaya Kuliah';
        $data['table']          =$this->uri->segment(1);
        $data['records']        = $this->pegawai_m->get_all();
        $view['css']        ='assets/css/plugins/dataTables.bootstrap.css';
        $view['topnav']     ='admin_topnav';
        $view['sidenav']    ='admin_sidenav';
        $view['content']    ='daftar_pegawai';
        $view['js']         =array(
            'assets/js/plugins/dataTables/jquery.dataTables.js',
            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
            );
        $this->page->view($view, $data);
    }
    function load_form() {
        if ($this->uri->segment(3)!=NULL && $this->uri->segment(4)!=NULL){
            $param=array($this->uri->segment(3), $this->uri->segment(4));
            $data['title']      = 'Form Update Biaya Kuliah';
            $data['record']     = $this->pegawai_m->get($param);
            $data['action']     = base_url().$this->uri->slash_segment(1).'update/'.$param[0].'/'.$param[1];
        }else{
            $data['title']      = 'Form Insert Biaya Kuliah';
            $data['record']     = NULL;
            $data['action']     = base_url().$this->uri->slash_segment(1).'insert';
        }
        $data['recordsKBK']     = $this->kbk_m->dropdown('NAMAKBK');
        $data['recordsA']       = $this->angkatan_m->dropdown('IDA');
        $view['topnav']     = 'admin_topnav';
        $view['sidenav']    = 'admin_sidenav';
        $view['content']    = 'form_pegawai';
        $this->page->view($view, $data);
    }
    function insert() {
        $data=array(
            'IDKBK'     => $this->input->post('txtidkbk'),
            'IDA'       => $this->input->post('txtida'),
            'BIAYA'     => $this->input->post('txtbiaya'),
            'STATR'     => 1
        );
        $this->pegawai_m->insert($data);
        redirect($this->uri->segment(1), 'refresh');
    }
    function update() {
        $data=array(
            'IDKBK'     => $this->uri->segment(3),
            'IDA'       => $this->uri->segment(4),
            'BIAYA'     => $this->input->post('txtbiaya'),
            'STATR'     => 1
        );
        $id=array($this->uri->segment(3), $this->uri->segment(4));
        $this->pegawai_m->update($id, $data);
        redirect($this->uri->segment(1), 'refresh');
    }
    function delete() {
        $id=array($this->uri->segment(3), $this->uri->segment(4));
        $this->pegawai_m->delete($id);
        redirect($this->uri->segment(1), 'refresh');
        
    }
}
