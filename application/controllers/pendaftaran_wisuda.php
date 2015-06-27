<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pendaftaran_wisuda extends MY_Controller {
    protected $title    = "Pendaftaran Wisuda";
    protected $model    = 'pendaftaran_wisuda_m';
    protected $related_model= array(
        'wisuda',
        'mahasiswa',
        'pegawai'  
    );
    protected $dd_model = array(
        'wisuda_m'          => 'PERIODEW',
        //'mahasiswa_m'       => 'NAMAM'
    );
    function get_data_from_form() {
        $data=array(
            'NIM'       => $this->input->post('nim'),
            'IDPW'      => $this->input->post('idpw'),
            'IDW'       => $this->input->post('idw'),
            'NIP'       => $this->data['userid'],
            'TGLPW'     => $this->input->post('tglpw'),
            'CATATANPW' => $this->input->post('catatanpw'),
            'BAYARPW'   => $this->input->post('bayarpw'),
            'STATR'     => 0
        );
        return $data;
    }
    function load_form() {
        $this->view['css']     = array(
            'assets/css/plugins/select/bootstrap-select.css'
            );
        $this->view['js']     = array(
            'assets/js/modul/pendaftaran_wisuda.js',
            'assets/js/plugins/select/bootstrap-select.js'
            );
        $this->set_last_wisuda();
        $this->make_dd_resource();
        $this->load->model('mahasiswa_m');
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
        foreach ( $this->mahasiswa_m->dropdown1() as $key => $value) {
                $this->data["dd_mahasiswa_m"][$key]=$value;
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
    public function insert() {
        $data = $this->get_data_from_form();
        $this->mdl->insert($data);
        $this->insert_child($data['NIM'], $data['IDPW']);
        redirect($this->obj, 'refresh');
    }
    private function insert_child($nim, $idpw) {
        $this->load->model('mahasiswa_m');
        $data['IDPW']=$idpw;
        $this->mahasiswa_m->update($nim, $data);
    }
    private function delete_child($nim) {
        $this->load->model('mahasiswa_m');
        $data['IDPW']=NULL;
        $this->mahasiswa_m->update($nim, $data);
    }
    public function update() {
        $data = $this->get_data_from_form();
        $id= $this->get_id_from_url();
        $nim= $this->mdl->get($id)->NIM;
        $this->delete_child($nim);
        $this->mdl->update($id, $data);
        $this->insert_child($data['NIM'], $data['IDPW']);
        redirect($this->obj, 'refresh');
    }
    public function delete() {
        $id= $this->get_id_from_url();
        $nim= $this->mdl->get($id)->NIM;
        $this->delete_child($nim);
        $this->mdl->delete($id);
        redirect($this->obj, 'refresh');
    }
}
