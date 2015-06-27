<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pembayaran_biaya_kuliah extends MY_Controller {
    protected $title    = "Pembayaran Biaya Kuliah";
    protected $model    = 'pembayaran_biaya_kuliah_m';
    protected $related_model= array(
        'mahasiswa',
        'pegawai'
        
    );
    protected $dd_model = array(
        'mahasiswa_m'       => 'NAMAM'
    );
    public function Pembayaran_biaya_kuliah() {
        parent::__construct();
    }
    function per_mahasiswa() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $nim=$this->data['userid'];
            $this->data['title']    = 'Riwayat Biaya Kuliah';
            $this->data['table']    = $this->obj;
            $this->data['table1']   = 'kewajiban_biaya_kuliah';
            $this->data['records']  =$this->mdl->get_many_by('NIM', $nim);
            $this->load->model('kewajiban_biaya_kuliah_m');
            $param=array(
                'NIM'   =>$nim,
                'IDPBK' =>NULL
            );
            $this->data['records1'] =$this->kewajiban_biaya_kuliah_m->with('mahasiswa1')->with('kbk')->get_many_by($param);
            $this->view['css']      = array(
                'assets/css/plugins/bootstrap-table.css'
                );
            $this->view['content']  = $this->obj.'/daftar_'.$this->obj.'_mahasiswa';
            $this->view['js']       = array(
                'assets/js/plugins/bootstrap-table/bootstrap-table.js',
                'assets/js/plugins/bootstrap-table/export/bootstrap-table-export.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/tableExport.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jquery.base64.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/sprintf.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/jspdf.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/base64.js'
                );
            $this->view['script'] = array(
                "$('#".$this->data['table']."').bootstrapTable();",
                "$('#".$this->data['table1']."').bootstrapTable();"
                );
            $this->page->view($this->view, $this->data);
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    function detail() {
        $q=$this->uri->segment(3);
        $this->mdl->with('mahasiswa');
        $this->mdl->with('pegawai');
        $row=$this->mdl->get($q);
        $this->data['IDPBK']        =$q;
        $this->data['TGLPBK']       =$row->TGLPBK;
        $this->data['NIM']          =$row->NIM;
        $this->data['NAMAM']        =$row->mahasiswa->NAMAM;
        $this->data['NOMINALPBK']   =$row->NOMINALPBK;
        $this->data['NAMAP']        =$row->pegawai->NAMAP;
        $this->load->model('kewajiban_biaya_kuliah_m');
        $this->kewajiban_biaya_kuliah_m->with('kbk');
        $this->data['recordskbk']=$this->kewajiban_biaya_kuliah_m->get_many_by('IDPBK',$q);
        $this->data['table']  = 'detail_pembayaran_biaya_kuliah';
       
        $this->load->view($this->obj.'/detail_pembayaran_biaya_kuliah', $this->data);
    }
    function load_form() {
        $this->view['css']     = array(
            //'assets/css/plugins/validator/Bootstrap-Validators.css',
            //'assets/css/jquery-ui.css',
            'assets/css/plugins/bootstrap-table.css'
            );
        $this->view['js']     = array(
            //'assets/js/plugins/validator/Bootstrap-Validators.js',
            'assets/js/modul/komponen_bk.js',
            'assets/js/plugins/bootstrap-table/bootstrap-table.js'
            //'assets/js/form_validator/'.$this->obj.'.js'
            );
        $this->make_dd_resource();
        $param=$this->get_id_from_url();
        if ($param == NULL){
            $this->data['title']  ='Form Insert '.$this->title;
            $this->data['record'] = NULL;
            $this->data['action'] = base_url().$this->obj.'/insert';
        }else{
            $this->data['title']  ='Form Update '.$this->title;
            $this->data['record'] = $this->mdl->get($param);
            $this->data['action'] = base_url().$this->obj.'/update/'.$param;
            $nimselected=$this->data['record']->NIM;
            $this->load->model('kewajiban_biaya_kuliah_m');
            $key=array('NIM', 'IDPBK');
            $value=array($nimselected, NULL );
            $this->kewajiban_biaya_kuliah_m->with('kbk');
            $this->data['recordskbk']=$this->kewajiban_biaya_kuliah_m->get_many_by($key,$value);
            $keys=array('NIM', 'IDPBK');
            $values=array($nimselected, $param );
            $this->kewajiban_biaya_kuliah_m->with('kbk');
            $this->data['recordskbks']=$this->kewajiban_biaya_kuliah_m->get_many_by($keys,$values);
            $this->data['table']  = 'detail_pembayaran_biaya_kuliah';
            $this->view['script']= "$('#".$this->data['table']."').bootstrapTable();";
        }
        $this->view['content']=$this->obj.'/form_'.$this->obj;
        $this->page->view($this->view, $this->data);
    }
    function load_detail_form(){
        $this->load->model('kewajiban_biaya_kuliah_m');
        $q=$this->uri->segment(3);
        $key=array('NIM', 'IDPBK');
        $value=array($q, NULL);
        $this->kewajiban_biaya_kuliah_m->with('kbk');
        $this->data['recordskbk']=$this->kewajiban_biaya_kuliah_m->get_many_by($key,$value);
        $this->data['table']  = 'detail_pembayaran_biaya_kuliah';
        $this->load->view($this->obj.'/detail_form_pembayaran_biaya_kuliah', $this->data);
    }
    protected function get_data_from_form() {
        $data=array(
            'IDPBK'     => $this->input->post('idpbk'),
            'TGLPBK'    => $this->input->post('tglpbk'),
            'NIM'       => $this->input->post('nim'),
            'NIP'       => $this->data['userid'],
            'NOMINALPBK'=> $this->input->post('total'),
            'STATR'     => 0
        );
        return $data;
    }
    function insert() {
        $data = $this->get_data_from_form();
        $this->mdl->insert($data);
        $this->insert_detail($data['IDPBK'], $data['NIM']);
        redirect($this->obj, 'refresh');
    }
    private function insert_detail($idpbk, $nim){
        $this->load->model('kewajiban_biaya_kuliah_m');
        if ($this->input->post('check')!=NULL) {
            foreach ($this->input->post('check') as $key => $value) {
                $v = explode(' ', $value);
                $datadetail['IDPBK']=$idpbk;
                $id['IDA'][$key]  = substr($nim, 0, 5);
                $id['NIM'][$key]  = $nim;
                $id['IDPA'][$key] = $v[0];
                $id['IDKBK'][$key]= $v[1];
            }
            //print_r($this->input->post('check'));
            $this->kewajiban_biaya_kuliah_m->update_by($id, $datadetail);
        }
    }
    function update() {
        $data = $this->get_data_from_form();
        
        $this->delete_detail($data['NIM'], $data['IDPBK']);
        
        
        $datau=array('NOMINALPBK' => $data['NOMINALPBK']);
        $this->mdl->update($data['IDPBK'], $datau);
        
        $this->insert_detail($data['IDPBK'], $data['NIM']);
        redirect($this->obj, 'refresh');
    }
    function delete() {
        $idpbk= $this->get_id_from_url();
        $record= $this->mdl->get($idpbk);
        $nim= $record->NIM;
        $this->delete_detail($nim, $idpbk);
        $this->mdl->delete($idpbk);
        redirect($this->obj, 'refresh');
    }
    private function delete_detail($nim, $idpbk) {
        $this->load->model('kewajiban_biaya_kuliah_m');
        $keys=array('NIM', 'IDPBK');
        $values=array($nim, $idpbk );
        $olddatas=$this->kewajiban_biaya_kuliah_m->get_many_by($keys,$values);
        //print_r($olddatas);
        
        if($olddatas!=NULL){
            for($i=0; $i<count($olddatas);$i++){
                $newdata['IDPBK']=NULL;
                $olddata['IDA'][$i]   = $olddatas[$i]->IDA;
                $olddata['NIM'][$i]   = $olddatas[$i]->NIM;
                $olddata['IDPA'][$i]  = $olddatas[$i]->IDPA;
                $olddata['IDKBK'][$i] = $olddatas[$i]->IDKBK;
            }
            $this->kewajiban_biaya_kuliah_m->update_by($olddata, $newdata);
        }
    }

    
    
}
