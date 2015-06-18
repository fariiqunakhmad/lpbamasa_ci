<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of absensi
 *
 * @author Akhmad Fariiqun Awwa
 */
class Presensi_mengajar extends MY_Controller{
    protected $title    = "Presensi Mengajar";
    protected $model    = 'presensi_mengajar_m';
    protected $dd_model = array(
        'kelas_mk_m'    => 'NAMAKMK',
        'pegawai_m'     => 'NAMAP'
        );
    protected $related_model= array(
        'kelas_mk',
        'pegawai'
    );
    
    protected function get_data_from_form() {
        $data=array(
            'IDKMK'         => $this->input->post('idkmk'),
            'PERTEMUAN'     => $this->input->post('pertemuan'),
            'NIP'           => $this->input->post('nip'),
            'TGLMENGAJAR'   => $this->input->post('tglmengajar'),
            'STATR'         => 0
        );
        return $data;
    }
    function daftar_per_kmk() {
        $this->view['css']     = array(
            'assets/css/plugins/dataTables.bootstrap.css',
//                'assets/css/plugins/bootstrap-table.css',
            'assets/css/plugins/select/bootstrap-select.css'
        );
        $this->view['js']     = array(
            'assets/js/plugins/dataTables/jquery.dataTables.js',
            'assets/js/plugins/dataTables/dataTables.bootstrap.js',
//                'assets/js/plugins/bootstrap-table/bootstrap-table.js',
            'assets/js/modul/presensi_mengajar.js',
            'assets/js/plugins/select/bootstrap-select.js'
        );
        $this->make_dd_resource();
        
        $this->data['title']    = 'Daftar '.$this->title;
        $this->data['table']    = 'daftar_presensi_mengajar';
        $this->view['content']  = 'daftar_presensi_mengajar_per_kmk';
        $this->page->view($this->view, $this->data);
    }
    function get_daftar_presensi_mengajar() {
        $idkmk=$this->uri->segment(3);
        $this->load->model('kelas_mk_m');
        $this->data['kmk']  =$this->kelas_mk_m->get($idkmk);
        $this->data['records']    =$this->mdl->get_many_by('IDKMK',$idkmk);
        $this->data['table']    = 'detail_daftar_presensi_pegawai';
        $this->load->view('detail_daftar_presensi_mengajar', $this->data);
    }
    
    function get_kmk() {
        $idkmk = $this->uri->segment(3);
        $this->mdl->order_by('PERTEMUAN', 'DESC');
        $this->mdl->limit(1);
        $rec=$this->mdl->get_many_by('IDKMK', $idkmk);
        if($rec==NULL){
            $pertemuan= 0;
        } else {
            $pertemuan=  $rec[0]->PERTEMUAN;
        }
        $this->load->model('kelas_mk_m');
        $nip = $this->kelas_mk_m->get($idkmk)->NIP;
        $data=array(
            'NIP'=>$nip,
            'PERTEMUAN'=>$pertemuan
        );
        echo json_encode($data);
    }
    public function load_form() {
        $this->view['css']     = array(
            'assets/css/plugins/select/bootstrap-select.css'
        );
        $this->view['js']     = array(
            'assets/js/modul/presensi_mengajar.js',
            'assets/js/plugins/select/bootstrap-select.js'
        );
        parent::load_form();
    }
    
}
