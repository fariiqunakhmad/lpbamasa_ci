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
        $id=$this->get_id_from_param();
        $data['title']  ='Data Detail '.$this->title;
        $data['record'] = $this->mdl->get($id);
        $view['topnav'] ='admin_topnav';
        $view['sidenav']='admin_sidenav';
        $view['content']='detail_'.$this->obj;
        $this->page->view($view, $data);
    }
}
