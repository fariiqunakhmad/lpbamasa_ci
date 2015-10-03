<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Komponen_gaji_pegawai extends MY_Controller{
    protected $title    = "Komponen Gaji Pegawai";
    protected $model    = 'komponen_gaji_pegawai_m';
    protected $related_model= array(
        'kg',
        'pegawai'  
    );
    protected $dd_model = array(
        'kg_m'      => 'NAMAKG', 
        'pegawai_m' => 'NAMAP'
        );
    
    protected function get_data_from_form() {
        $data=array(
            'IDKGP'         => $this->input->post('idkgp'),
            'IDKG'          => $this->input->post('idkg'),
            'NIP'           => $this->input->post('nip'),
            'GAJISATUAN'    => $this->input->post('gajisatuan'),
            'STATR'         => 0
        );
        //print_r($data);
        return $data;
    }
    public function index() {
        $this->per_pegawai();
    }
    public function per_pegawai() {
        $this->data['title']  = 'Daftar Komponen Gaji per Pegawai';
        $this->data['table']  = $this->obj;
        $this->view['css']    = array(
            'assets/css/plugins/bootstrap-table.css',
            'assets/css/plugins/select/bootstrap-select.css'
            );
        $this->view['content']= $this->obj.'/komponen_gaji_per_pegawai';
        $this->view['js']     = array(
            'assets/js/plugins/bootstrap-table/bootstrap-table.js',
            'assets/js/plugins/select/bootstrap-select.js',
            'assets/js/modul/komponen_gaji_pegawai.js'
            );
        $this->load->model('pegawai_m');
        $this->data["dd_pegawai_m"] =  $this->pegawai_m->dropdown('NAMAP');
//        $this->view['script'] = "$('#".$this->data['table']."').bootstrapTable();"
////                . "$('#form1').submit(insert(event));"
//                ;
        $this->page->view($this->view, $this->data);
    }
    function get_masa_abdi($tglmasuk) {
        list($tahun_masuk, $bulan_masuk, $tanggal_masuk) = explode("-",$tglmasuk);
        list($tahun_today, $bulan_today, $tanggal_today) = explode("-",date('Y-m-d'));
        $hari_masuk=gregoriantojd($bulan_masuk,$tanggal_masuk,$tahun_masuk);
        $hari_today=gregoriantojd($bulan_today,$tanggal_today,$tahun_today);
        $umur   =$hari_today-$hari_masuk;
        $tahun  =  floor($umur/365);//menghitung usia tahun
        return $tahun;
    }
    public function detail_per_pegawai() {
        $this->load->model('pegawai_m');
        $this->data['nip']          = $this->uri->segment(3);
        $this->data['pegawai']      = $this->pegawai_m
                ->with('masa_abdi')
                ->with('jabatan')
                ->with('jarak_rumah')
                ->get($this->data['nip']);
        $this->data['ma']           = $this->get_masa_abdi($this->data['pegawai']->TGLMASUKP);
        $this->data['records_kgp']  = $this->mdl->with_deleted()->get_many_by('NIP',$this->data['nip']);
        $this->data['table']        = 'detail_komponen_gaji_per_pegawai';
        $this->load->view($this->obj.'/detail_komponen_gaji_per_pegawai', $this->data);
    }
//    public function load_form_insert() {
        //parent::load_form();
//        $this->data['record'] = NULL;
//        $this->data['action'] = base_url().$this->obj.'/insert';
//        $this->data['nip']=$this->uri->segment(3);
//        $this->make_dd_resource();
//        $this->load->view($this->obj.'/form_komponen_gaji_pegawai', $this->data);
//    }
    public function load_form() {
        $this->data['nip']=$this->uri->segment(3);
        $this->make_dd_resource();
        $this->data['records_kgp']  = $this->mdl->with_deleted()->get_many_by('NIP',$this->data['nip']);
        if($this->uri->segment(4)!=NULL){
            $this->data['action'] = base_url().$this->obj.'/update';
            $this->data['record'] = $this->mdl->get($this->uri->segment(4));
            $this->data['tab']      = ' Update';
        }  else {
            $this->data['action'] = base_url().$this->obj.'/insert';
            $this->data['record'] = NULL;
            $this->data['tab']      = ' Add';
        }
        $this->load->view($this->obj.'/form_komponen_gaji_pegawai', $this->data);
    }
    function get_gajisatuan($nip, $idkg) {
        $this->load->model('pegawai_m');
        switch ($idkg) {
            case 2:
                $a=$this->pegawai_m->with('jarak_rumah')->get($nip)->jarak_rumah->NOMINALTT;
                break;
            case 3:
                $a=  $this->pegawai_m->with('masa_abdi')->get($nip)->masa_abdi->NOMINALTA;
                break;
            case 4:
                $a=$this->pegawai_m->with('jabatan')->get($nip)->jabatan->NOMINALTJ;
                break;
            default:
                $a=NULL;
                break;
        }
        echo $a;
    }
    public function insert() {
       if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $data = $this->get_data_from_form();
            if($this->mdl->with_deleted()->get($data['IDKGP'])){
                $this->mdl->update($data['IDKGP'], $data);
            } else {
                $this->mdl->insert($data);
            }
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    function act() {
        $id= $this->get_id_from_url();
        $this->mdl->update($id, ['STATR'=>0]);
    }
}
