<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of absensi
 *
 * @author Akhmad Fariiqun Awwa
 */
class Hari_kerja extends MY_Controller{
    protected $title    = "Hari Kerja";
    protected $model    = 'hari_kerja_m';
   
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
    public function index() {
        if($this->uri->segment(3)==NULL){
            parent::index();
        } else {
            $idjph=$this->uri->segment(3);
            $bulan=$this->uri->segment(4);
            if($idjph==1){
                $jph='Dosen Piket';
            }elseif($idjph==2){
                $jph='Pegawai';
            }
            $this->view['css']     = array(
                'assets/css/plugins/dataTables.bootstrap.css',
//                'assets/css/plugins/bootstrap-table.css',
                'assets/css/plugins/select/bootstrap-select.css'
            );
            $this->view['js']     = array(
                'assets/js/plugins/dataTables/jquery.dataTables.js',
                'assets/js/plugins/dataTables/dataTables.bootstrap.js',
//                'assets/js/plugins/bootstrap-table/bootstrap-table.js',
                'assets/js/modul/hari_kerja.js',
                'assets/js/plugins/select/bootstrap-select.js'
            );
            
            $this->data['monts']    = $this->mdl->get_months($idjph);
            $this->data['idjph']    = $idjph;
            $this->data['bulanselected']    = $bulan;
            $this->data['title']    = 'Daftar Presensi '.$jph;
            $this->data['table']    = 'detail_daftar_hari_kerja';
            //$this->view['script']   = "$('#".$this->data['table']."').dataTable();";
            if($bulan!=NULL){
                $this->view['script']   = "showDetailDaftarPresensiHarian(".$idjph.",'".$bulan."');";
            }
            $this->view['content']  = $this->obj.'/daftar_hari_kerja_per_jph';
            $this->page->view($this->view, $this->data);
        }
    }
    protected function get_data_from_form() {
        $data=array(
            'IDJPH'     => $this->input->post('idjph'),
            'TGLHK'     => $this->input->post('tglph'),
            'STATR'     => 0
        );
        return $data;
    }
    function get_daftar_hari_kerja($idjph, $bulan) {
//        $idjph=$this->uri->segment(3);
//        $bulan=$this->uri->segment(4);
        $this->load->model('presensi_harian_m');
        $this->data['detail']  =$this->presensi_harian_m->get_like($idjph, 'TGLHK', $bulan);
        $this->load->model('hari_kerja_m');
        $this->data['dates']    =$this->hari_kerja_m->get_dates($idjph, $bulan);
        $this->load->model('pegawai_m');
        $this->data['pegawai']    =$this->pegawai_m->get_many_by('JENISP',$idjph);
        $this->data['table']    = 'detail_daftar_presensi_harian';
        $this->data['idjph']    =$idjph;
        $this->load->view($this->obj.'/detail_daftar_presensi_harian', $this->data);
    }
    public function load_form() {
        $this->data['title']    = 'Form Setup '.$this->title;
        $this->view['css']     = array(
            'assets/css/plugins/bootstrap-datepicker3.css'
        );
        $this->view['js']     = array(
            'assets/js/modul/hari_kerja.js',
            'assets/js/plugins/datepicker/bootstrap-datepicker.js'
        );
        $this->data['record']   = NULL;
        $this->data['action']   = base_url().$this->obj.'/insert';
        $inactivedatesarray=  $this->mdl->get_dates();
        $inactivedates='';
        foreach ($inactivedatesarray as $key=>$value) {
            $date=date_format(date_create($value->TGLHK),"m/d/Y") ;
            if($key>0){
                $inactivedates .=", '".$date."'";
            } else {
                $inactivedates ="'".$date."'";
            }   
        }
        $this->view['script']   = "$('#tglph').datepicker({"
                . "datesDisabled: [$inactivedates],"
                . "startView: 1,"
                . "multidate: true"
                . "});";
        $this->view['content']  = $this->obj.'/form_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
    public function insert() {
        $dataf = $this->get_data_from_form();
        $tglph=explode(",",$dataf['TGLHK']);
            foreach ($tglph as $key => $value) {
                $data[$key]['TGLHK']=date_format(date_create($value),"Y-m-d");
                $data[$key]['STATR']=0;
            }
            $this->mdl->insert_many($data);
        
        redirect($this->obj, 'refresh');
    }
}
