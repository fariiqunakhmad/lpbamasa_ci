<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tsl
 *
 * @author Akhmad Fariiqun Awwa
 */
class Tsl extends MY_Transaction {
    protected $title    = "Transaksi Sektor Lain";
    protected $model    = 'tsl_m';
    protected $related_model= array(
        'pegawai',
        'kas'
    );
    protected $dd_model = array(
        'kk_m'                => 'NAMAKK'
    );
    function index() {
        if(can_access($this->obj)){
            parent::index();
            $this->data['records']= $this->mdl->get_all();
            $this->page->view($this->view, $this->data);
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    protected function gen_id($idkk, $dk) {
        $last=$this->mdl->get_last_by_id('TSL'.$dk.$idkk);
        if($last){
            return 'tsl'.(substr($last[0]->IDTSL, 3)+1);
        }else{
            return 'tsl'.$dk."$idkk".'0001';
        }
    }
    function get_data_from_form() {
        $value['kas']['IDKK']       = $this->input->post('idkk');
        $value['kas']['DKKAS']      = $this->input->post('dktsl');
        $value['kas']['NOMINALKAS'] = $this->input->post('nominaltsl');
        $value['data']['URAIANTSL'] = $this->input->post('uraiantsl');
        if($this->uri->segment(2)== 'insert'){
            $value['kas']['NIP']    = NULL;
            $value['kas']['TGLKAS'] = date('Y-m-d');
            $value['kas']['STATR']  = 0;
            $value['kas']['IDKAS']  = $this->gen_kas_id($value['kas']['DKKAS'], $value['kas']['IDKK'], $value['kas']['TGLKAS']);
            
            $value['data']['NIP']   = $this->data['userid'];
            $value['data']['IDKAS'] = $value['kas']['IDKAS'];
            $value['data']['STATR'] = 0;
            $value['data']['IDTSL'] = $this->gen_id($value['kas']['IDKK'], $value['kas']['DKKAS']);
            $value['idtrans']       = $value['data']['IDTSL'];
        }
        return $value;
    }
    public function accept($idtrans) {
        parent::accept($idtrans);
        $rec = $this->mdl->with('kas')->get($idtrans);
        if($rec->STATR==1){
            redirect($this->obj.'/nota/'.$idtrans, 'refresh');
        } else {
            redirect($this->obj, 'refresh');
        }
    }
    public function delete($idtrans) {
        parent::delete($idtrans);
        $rec = $this->mdl->with('kas')->get($idtrans);
        if($rec->kas->DKKAS==2){
            redirect($this->obj, 'refresh');
        }else{
            redirect($this->obj.'/nota/'.$idtrans, 'refresh');
        }
    }
    public function delete_kas($idtrans) {
        parent::delete_kas($idtrans);
        $rec = $this->mdl->with('kas')->get($idtrans);
        if($rec->kas->DKKAS==2){
            redirect($this->obj, 'refresh');
        }else{
            redirect($this->obj.'/nota/'.$idtrans, 'refresh');
        }
    }
    public function delete_trans($idtrans) {
        parent::delete_trans($idtrans);
        redirect($this->obj.'/nota/'.$idtrans, 'refresh');
    }

}