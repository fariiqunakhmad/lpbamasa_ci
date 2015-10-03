<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pembayaran_biaya_kuliah extends MY_Transaction {
    protected $title    = "Pembayaran Biaya Kuliah";
    protected $model    = 'pembayaran_biaya_kuliah_m';
    protected $related_model= array(
        'pegawai',
        'mahasiswa',
        'kas'
    );
    protected $dd_model = array(
        'mahasiswa_m'       => 'NAMAM'
    );

    public function index() {
        //print_session();
        if($this->data['useras']['id']==4){
            $this->per_mahasiswa();
            //echo 'm';
        }else{
            parent::index();
            $this->data['records']= $this->mdl->get_all();
            $this->view['script']= "$('[data-toggle=\"popover\"]').popover(); ";
            $this->page->view($this->view, $this->data);
        }
    }
    function per_mahasiswa() {
        //if(can_access($this->obj.'/'.$this->uri->segment(2))){
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
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function detail($idtrans) {
        $this->load->model('komponen_pbk_m');
        $this->data['recordskpbk']   = $this->komponen_pbk_m->with_deleted()->with('kewajiban_biaya_kuliah')->get_many_by('IDPBK',$idtrans);
        $this->data['table']        = 'detail_'.$this->obj.$idtrans;
        parent::detail($idtrans);
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
        $this->load->model('komponen_pbk_m');
        $this->load->model('kewajiban_biaya_kuliah_m');
        $nim=$this->uri->segment(3);
        $idpbk = $this->komponen_pbk_m->get_idwbk_like($nim);
        foreach ($idpbk as $key => $value) {
            $idpbk[$key]=$value->IDWBK;
        }
        if(count($idpbk)>0){
            $this->data['recordskbk']=$this->kewajiban_biaya_kuliah_m->with('kbk')->get_option($nim, $idpbk);
        }  else {
            $this->data['recordskbk']=$this->kewajiban_biaya_kuliah_m->with('kbk')->get_many_by('NIM', $nim);
        }
        $this->data['table']  = 'detail_pembayaran_biaya_kuliah';
        $this->load->view($this->obj.'/detail_form_pembayaran_biaya_kuliah', $this->data);
    }
    protected function gen_id($nim) {
        $last=$this->mdl->order_by('IDPBK', 'DESC')->limit(1)->get_many_by('NIM', $nim);
        if($last){
            return 'pbk'.(substr($last[0]->IDPBK, 3)+1);
        }else{
            return 'pbk'.$nim.'01';
        }
    }
    protected function get_data_from_form() {
        $value['kas']['NOMINALKAS']     = $this->input->post('total');
        $value['data']['NIM']           = $this->input->post('nim');
        if($this->uri->segment(2)== 'insert'){
            $value['kas']['NIP']     = NULL;
            $value['kas']['IDKK']    = '02';
            $value['kas']['TGLKAS']  = date('Y-m-d');
            $value['kas']['DKKAS']   = '1';
            $value['kas']['STATR']   = 0;
            $value['kas']['IDKAS']   = $this->gen_kas_id($value['kas']['DKKAS'], $value['kas']['IDKK'], $value['kas']['TGLKAS']);
            $value['data']['NIP']    = $this->data['userid'];
            $value['data']['IDKAS']  = $value['kas']['IDKAS'];
            $value['data']['STATR']  = 0;
            $value['data']['IDPBK']  = $this->gen_id($value['data']['NIM']);
            $value['idtrans']        = $value['data']['IDPBK'];
        }
        return $value;
    }
    function insert() {  
         if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $value = $this->get_data_from_form();
            $this->kas->insert($value['kas']);
            $this->mdl->insert($value['data']);
            if ($this->input->post('check')!=NULL) {
                foreach ($this->input->post('check') as $k => $v) {
                    $data[$k]=['IDPBK'=>$value['data']['IDPBK'], 'IDWBK'=>$v, 'STATR'=>0];
                }
                $this->load->model('komponen_pbk_m');
                $this->komponen_pbk_m->insert_many($data);
            }
            $this->kas->update($value['kas']['IDKAS'], ['REFKAS'=>$value['idtrans']]);
            if($value['kas']['DKKAS']==1){
                redirect($this->obj.'/nota/'.$value['idtrans'], 'refresh');
            } else {
                redirect($this->obj, 'refresh');
            }
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
//    private function insert_detail($idpbk, $nim){
//        $this->load->model('kewajiban_biaya_kuliah_m');
//        if ($this->input->post('check')!=NULL) {
//            foreach ($this->input->post('check') as $key => $value) {
//                $v = explode(' ', $value);
//                $datadetail['IDPBK']=$idpbk;
//                $id['IDA'][$key]  = substr($nim, 0, 5);
//                $id['NIM'][$key]  = $nim;
//                $id['IDPA'][$key] = $v[0];
//                $id['IDKBK'][$key]= $v[1];
//            }
//            $this->kewajiban_biaya_kuliah_m->update_by($id, $datadetail);
//        }
//    }
//    function update() {
//        $data = $this->get_data_from_form();
//        
//        $this->delete_detail($data['NIM'], $data['IDPBK']);
//        $datau=array('NOMINALPBK' => $data['NOMINALPBK']);
//        $this->mdl->update($data['IDPBK'], $datau);
//        
//        $this->insert_detail($data['IDPBK'], $data['NIM']);
//        redirect($this->obj, 'refresh');
//    }
    function delete($idtrans) {
        parent::delete($idtrans);
        $this->delete_komponen_pbk($idtrans);
        redirect($this->obj.'/nota/'.$idtrans, 'refresh');
    }
    public function delete_kas($idtrans) {
        parent::delete_kas($idtrans);
        redirect($this->obj, 'refresh');
    }
    public function delete_trans($idtrans) {
        parent::delete_trans($idtrans);
        $this->delete_komponen_pbk($idtrans);
        redirect($this->obj.'/nota/'.$idtrans, 'refresh');
    }
    function delete_komponen_pbk($idtrans) {
        $this->load->model('komponen_pbk_m');
        $this->komponen_pbk_m->delete_by($this->mdl->primary_key, $idtrans);
    }
    public function cancel_delete($idtrans) {
        $this->cancel_delete_komponen_pbk($idtrans);
        parent::cancel_delete($idtrans);
    }
    public function cancel_delete_trans($idtrans) {
        $this->cancel_delete_komponen_pbk($idtrans);
        parent::cancel_delete_trans($idtrans);
    }
    public function cancel_delete_komponen_pbk($idtrans){
        $this->load->model('komponen_pbk_m');
        $this->komponen_pbk_m->update_by("IDPBK = '$idtrans'", array('STATR'=>0));
    }
//    private function delete_detail($nim, $idpbk) {
//        $this->load->model('kewajiban_biaya_kuliah_m');
//        $keys=array('NIM', 'IDPBK');
//        $values=array($nim, $idpbk );
//        $olddatas=$this->kewajiban_biaya_kuliah_m->get_many_by($keys,$values);
//        if($olddatas!=NULL){
//            for($i=0; $i<count($olddatas);$i++){
//                $newdata['IDPBK']=NULL;
//                $olddata['IDA'][$i]   = $olddatas[$i]->IDA;
//                $olddata['NIM'][$i]   = $olddatas[$i]->NIM;
//                $olddata['IDPA'][$i]  = $olddatas[$i]->IDPA;
//                $olddata['IDKBK'][$i] = $olddatas[$i]->IDKBK;
//            }
//            $this->kewajiban_biaya_kuliah_m->update_by($olddata, $newdata);
//        }
//    }
//    function print_it($idpbk) {
//        $data=$this->nota($idpbk);
//        //parent::print_it($this->obj.'/detail_pembayaran_biaya_kuliah', $data, $data['IDPBK']);
//        $this->load->helper(array('dompdf', 'file'));
//        $view=$this->obj.'/nota_pembayaran_biaya_kuliah';
//        $html = $this->load->view($view, $data, true);
//        //pdf_create($html, $data['IDPBK'], 'a6' );
//        return true;
//    }
    function nota($idpbk) {
        $this->load->model('komponen_pbk_m');
        $this->load->model('kewajiban_biaya_kuliah_m');
        $this->data['recordpbk']  = $this->mdl->with('mahasiswa')->with('pegawai')->get($idpbk);
        $this->data['table1']     = 'detail_pembayaran_biaya_kuliah';
        $this->data['table2']     = 'detail_pembayaran_biaya_kuliah_belum_lunas';
        $this->data['recordskbk'] = $this->komponen_pbk_m->with_deleted()->with('kewajiban_biaya_kuliah')->get_many_by('IDPBK',$idpbk);
        $idpbks = $this->komponen_pbk_m->with_deleted()->get_idwbk_like($this->data['recordpbk']->NIM);
        foreach ($idpbks as $key => $value) {
            $idpbks[$key]=$value->IDWBK;
        }
        if(count($idpbk)>0){
            $this->data['recordskbkbl']=$this->kewajiban_biaya_kuliah_m->with('kbk')->get_option($this->data['recordpbk']->NIM, $idpbks);
        }  else {
            $this->data['recordskbkbl']=$this->kewajiban_biaya_kuliah_m->with('kbk')->get_many_by('NIM', $this->data['recordpbk']->NIM);
        }
        $this->load->view($this->obj.'/nota_pembayaran_biaya_kuliah', $this->data);
    }
    public function accept($idtrans) {
        parent::accept($idtrans);
        redirect($this->obj, 'refresh');
    }

    
    
}
