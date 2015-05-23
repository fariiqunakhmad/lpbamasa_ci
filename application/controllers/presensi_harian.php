<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of absensi
 *
 * @author Akhmad Fariiqun Awwa
 */
class Presensi_harian extends MY_Controller{
    protected $title    = "Presensi Harian";
    protected $model    = 'presensi_harian_m';
    protected $related_model= array(
        'jenisph' 
    );
    protected $dd_model = array(
        'jenis_presensi_harian_m'    => 'NAMAJPH'
        );
//    function index() {
//        $data['title']  = 'Daftar '.$this->title;
//        $data['table']  = $this->obj;
//        $data['records']= $this->mdl->with('jenisph')
//                                    ->get_all();
//        $view['css']    = 'assets/css/plugins/dataTables.bootstrap.css';
//        $view['topnav'] = 'admin_topnav';
//        $view['sidenav']= 'admin_sidenav';
//        $view['content']= 'daftar_'.$this->obj;
//        $view['js']     = array(
//            'assets/js/plugins/dataTables/jquery.dataTables.js',
//            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
//            );
//        $view['script'] = "$('#".$data['table']."').dataTable();";
//        $this->page->view($view, $data);
//    }
    protected function get_data_from_form() {
        $data=array(
            'IDJPH'     => $this->input->post('idjph'),
            'TGLPH'       => $this->input->post('tglph'),
            'STATR'     => 0
        );
        return $data;
    }
    
}
