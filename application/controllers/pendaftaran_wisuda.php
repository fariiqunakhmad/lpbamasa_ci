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
        'wisuda_m'          => 'IDW',
        'mahasiswa_m'       => 'NAMAM'
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
}
