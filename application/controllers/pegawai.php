<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pegawai extends MY_Controller {
    protected $title    = "Pegawai";
    protected $model    = 'pegawai_m';
    protected $related_model = array(
        'kota',
        'jarak_rumah',
        'jabatan',
        'jenjang_pendidikan'
        );
    protected $dd_model = array(
        'kota_m'                => 'NAMAK',
        'jarak_rumah_m'         => 'IDJR',
        'jabatan_m'             => 'NAMAJAB',
        'jenjang_pendidikan_m'  => 'NAMAJP'
    );
    
    function get_data_from_form() {
        $data=array(
            'IDK'       => $this->input->post('idk'),
            'KOT_IDK'   => $this->input->post('kot_idk'),
            'IDMA'      => $this->determine_masa_abdi($this->input->post('tglmasukp')),
            'IDJR'      => $this->input->post('idjr'),
            'IDJAB'     => $this->input->post('idjab'),
            'IDJP'      => $this->input->post('idjp'),
            'JENISP'    => $this->input->post('jenisp'),
            'NAMAP'     => $this->input->post('namap'),
            'ALAMATP'   => $this->input->post('alamatp'),
            'TLPP'      => $this->input->post('tlpp'),
            'TGLLP'     => $this->input->post('tgllp'),
            'JKP'       => $this->input->post('jkp'),
            'KWNP'      => $this->input->post('kwnp'),
            'STATP'     => $this->input->post('statp')
        );
        
        if($this->uri->segment(2)== 'insert'){
            $data['NIP']        = $this->gen_id($this->input->post('tglmasukp'));
            $data['TGLMASUKP']  = $this->input->post('tglmasukp');
            $data['STATR']      = 0;
            $data['PASSP']      =  md5($this->input->post('passp'));
            $this->upload_photo($data['NIP']);
        }
        return $data;
    }
    function upload_photo($namafile) {
        $this->load->library('upload');
        $config['upload_path']      = './assets/images/pegawai/'; //path folder
        $config['allowed_types']    = 'jpg|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']         = '4048'; //maksimum besar file 4M
        $config['max_width']        = '1288'; //lebar maksimum 1288 px
        $config['max_height']       = '768'; //tinggi maksimu 768 px
        $config['file_name']        = $namafile; //nama yang terupload nantinya
        $config['overwrite']        = TRUE;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userfile')){
            show_error('Gagal mengunggah foto '.$this->upload->display_errors());
        }
    }
    public function update_photo($nip) {
        echo $nip;
        $this->upload_photo($nip);
        redirect($this->obj.'/detail/'.$nip, 'refresh');
    }
    public function insert() {
        parent::insert();
        
    }
    public function load_form() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $id=$this->get_id_from_url();
            if ($id == NULL){
                $this->data['title']  ='Form Insert '.$this->title;
//                $this->data['NIP'] = $this->generate_nip();
                $this->data['action'] = base_url().$this->obj.'/insert';
            }else{
                $param= $this->make_url_param($id);
                $this->data['title']  ='Form Update '.$this->title;
                $this->data['record'] = $this->mdl->get($id);
                $this->data['action'] = base_url().$this->obj.'/update'.$param;
            }
            $this->view['css']     = array(
//                'assets/css/plugins/validator/Bootstrap-Validators.css',
                'assets/css/plugins/select/bootstrap-select.css'
                );
            $this->view['js']     = array(
//                'assets/js/plugins/validator/Bootstrap-Validators.js'
//                'assets/js/form_validator/'.$this->obj.'.js'
                'assets/js/plugins/select/bootstrap-select.js',
                'assets/js/validator.js'
                );
            $this->make_dd_resource();
            $this->view['content']=$this->obj.'/form_'.$this->obj;
            $this->page->view($this->view, $this->data);
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    protected function gen_id($tglmasukp) {
        $last=$this->mdl->get_last_by_tglmasukp($tglmasukp);
        if($last){
            return $last[0]->NIP+1;
        }else{
            return date('Ym', strtotime(str_replace('-','/', $tglmasukp)) ).'001';
        }
    }
//    private function generate_nip() {
//        $no= $this->mdl
//                ->order_by('NIP', $order = 'DESC')
//                ->limit(1)
//                ->get_by('THMASUKP',date("Y"))
//                ;
//        if($no){
//            $nip=date("Y").(1+(int)substr($no->NIP, 4));
//        } else {
//            $nip=date("Y").'1';
//        }
//        return $nip;
//    }
    private function determine_masa_abdi($tahunmasuk) {
        $ma = date("Y")-$tahunmasuk;
        $this->load->model('masa_abdi_m');
        $datama= $this->masa_abdi_m->get_all();
        $i=count($datama);
        $size = count($datama);
        while($ma < $datama[$i-1]->TAHUNMINMA && $i > 0 ){
            $i--;
        }
        return $datama[$i-1]->IDMA;
    }
    function detail(){
        $id=$this->get_id_from_url();
        $this->data['title']  ='Data Detail '.$this->title;
        $this->data['record'] = $this->mdl->get($id);
        $this->view['content']=$this->obj.'/detail_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
}
