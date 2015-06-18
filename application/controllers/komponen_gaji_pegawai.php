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
            'IDKBK'     => $this->input->post('txtidkbk'),
            'IDA'       => $this->input->post('txtida'),
            'BIAYA'     => $this->input->post('txtbiaya'),
            'STATR'     => 0
        );
        return $data;
    }
    public function per_pegawai() {
        $this->data['title']  = 'Daftar Komponen Gaji per Pegawai';
        $this->data['table']  = $this->obj;
        $this->view['css']    = array(
            'assets/css/plugins/bootstrap-table.css',
            'assets/css/plugins/select/bootstrap-select.css'
            );
        $this->view['content']= 'komponen_gaji_per_pegawai';
        $this->view['js']     = array(
            'assets/js/plugins/bootstrap-table/bootstrap-table.js',
            'assets/js/plugins/select/bootstrap-select.js',
            'assets/js/modul/komponen_gaji_pegawai.js'
            );
        $this->load->model('pegawai_m');
        $this->data["dd_pegawai_m"] =  $this->pegawai_m->dropdown('NAMAP');
        $this->view['script'] = "$('#".$this->data['table']."').bootstrapTable();";
        $this->page->view($this->view, $this->data);
    }
    public function detail_per_pegawai() {
        $q=$this->uri->segment(3);
        $this->data['records_kgp']=$this->mdl->get_many_by('NIP',$q);
        $this->data['table']  = 'detail_komponen_gaji_per_pegawai';
        $this->load->view('detail_komponen_gaji_per_pegawai', $this->data);
    }
}
