<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pendaftaran_wisuda extends MY_Transaction {
    protected $title    = "Pendaftaran Wisuda";
    protected $model    = 'pendaftaran_wisuda_m';
    protected $related_model= array(
        'wisuda',
        'mahasiswa',
        'pegawai',
        'kas'
    );
    protected $dd_model = array(
        'wisuda_m'          => 'PERIODEW',
        'mahasiswa_m'       => 'NAMAM'
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
    protected function gen_id($idw) {
        $last=$this->mdl->get_last_by_id('p'.$idw);
        if($last){
            $did =substr($last[0]->IDPW, 2)+1;
            if($did/10000<1){
                return 'pw000'.$did;
            }elseif ($did/100000<1) {
                return 'pw00'.$did;
            }elseif ($did/1000000<1) {
                return 'pw0'.$did;
            }elseif ($did/10000000<1) {
                return 'pw'.$did;
            }
        }else{
            return 'p'.$idw.'001';
        }
    }
    function get_data_from_form() {
        $value['data']['NIM']       = $this->input->post('nim');
        $value['data']['CATATANPW'] = $this->input->post('catatanpw');
        $value['data']['IDW']       = $this->input->post('idw');
        $value['kas']['NOMINALKAS'] = $this->input->post('bayarpw');
        if($this->uri->segment(2)== 'insert'){
            $value['kas']['IDKK']   = '04';
            $value['kas']['DKKAS']  = 1;
            $value['kas']['NIP']    = NULL;
            $value['kas']['TGLKAS'] = date('Y-m-d');
            $value['kas']['STATR']  = 0;
            $value['kas']['IDKAS']  = $this->gen_kas_id($value['kas']['DKKAS'], $value['kas']['IDKK'], $value['kas']['TGLKAS']);
            
            $value['data']['NIP']   = $this->data['userid'];
            $value['data']['IDKAS'] = $value['kas']['IDKAS'];
            $value['data']['STATR'] = 0;
            $value['data']['IDPW']  = $this->gen_id($value['data']['IDW']);
            $value['idtrans']       = $value['data']['IDPW'];
        }
        return $value;
    }
    function load_form() {
        $this->view['css']     = array(
            'assets/css/plugins/select/bootstrap-select.css'
            );
        $this->view['js']     = array(
            'assets/js/modul/pendaftaran_wisuda.js',
            'assets/js/plugins/select/bootstrap-select.js',
            'assets/js/validator.js'
            );
        $this->set_last_wisuda();
        $this->make_dd_resource();
        $id=$this->get_id_from_url();
        if ($id == NULL){
            $this->data['title']  ='Form Insert '.$this->title;
            $this->data['record'] = NULL;
            $this->data['action'] = base_url().$this->obj.'/insert';
        }else{
            $this->data['title']  ='Form Update '.$this->title;
            $this->data['record'] = $this->mdl->get($id);
            $param= $this->make_url_param($id);
            $this->data['action'] = base_url().$this->obj.'/update'.$param;
            $this->data["dd_mahasiswa_m"] =  $this->mahasiswa_m->dropdown_selected($this->data['record']->NIM);
        }
        $this->view['content']=$this->obj.'/form_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
    private function set_last_wisuda(){
        $this->load->model('wisuda_m');
        $this->data['lastw']=  $this->wisuda_m->order_by('PERIODEW', 'DESC')->get_all()[0];
    }
    function get_biayaw() {
        $idw = $this->get_id_from_url();
        $this->load->model('wisuda_m');
        $wisuda = $this->wisuda_m->get($idw);
        echo $biayaw = $wisuda->BIAYAW;
    }
    public function update() {
        $data = $this->get_data_from_form();
        $id= $this->get_id_from_url();
        $this->mdl->update($id, $data);
        redirect($this->obj, 'refresh');
    }
    public function delete($idtrans) {
        parent::delete($idtrans);
        redirect($this->obj.'/nota/'.$idtrans, 'refresh');
    }
    public function delete_trans($idtrans) {
        parent::delete_trans($idtrans);
        redirect($this->obj.'/nota/'.$idtrans, 'refresh');
    }
    public function delete_kas($idtrans) {
        parent::delete_kas($idtrans);
        redirect($this->obj, 'refresh');
    }
    public function accept($idtrans) {
        parent::accept($idtrans);
        redirect($this->obj, 'refresh');
    }
}
