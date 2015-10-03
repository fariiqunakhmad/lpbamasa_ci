<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pendaftaran_bmh extends MY_Transaction {
    protected $title    = "Pendaftaran BMH";
    protected $model    = 'pendaftaran_bmh_m';
    protected $related_model= array(
        'peserta_bmh',
        'bmh',
        'pegawai',
        'kas'
    );
    protected $dd_model = array(
        'peserta_bmh_m' => 'NAMAPBMH',
        'bmh_m'         => 'IDBMH',
        'kota_m'        => 'NAMAK',
        'pekerjaan_m'   => 'NAMAJ',
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
        
        $this->view['content']=$this->obj.'/form_'.$this->obj;
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
            $value['pbmh']=$datapbmh;
        } else{
            $idpbmh=$this->input->post('idpbmh');
        }
        $value['data']['IDPBMH']    = $idpbmh;
        $value['data']['IDBMH']       = $this->input->post('idbmh');
        $value['kas']['NOMINALKAS'] = $this->input->post('bayardaftarbmh');
        if($this->uri->segment(2)== 'insert'){
            $value['kas']['IDKK']   = '05';
            $value['kas']['DKKAS']  = 1;
            $value['kas']['NIP']    = NULL;
            $value['kas']['TGLKAS'] = date('Y-m-d');
            $value['kas']['STATR']  = 0;
            $value['kas']['IDKAS']  = $this->gen_kas_id($value['kas']['DKKAS'], $value['kas']['IDKK'], $value['kas']['TGLKAS']);
            
            $value['data']['NIP']   = $this->data['userid'];
            $value['data']['IDKAS'] = $value['kas']['IDKAS'];
            $value['data']['STATR'] = 0;
            $value['data']['IDDAFTARBMH']  = $this->gen_id($value['data']['IDBMH']);
            $value['idtrans']       = $value['data']['IDDAFTARBMH'];
        }
        return $value;
    }
    public function insert() {
        $data = $this->get_data_from_form();
        if(isset($data['pbmh'])){
            $this->load->model('peserta_bmh_m');
            $this->peserta_bmh_m->insert($data['pbmh']);
        }
        parent::insert();
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
        $this->load->view($this->obj.'/form_peserta_for_pendaftaran_bmh', $this->data);
        //print_r($this->data);
    }
//    function nota($idpbk) {
//        $row=$this->mdl->with('pegawai')->with('peserta_bmh')->with('bmh')->get($idpbk);
//        $data['IDPBK']        =$idpbk;
//        $data['TGLPBK']       =$row->TGLPBK;
//        $data['NIM']          =$row->NIM;
//        $data['NAMAM']        =$row->mahasiswa->NAMAM;
//        $data['NOMINALPBK']   =$row->NOMINALPBK;
//        $data['NAMAP']        =$row->pegawai->NAMAP;
//        $this->load->model('kewajiban_biaya_kuliah_m');
//        $data['recordskbk']     =$this->kewajiban_biaya_kuliah_m->with('kbk')->get_many_by('IDPBK',$idpbk);
//        $data['recordskbkbl']   =$this->kewajiban_biaya_kuliah_m->with('kbk')->get_many_by(array('IDPBK'=>NULL, 'NIM'=>$data['NIM']));
//        $data['table1']  = 'detail_pembayaran_biaya_kuliah';
//        $data['table2']  = 'detail_pembayaran_biaya_kuliah_belum_lunas';
//       
//        $this->load->view($this->obj.'/nota_pembayaran_biaya_kuliah', $data);
//        return $data;
//    }
    protected function gen_id($idbmh) {
        $last=$this->mdl->get_last_by_id('p'.$idbmh);
        if($last){
            return 'pbmh'.(substr($last[0]->IDDAFTARBMH, 4)+1);
        }else{
            return 'p'.$idbmh.'001';
        }
    }
    public function accept($idtrans) {
        parent::accept($idtrans);
        redirect($this->obj, 'refresh');
    }
    
}
