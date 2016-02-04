<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Biaya_kuliah extends MY_Controller{
    protected $title    = "Biaya Kuliah";
    protected $model    = 'biaya_kuliah_m';
    protected $related_model= array(
        'angkatan',
        'komponen_biaya_kuliah'  
    );
    protected $dd_model = array(
        'angkatan_m'    => 'IDA', 
        'kbk_m'         => 'NAMAKBK'
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
    function get_kbk_dd($ida) {
        $this->data['records_bk']  = $this->mdl->with_deleted()->get_many_by('IDA',$ida);
        $this->load->model('kbk_m');
        $this->data["dd_kbk_m"]     =  $this->kbk_m->dropdown('NAMAKBK');
        $this->load->view('kbk_dd', $this->data);
    }
    public function load_form() {
        array_push($this->view['js'], 'assets/js/modul/biaya_kuliah.js');
        parent::load_form();
    }
}
