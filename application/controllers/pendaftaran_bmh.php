<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pendaftaran_bmh extends MY_Controller {
    protected $title    = "Pendaftaran Peserta BMH";
    protected $model    = 'pendaftaran_bmh_m';
    protected $related_model= array(
        'peserta_bmh',
        'bmh',
        'pegawai'  
    );
    protected $dd_model = array(
        'peserta_bmh_m' => 'NAMAPBMH',
        'bmh_m'         => 'IDBMH',
        'kota_m'        => 'NAMAK',
        'pekerjaan_m'   => 'NAMAJ',
    );
    
    public function load_form() {
        $this->view['css']     = array(
            'assets/css/plugins/select/bootstrap-select.css'
            );
        $this->view['js']     = array(
            'assets/js/modul/pendaftaran_bmh.js',
            'assets/js/plugins/select/bootstrap-select.js'
            );
        $this->set_last_bmh();
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
        }
        
        $this->view['content']='form_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
    function get_data_from_form() {
        if($this->input->post('idpbmh')=='baru'){
            $idpbmh=$this->input->post('idpbmhbaru');
            $datapbmh   = array(
                'IDPBMH'    =>$idpbmh,
                'IDK'       =>$this->input->post('idk'),
                'IDJ'       =>$this->input->post('idj'),
                'KOT_IDK'   =>$this->input->post('kot_idk'),
                'NAMAPBMH'  =>$this->input->post('namapbmh'),
                'TLPBMH'    =>$this->input->post('tlpbmh'),
                'JKPBMH'    =>$this->input->post('jkpbmh'),
                'ALAMATPBMH'=>$this->input->post('alamatpbmh'),
                'TLPPBMH'   =>$this->input->post('tlppbmh'),
                'STATR'     =>0
            );
            $data['PBMH']=$datapbmh;
        } else{
            $idpbmh=$this->input->post('idpbmh');
        }
        $datadaftarbmh=array(
            'IDDAFTARBMH'   => $this->input->post('iddaftarbmh'),
            'TGLDAFTARBMH'  => $this->input->post('tgldaftarbmh'),
            'IDBMH'         => $this->input->post('idbmh'),
            'BAYARDAFTARBMH'=> $this->input->post('bayardaftarbmh'),
            'IDPBMH'        => $idpbmh,
            'NIP'           => $this->data['userid'],
            'STATR'         => 0,
        );
        $data['DAFTARBMH']=$datadaftarbmh;
        return $data;
    }
    public function insert() {
        $data = $this->get_data_from_form();
        if(isset($data['PBMH'])){
            $this->load->model('peserta_bmh_m');
            $this->peserta_bmh_m->insert($data['PBMH']);
        }
        $this->mdl->insert($data['DAFTARBMH']);
        redirect($this->obj, 'refresh');
    }
    public function update() {
        $data = $this->get_data_from_form();
        $id= $this->get_id_from_url();
        if(isset($data['PBMH'])){
            $this->load->model('peserta_bmh_m');
            $this->peserta_bmh_m->insert($data['PBMH']);
        }
        $this->mdl->update($id, $data['DAFTARBMH']);
        redirect($this->obj, 'refresh');
    }
    private function set_last_bmh(){
        $this->load->model('bmh_m');
        $this->data['lastbmh']=  $this->bmh_m->order_by('IDBMH', 'DESC')->get_all()[0];
    }
    function get_bmh() {
        $idbmh = $this->get_id_from_url();
        $this->load->model('bmh_m');
        $bmh = $this->bmh_m->get($idbmh);
        echo json_encode($bmh);
    }
    function load_form_peserta_bmh() {
        $this->make_dd_resource();
        $this->load->view('form_peserta_for_pendaftaran_bmh', $this->data);
        //print_r($this->data);
    }
    
}
