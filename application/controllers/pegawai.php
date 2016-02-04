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
        'kot_kota',
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
    public function index() {
        array_push($this->view['js'], 'assets/js/modul/pegawai.js');
        array_push($this->view['js'], 'assets/js/plugins/fileinput/fileinput.js');
        array_push($this->view['js'], 'assets/js/plugins/fileinput/plugins/canvas-to-blob.js');
        array_push($this->view['css'], 'assets/css/plugins/fileinput/fileinput.css');
        parent::index();
    }
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
        }
        return $data;
    }
    function upload_photo($namafile) {
        $this->load->library('upload');
        $config['upload_path']      = './assets/images/pegawai/'; //path folder
        $config['allowed_types']    = 'jpg|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']         = '10000'; //maksimum besar file 4M
//        $config['max_width']        = '1288'; //lebar maksimum 1288 px
//        $config['max_height']       = '768'; //tinggi maksimu 768 px
        $config['file_name']        = $namafile; //nama yang terupload nantinya
        $config['overwrite']        = TRUE;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('avatar')){
            show_error('Gagal mengunggah foto '.$this->upload->display_errors());
        }  else {
            $key = $namafile;
            //$url = '<your server action to delete the file>';
            echo json_encode([
                'initialPreview' => [
                    "<img style='height:160px' src='".base_url()."assets/images/pegawai/".$key.".jpg' class='file-preview-image'>",
                ],
                'initialPreviewConfig' => [
                    ['caption' => "Architecture-{$key}.jpg", 'width' => '120px', 'url' => '', 'key' => $key],
                ],
                'append' => false
            ]);
        }
    }
//    public function update_photo($nip) {
//        $this->upload_photo($nip);
////        redirect($this->obj.'/detail/'.$nip, 'refresh');
//    }
//    public function insert() {
//        parent::insert();
//        
//    }
    public function load_form() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $id=$this->get_id_from_url();
            if ($id == NULL){
                $this->data['title']  ='Form Insert '.$this->title;
                $this->data['action'] = base_url().$this->obj.'/insert';
            }else{
                $param= $this->make_url_param($id);
                $this->data['title']  ='Form Update '.$this->title;
                $this->data['record'] = $this->mdl->get($id);
                $this->data['action'] = base_url().$this->obj.'/update'.$param;
            }
            $this->view['css']     = array(
                'assets/css/plugins/select/bootstrap-select.css'
                );
            $this->view['js']     = array(
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
    private function determine_masa_abdi($tahunmasuk) {
        $ma = date("Y")-$tahunmasuk;
        $this->load->model('masa_abdi_m');
        $datama= $this->masa_abdi_m->get_all();
        $i=count($datama);
        while($ma < $datama[$i-1]->TAHUNMINMA && $i > 0 ){
            $i--;
        }
        return $datama[$i-1]->IDMA;
    }
    function show_ava($nip) {
        if(file_exists('assets/images/pegawai/'.$nip.'.jpg')){
            $this->data['photo']='assets/images/pegawai/'.$nip.'.jpg';
        }else{
            $this->data['photo']='assets/images/default-avatar-male.jpg';
        }
        $this->data['nip']=$nip;
        $this->load->view($this->obj.'/photo_'.$this->obj, $this->data);
    }
    function detail($id){
        if($this->uri->segment(2)!='profile'){
            $this->data['title']  ='Data Detail '.$this->title;
        }else{
            $this->data['title']  ='Profile '.$this->title;
        }
        array_push($this->view['css'], 'assets/css/plugins/fileinput/fileinput.css');
        array_push($this->view['js'], 'assets/js/modul/pegawai.js');
        array_push($this->view['js'], 'assets/js/plugins/fileinput/fileinput.js');
        array_push($this->view['js'], 'assets/js/plugins/fileinput/plugins/canvas-to-blob.js');
        $this->data['record'] = $this->mdl->get($id);
        $this->view['content']=$this->obj.'/detail_'.$this->obj;
        if(file_exists('assets/images/pegawai/'.$id.'.jpg')){
            $defaultPhoto='assets/images/pegawai/'.$id.'.jpg';
        }else{
            $defaultPhoto='assets/images/default-avatar-male.jpg';
        }
        $this->view['script'] = '
                                $("#avatar'.$id.'").fileinput({
                                    uploadUrl: "'.base_url().'pegawai/upload_photo/'.$id.'", // server upload action
                                    uploadAsync: true,
                                    overwriteInitial: true,
                                    maxFileSize: 10000,
//                                    maxImageWidth: 50,
//                                    maxImageHeight: 50,
////                                    resizePreference: \'height\',
//                                    resizeImage: true,
                                    showClose: false,
                                    showCaption: false,
                                    browseLabel: \'Ubah Foto\',
                                    browseIcon: \'<i></i>\',
                                    elErrorContainer: \'#kv-avatar-errors\',
                                    msgErrorClass: \'alert alert-block alert-danger\',
                                    defaultPreviewContent: \'<img src="'.base_url().$defaultPhoto.'" alt="Your Avatar" style="width:160px">\',
                                    layoutTemplates: {main2: \'{preview} {browse}\'},
                                    allowedFileExtensions: ["jpg"],
                                    uploadExtraData: function(previewId, index) {
                                        return {key: index};
                                    }
                                });';
//        $this->view['script'] = "showAva($id);";
        $this->page->view($this->view, $this->data);
    }
    function profile(){
        $id=  $this->data['userid'];
        $this->detail($id);
    }
    function detail_1($nip){
        $this->data['record'] = $this->mdl->get($nip);
        if(file_exists('assets/images/pegawai/'.$nip.'.jpg')){
            $this->data['photo']='assets/images/pegawai/'.$nip.'.jpg';
        }else{
            $this->data['photo']='assets/images/default-avatar-male.jpg';
        }
        $this->load->view($this->obj.'/detail_'.$this->obj.'_1', $this->data);
        
    }
}
