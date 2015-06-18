<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kg
 *
 * @author Akhmad Fariiqun Awwa
 */
class Peserta_bmh extends MY_Controller {
    protected $title    = "Peserta BMH";
    protected $model    = 'peserta_bmh_m';
    protected $related_model= array(
        'pekerjaan',
        'kota_lahir',
        'kota'
    );
    protected $dd_model = array(
        'kota_m'                => 'NAMAK',
        'pekerjaan_m'         => 'NAMAJ'
    );
    
    function get_data_from_form(){
        $data= array(
                'IDPBMH'    =>$this->input->post('idpbmh'),
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
        return $data;
    }
    
}
