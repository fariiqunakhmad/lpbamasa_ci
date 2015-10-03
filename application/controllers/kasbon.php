<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kasbon extends MY_Transaction {
    protected $title    = "Kasbon";
    protected $model    = 'kasbon_m';
    protected $related_model= array(
        'pegawai',
        'kas'
    );
    function index() {
        if(can_access($this->obj)){
            parent::index();
            array_push($this->view['js'], 'assets/js/modul/kasbon.js');
            if($this->data['useras']['id']==3){
                $this->data['records']= $this->mdl->get_many_by('NIP',$this->data['userid']);
            } else{
                $this->data['records']= $this->mdl->get_all();
            }
            $this->page->view($this->view, $this->data);
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    protected function gen_id($nip) {
        $last=$this->mdl->order_by('IDKB', 'DESC')->limit(1)->get_many_by('NIP', $nip);
        if($last){
            return 'kb'.(substr($last[0]->IDKB, 2)+1);
        }else{
            return 'kb'.$nip.'0001';
        }
    }
    function get_data_from_form() {
        $value['kas']['NOMINALKAS']     = $this->input->post('nominalkb');
        $value['data']['KETERANGANKB']  = $this->input->post('keterangankb');
        $value['data']['QTYCICILANKB']  = $this->input->post('qtycicilankb');
        if($this->uri->segment(2)== 'insert'){
            $value['kas']['NIP']    = NULL;
            $value['kas']['IDKK']   = '07';
            $value['kas']['TGLKAS'] = date('Y-m-d');
            $value['kas']['DKKAS']  = '2';
            $value['kas']['STATR']  = 0;
            $value['kas']['IDKAS']  = $this->gen_kas_id($value['kas']['DKKAS'], $value['kas']['IDKK'], $value['kas']['TGLKAS']);
            $value['data']['NIP']   = $this->data['userid'];
            $value['data']['IDKAS'] = $value['kas']['IDKAS'];
            $value['data']['STATKB']= 0;
            $value['data']['STATR'] = 0;
            $value['data']['IDKB']  = $this->gen_id($value['data']['NIP']);
            $value['idtrans']       = $value['data']['IDKB'];
        }
        return $value;
    }
    public function load_form() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $id=$this->get_id_from_url();
            if ($id == NULL){
                $this->data['title']  ='Form Permohonan '.$this->title;
                $this->data['record'] = NULL;
                $this->data['action'] = base_url().$this->obj.'/insert';
            }else{
                $this->data['title']  ='Form Edit Permohonan '.$this->title;
                $this->data['record'] = $this->mdl->get($id);
                $param= $this->make_url_param($id);
                $this->data['action'] = base_url().$this->obj.'/update'.$param;
            }
            $this->make_dd_resource();
            $this->view['content']=$this->obj.'/form_'.$this->obj;
            $this->page->view($this->view, $this->data);
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    function delete_app($idtrans) {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $idkas= $this->mdl->get($idtrans)->IDKAS;
            $this->mdl->hard_delete($idtrans);
            $this->kas->hard_delete($idkas);
            redirect($this->obj, 'refresh');
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    function detail($idtrans) {
        $this->load->model('cicilan_kasbon_m');
        $this->data['recordsck']=$this->cicilan_kasbon_m->with('penggajian')->get_many_by('IDKB',$idtrans);
        $this->data['table']  = 'detail_'.$this->obj;
        parent::detail($idtrans);
    }
    public function accept($idtrans) {
        parent::accept($idtrans);
        redirect($this->obj.'/nota/'.$idtrans, 'refresh');
    }
    public function delete($idtrans) {
        parent::delete($idtrans);
        redirect($this->obj.'/nota/'.$idtrans, 'refresh');
    }
}
