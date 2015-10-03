<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bmh extends MY_Controller {
    protected $title    = "Kegiatan Bimbingan Manasik Haji";
    protected $model    = 'bmh_m';
    protected $related_model= array(
        'pegawai'  
    );
    protected $dd_model = array(
        'pegawai_m'         => 'NAMAP'
    );
    function get_data_from_form() {
        $tahunbmh   = date('Y', strtotime($this->input->post('tglmulaibmh')));
        $periodebmh = $this->gen_periodebmh($tahunbmh);
        $idbmh      = $this->gen_id($tahunbmh, $periodebmh);
        $data=array(
            'IDBMH'         => $idbmh,
            'NIP'           => $this->input->post('nip'),
            'TAHUNBMH'      => $tahunbmh,
            'PERIODEBMH'    => $periodebmh,
            'TGLMULAIBMH'   => $this->input->post('tglmulaibmh'),
            'TGLAKHIRBMH'   => $this->input->post('tglakhirbmh'),
            'BIAYABMH'      => $this->input->post('biayabmh'),
            'STATR'         => 0
        );
        return $data;
    }
    protected function gen_id($tahunbmh, $periodebmh) {
        if($periodebmh/10<1){
            $id=$tahunbmh.'0'.$periodebmh;
        }else{
            $id=$tahunbmh.$periodebmh;
        }
        return 'bmh'.$id;
    }
    function gen_periodebmh($tahunbmh) {
        $this->load->model('bmh_m');
        $lastbmh=$this->bmh_m->order_by('PERIODEBMH', 'DESC')->limit(1)->get_many_by('TAHUNBMH', $tahunbmh);
        if($lastbmh){
            return $lastbmh[0]->PERIODEBMH+1;
        }else{
            return 1;
        }
        //print_r($periodebmh);
    }
//    public function insert() {
//        $this->get_data_from_form();
//        //print_r( $this->get_data_from_form());
//        //parent::insert();
//    }
}    
