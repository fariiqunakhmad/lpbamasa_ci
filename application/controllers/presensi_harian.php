<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Presensi_harian extends MY_Controller{
    protected $title    = "Presensi Harian";
    protected $model    = 'presensi_harian_m';
    protected $related_model= array(
        'jenis_presensi_harian',
        'pegawai',
        'hari_kerja'
    );
    protected $dd_model = array(
        'jenis_presensi_harian_m'   => 'NAMAJPH',
        'pegawai_m'                 => 'NAMAP'
    );
    public function index($idjph, $bulan=NULL) {
        $this->load->model('jenis_presensi_harian_m');
        $jph= $this->jenis_presensi_harian_m->get($idjph);
        $this->view['css']     = array(
            'assets/css/plugins/dataTables.bootstrap.css',
//                'assets/css/plugins/bootstrap-table.css',
            'assets/css/plugins/select/bootstrap-select.css'
        );
        $this->view['js']     = array(
            'assets/js/plugins/dataTables/jquery.dataTables.js',
            'assets/js/plugins/dataTables/dataTables.bootstrap.js',
//                'assets/js/plugins/bootstrap-table/bootstrap-table.js',
            'assets/js/modul/presensi_harian.js',
            'assets/js/plugins/select/bootstrap-select.js',
            'assets/js/jquery-migrate-1.2.1.js'
        );
        $this->load->model('hari_kerja_m');
        $this->data['monts']    = $this->hari_kerja_m->get_months();
        $this->data['idjph']    = $idjph;
        $this->data['bulanselected']    = $bulan;
        $this->data['title']    = 'Daftar Presensi '.$jph->NAMAJPH;
        $this->data['table']    = 'detail_daftar_hari_kerja';
        if($bulan!=NULL){
            array_push($this->view['script'],"showDaftarPresensiHarian(".$idjph.",'".$bulan."');");
        }
        $zoom="
            if ($.browser.mozilla){               
                $('body').css('MozTransform','scale(' + 75 + ')');

            } else {
                $('body').css('zoom', ' ' + 75 + '%');
            }
        ";
        //array_push($this->view['script'], $zoom);
        $this->view['content']  = $this->obj.'/daftar_presensi_harian_per_jph';
        $this->page->view($this->view, $this->data);
        
//        $this->data['title']  = 'Daftar '.$this->title;
//        $this->data['table']  = $this->obj;
//        $param= array('IDJPH'   => $this->uri->segment(3),
//                      'TGLHK'   => $this->uri->segment(4) );
//        $this->data['records']= $this->mdl->with('pegawai')
//                                    ->with('jenisph')
//                                    ->get_many_by($param);
//        $this->data['idjph']  = $this->uri->segment(3);
//        $this->data['tglph']  = $this->uri->segment(4);
//        
//        $this->view['css']    = 'assets/css/plugins/dataTables.bootstrap.css';
//        $this->view['content']= $this->obj.'/daftar_'.$this->obj;
//        $this->view['js']     = array(
//            'assets/js/plugins/dataTables/jquery.dataTables.js',
//            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
//            );
//        $this->view['script'] = "$('#".$this->data['table']."').dataTable();";
//        $this->page->view($this->view, $this->data);
    }
    function get_daftar_presensi_harian($idjph, $bulan) {
        $this->load->model('presensi_harian_m');
        $this->data['detail']  =$this->presensi_harian_m->get_like($idjph, 'TGLHK', $bulan);
        $this->load->model('hari_kerja_m');
        $this->data['dates']    =$this->hari_kerja_m->get_dates($bulan);
        $this->load->model('pegawai_m');
        $this->data['pegawai']    =$this->pegawai_m->get_many_by('JENISP',$idjph);
        $this->data['table']    = 'detail_daftar_presensi_harian';
        $this->data['idjph']    =$idjph;
        $this->load->view($this->obj.'/detail_daftar_presensi_harian', $this->data);
    }
    public function load_form() {
        $param['IDJPH']=$this->uri->segment(3);
        $param['TGLHK']=$this->uri->segment(4);
        $this->data['title']  ='Form Insert '.$this->title;
        $this->data['record'] = $this->mdl->get_many_by($param);
        $this->data['action'] = base_url().$this->obj.'/insert';
        array_push($this->view['js'], 'assets/js/modul/presensi_harian.js');
        $this->load->model('pegawai_m');
        $this->data['records_pegawai']= $this->pegawai_m->get_many_by(['JENISP' => $param['IDJPH'],'TGLMASUKP <=' => $param['TGLHK']]);
//        print_r($this->data['records_pegawai']);
        $this->view['content']=$this->obj.'/form_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
    function insert() {
        $data = $this->get_data_from_form();
        //print_r($data);
        foreach ($data as  $value) {
            $param['NIP']     =$value['NIP'];
            $param['IDJPH']   =$value['IDJPH'];
            $param['TGLHK']   =$value['TGLHK'];
            if($this->mdl->get_by($param)){
                $this->mdl->update_by($param, $value);
            } else {
                $this->mdl->insert($value);
            }
        }
        redirect("presensi_harian/index/".$this->input->post('idjph')."/".date_format(date_create($this->input->post('tglph')), 'Y-m'), 'refresh');
    }
//    function reset() {
//        $param = $this->get_id_from_url();
//        print_r($param);
//        $this->mdl->delete_by($param);
//        redirect('presensi_harian', 'refresh');
//    }
    protected function get_data_from_form() {
        $ph=[];
        $kph=[];
        foreach ($this->input->post('nip') as $key => $value) {
            if(isset($this->input->post('ketph')[$key])){
                array_push($ph, $value);
                array_push($kph, $this->input->post('ketph')[$key]);
            }
        }
        foreach ($ph as $key => $value) {
            $data[$key]['NIP']      = $value;
            $data[$key]['IDJPH']    = $this->input->post('idjph');
            $data[$key]['TGLHK']    = $this->input->post('tglph');
            $data[$key]['KETPH']    = $kph[$key];
            $data[$key]['STATR']    = 0;
        }
        return $data;
    }
}
