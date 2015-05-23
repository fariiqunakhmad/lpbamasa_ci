<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kewajiban_biaya_kuliah extends MY_Controller {
    protected $title    = "Kewajiban Biaya Kuliah";
    protected $model    = 'kewajiban_biaya_kuliah_m';
    protected $related_model= array(
        'kbk',
        'angkatan',
        'periode_akademik',
        'mahasiswa',
        'biaya_kuliah',
        'pembayaran_biaya_kuliah'
    );
    protected $dd_model = array(
        'angkatan_m'            => 'IDA', 
        'periode_akademik_m'    => 'IDPA'
        );
    function index() {
        $this->data['title']  = 'Daftar '.$this->title;
        $this->data['table']  = $this->obj;
        $this->data['records']=$this->mdl->get_all();
        
        $this->view['css']    = 'assets/css/plugins/dataTables.bootstrap.css';
        $this->view['content']= 'daftar_'.$this->obj;
        $this->view['js']     = array(
            'assets/js/plugins/dataTables/jquery.dataTables.js',
            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
            );
        $this->view['script'] = "$('#".$this->data['table']."').dataTable();";
        $this->page->view($this->view, $this->data);
    }
    function get_data_from_form() {
        $a=0;
        $data= array(array());
        foreach ($this->input->post('c') as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if($value1){
                    $data[$a]['IDKBK']=$key1;
                    $data[$a]['IDA']=$this->input->post('ida');
                    $data[$a]['IDPA']=$this->input->post('idpa');
                    $data[$a]['NIM']=$key;
                    $data[$a]['STATR']=0;
                }
                $a++;
            }
        }
        return $data;
    }
    function insert() {
        $data = $this->get_data_from_form();
        $this->mdl->insert_many($data);
        redirect($this->obj, 'refresh');
    }
    public function load_form() {
        if($this->input->post('idpa') && $this->input->post('ida')){
            $this->data['title']  ='Form Insert '.$this->title;
            $this->data['table']  = $this->obj;
            
            $this->data['ida']=$this->input->post('ida');
            $this->data['idpa']=$this->input->post('idpa');
            $this->load->model('mahasiswa_m');
            $this->data['recordsmahasiswa']=$this->mahasiswa_m->get_many_by('IDA', $this->data['ida']);
            
            $this->load->model('biaya_kuliah_m');
            $this->data['recordsbk']=$this->biaya_kuliah_m ->with('komponen_biaya_kuliah')
                                                            ->get_many_by('IDA', $this->data['ida']);
            
                                                    
            
            $this->view['css']    = 'assets/css/plugins/dataTables.bootstrap.css';
            $this->view['content']= 'daftar_'.$this->obj;
            $this->view['content']='form_'.$this->obj.'_2';
            $this->data['action'] = base_url().$this->obj.'/insert';

        } else{
            $this->data['title']  ='Form Setup '.$this->title;
            if($this->dd_model != null){
                foreach ($this->dd_model as $mdl => $value) {
                    $this->load->model($mdl);
                    $this->data["records$mdl"] =  $this->$mdl->dropdown($value);
                } 
            }
            $this->view['content']='form_'.$this->obj.'_1';
            $this->data['action'] = base_url().$this->obj.'/load_form';
          
        }
        $this->page->view($this->view, $this->data);
    }
}
