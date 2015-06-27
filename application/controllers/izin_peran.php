<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of peran
 *
 * @author Akhmad Fariiqun Awwa
 */
class Izin_peran extends MY_Controller {
    protected $title    = "Izin Peran";
    protected $model    = 'izin_peran_m';
    protected $related_model = array(
        'izin', 
        'peran'
        );
    protected $dd_model = array(
        'izin_m'    => 'FUNGSIIZIN'
        );  
    public function index() {
        if(can_access($this->obj)){
            $idperan=$this->uri->segment(3);
            $this->data['title']  = 'Daftar '.$this->title;
            $this->data['table']  = $this->obj;
            $this->data['records']= $this->mdl->with('izin')->get_many_by('IDPERAN', $idperan);
            $this->load->model('peran_m');
            $this->data['peran']= $this->peran_m->get($idperan);
            $this->view['css']    = array(
    //            'assets/css/plugins/dataTables.bootstrap.css'
                'assets/css/plugins/bootstrap-table.css'
                );
            $this->view['content']= $this->obj.'/daftar_'.$this->obj;
            $this->view['js']     = array(
    //            'assets/js/plugins/dataTables/jquery.dataTables.js',
    //            'assets/js/plugins/dataTables/dataTables.bootstrap.js'
                'assets/js/plugins/bootstrap-table/bootstrap-table.js',
                'assets/js/plugins/bootstrap-table/export/bootstrap-table-export.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/tableExport.js',
                'assets/js/plugins/bootstrap-table/export/jquery.plugin/jquery.base64.js',
    //            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/sprintf.js',
    //            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/jspdf.js',
    //            'assets/js/plugins/bootstrap-table/export/jquery.plugin/jspdf/libs/base64.js'
                );
    //        $this->view['script'] = "$('#".$this->data['table']."').dataTable();";
            $this->view['script'] = "$('#".$this->data['table']."').bootstrapTable();";
            $this->page->view($this->view, $this->data);
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    function get_data_from_form(){
        $data=array(
            'IDPERAN'   => $this->input->post('idperan'),
            'IDIZIN'   => $this->input->post('idizin'),
            'STATR'     => 0
        );
        return $data;
    }
    public function load_form() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $idperan=$this->uri->segment(3);
            $this->data['idperan']  = $idperan;
            $this->load->model('peran_m');
            $this->data['peran']= $this->peran_m->get($idperan);
            $this->data['peran_disable']= $this->mdl->get_many_by('IDPERAN',$idperan);
            parent::load_form();
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    public function insert() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $dataf = $this->get_data_from_form();
            print_r($dataf);
            $idizin=$dataf['IDIZIN'];
            foreach ($idizin as $key => $value) {
                $data[$key]['IDPERAN']  =$dataf['IDPERAN'];
                $data[$key]['IDIZIN']   =$value;
                $data[$key]['STATR']    =0;
            }
            echo '<br>';
            print_r($data);
            $this->mdl->insert_many($data);
            redirect($this->obj.'/index/'.$dataf['IDPERAN'], 'refresh');
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
    public function delete() {
        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $id= $this->get_id_from_url();
            $this->mdl->delete($id);
            redirect($this->obj.'/index/'.$this->uri->segment(3), 'refresh');
        } else {
            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
        }
    }
}
