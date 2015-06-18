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
    public function __construct() {
        parent::__construct();
    }
    function get_data_from_form() {
        $idma= $this->determine_masa_abdi($this->input->post('thmasukp'));
        $data=array(
            'NIP'       => $this->input->post('nip'),
            'IDK'       => $this->input->post('idk'),
            'KOT_IDK'   => $this->input->post('kot_idk'),
            'IDMA'      => $idma,
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
            'THMASUKP'  => $this->input->post('thmasukp'),
            'STATP'     => $this->input->post('statp'),
            'STATR'     => 0
        );
        $pass=$this->input->post('passp');
        if($pass!=NULL){
            $data['PASSP'] =  md5($pass);
        }
        return $data;
    }
    
//    public function load_form() {
//        $id=$this->get_id_from_url();
//        if ($id == NULL){
//            $this->data['title']  ='Form Insert '.$this->title;
//            $this->data['NIP'] = $this->generate_nip();
//            $this->data['action'] = base_url().$this->obj.'/insert';
//        }else{
//            $param= $this->make_url_param($id);
//            $this->data['title']  ='Form Update '.$this->title;
//            $this->data['record'] = $this->mdl->get($id);
//            $this->data['action'] = base_url().$this->obj.'/update'.$param;
//        }
//        $this->make_dd_resource();
//        $this->view['content']='form_'.$this->obj;
//        $this->page->view($this->view, $this->data);
//    }
    function generate_nip() {
        //echo date("Y");
        $no= $this->mdl
                ->order_by('NIP', $order = 'DSC')
                ->limit(1)
                ->get_by('THMASUKP',date("Y"))
                ;
        if($no){
            $nip=date("Y").(1+(int)substr($no->NIP, 4));
        } else {
            $nip=date("Y").'1';
        }
        
        return $nip;
    }
    function determine_masa_abdi($tahunmasuk) {
        echo $ma = date("Y")-$tahunmasuk;
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
        $this->view['content']='detail_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
}
