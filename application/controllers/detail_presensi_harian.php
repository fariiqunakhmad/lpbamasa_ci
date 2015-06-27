<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Detail_presensi_harian extends MY_Controller{
    protected $title    = "Detail Presensi Harian";
    protected $model    = 'detail_presensi_harian_m';
    protected $related_model= array(
        'jenis_presensi_harian',
        'pegawai'  
    );
    protected $dd_model = array(
        'jenis_presensi_harian_m'   => 'NAMAJPH',
        'pegawai_m'                 => 'NAMAP'
    );
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['title']  = 'Daftar '.$this->title;
        $this->data['table']  = $this->obj;
        $param= array('IDJPH'   => $this->uri->segment(3),
                      'TGLPH'   => $this->uri->segment(4) );
        $this->data['records']= $this->mdl->with('pegawai')
                                    ->with('jenisph')
                                    ->get_many_by($param);
        $this->data['idjph']  = $this->uri->segment(3);
        $this->data['tglph']  = $this->uri->segment(4);
        
        $this->view['css']    = 'assets/css/plugins/dataTables.bootstrap.css';
        $this->view['content']= $this->obj.'/daftar_'.$this->obj;
        $this->view['js']     = array(
            'assets/js/plugins/dataTables/jquery.dataTables.js',
            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
            );
        $this->view['script'] = "$('#".$this->data['table']."').dataTable();";
        $this->page->view($this->view, $this->data);
    }
    public function load_form() {
//        $id=$this->get_id_from_param();
//        if ($id == NULL){
            $this->data['title']  ='Form Insert '.$this->title;
            $this->data['record'] = NULL;
            
            $this->data['action'] = base_url().$this->obj.'/insert';
//        }else{
//            $param='';
//            if(is_array($id)){
//                foreach ($id as $value) {
//                    $param .= "/".$value;
//                }
//            }
//            else{
//                $param .= "/".$id;
//            }
//            $this->data['title']  ='Form Update '.$this->title;
//            $this->data['record'] = $this->mdl->get($id);
//            $this->data['action'] = base_url().$this->obj.'/update'.$param;
//        }
        
//        if($this->dd_model != null){
//            foreach ($this->dd_model as $mdl => $value) {
//                $this->load->model($mdl);
//                $this->data["records$mdl"] =  $this->$mdl->dropdown($value);
//            } 
//        }
        $this->load->model('pegawai_m');
        if($this->uri->segment(3)==1){
            $jenisp=1;
        }  else {
            $jenisp=2;
        }
        
        $this->data['records_pegawai']= $this->pegawai_m->get_many_by('JENISP',$jenisp);
        $this->view['content']=$this->obj.'/form_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
    function insert() {
        $data = $this->get_data_from_form();
        $this->mdl->insert_many($data);
//        echo $this->input->post('tglph');
//        echo date_format(date_create($this->input->post('tglph')), 'Y-m');
        
        redirect("presensi_harian/index/".$this->input->post('idjph')."/".date_format(date_create($this->input->post('tglph')), 'Y-m'), 'refresh');
        
    }
    function reset() {
        $param = $this->get_id_from_url();
        print_r($param);
        //$this->mdl->delete_by($param);
        //redirect('presensi_harian', 'refresh');
    }
    protected function get_data_from_form() {
        foreach ($this->input->post('nip') as $key => $value) {
            $data[$key]['NIP']      = $value;
            $data[$key]['IDJPH']    = $this->input->post('idjph');
            $data[$key]['TGLPH']    = $this->input->post('tglph');
            $data[$key]['KETPH']    = $this->input->post('ketph')[$key];
            $data[$key]['STATR']    = 0;
        }
        return $data;
    }
}
