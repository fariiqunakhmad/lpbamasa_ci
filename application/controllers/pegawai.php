<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Pegawai extends MY_Controller {
    protected $title    = "Pegawai";
    protected $model    = 'pegawai_m';
    
    function get_data_from_form() {
        $data=array(
            'NIP'       => $this->input->post('nip'),
            'IDK'       => $this->input->post('idk'),
            'KOT_IDK'   => $this->input->post('kot_idk'),
            'IDMA'      => 1,
            'IDJR'      => $this->input->post('idjr'),
            'IDJAB'     => $this->input->post('idjab'),
            'IDJP'      => $this->input->post('idjp'),
            'PASSP'     => $this->input->post('passp'),
            'JENISP'    => $this->input->post('jenisp'),
            'NAMAP'     => $this->input->post('namap'),
            'ALAMATP'   => $this->input->post('alamatp'),
            'TLPP'      => $this->input->post('tlpp'),
            'TGLLP'     => $this->input->post('tgllp'),
            'JKP'       => $this->input->post('jkp'),
            'KWNP'      => $this->input->post('kwnp'),
            'THMASUKP'  => $this->input->post('thmasukp'),
            'STATP'     => $this->input->post('statp'),
            'STATR'     => 1
        );
        return $data;
    }
}
