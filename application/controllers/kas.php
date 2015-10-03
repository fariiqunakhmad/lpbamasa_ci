<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Kas extends MY_Controller {
    protected $title    = "Kas";
    protected $model    = 'kas_m';
    protected $related_model= array(
        'kk',
        'pegawai'
    );
    function index() {
//        if(can_access($this->obj)){
            $this->data['title']  = 'Daftar '.$this->title;
            $this->data['table']  = $this->obj;
            $this->data['records']= $this->mdl->get_many_by('NIP != ""');
            $this->view['css']    = array(
                'assets/css/plugins/bootstrap-table.css'
                );
            $this->view['content']= $this->obj.'/daftar_'.$this->obj;
            $this->view['js']     = array(
                'assets/js/plugins/bootstrap-table/bootstrap-table.js',
                'assets/js/plugins/bootstrap-table/export/bootstrap-table-export.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/tableExport.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jquery.base64.js',
                'assets/js/modul/kas.js'
    //            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/sprintf.js',
    //            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/jspdf.js',
    //            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/base64.js'
                );
            //$this->view['script'] = "onLoad();";
            $this->page->view($this->view, $this->data);
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function load_form_laporan() {
        $this->data['title']  ='Form Generate Laporan Kas';
        $this->data['fd'] = $this->mdl->order_by('TGLKAS')->limit(1)->get_all()[0]->TGLKAS;
        $this->data['action'] = base_url().$this->obj.'/laporan';
        $this->view['content']=  $this->obj.'/form_laporan_'.$this->obj;
        $this->view['css']     = [
            'assets/css/plugins/daterangepicker-bs3.css'
        ];
        $this->view['js']     = [
            'assets/js/plugins/daterangepicker/daterangepicker.js'
        ];
        $this->view['script']   = "$('input[name=\"daterange\"]').daterangepicker();";
        $this->page->view($this->view, $this->data);
    }
    protected function get_data_from_form() {
        $data=  explode('-', $this->input->post('daterange'));
        foreach ($data as $key=>$value) {
            $data[$key]=date('Y-m-d',  strtotime($value));
        }
        return $data;
    }
    function laporan() {
        $date = $this->get_data_from_form();
        $this->data['date']     = $date; 
        $this->data['tabled']   = $this->obj.'d';
        $this->data['tablek']   = $this->obj.'k';
        $this->data['records1'] = $this->mdl->get_detail_sector_in_period(1, $date[0], $date[1]);
        $this->data['records2'] = $this->mdl->get_detail_sector_in_period(2, $date[0], $date[1]);
        $this->view['content']  = $this->obj.'/laporan_'.$this->obj;
        $this->load->view($this->view['content'], $this->data);
    }

}
