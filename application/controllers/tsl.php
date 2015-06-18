<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tsl
 *
 * @author Akhmad Fariiqun Awwa
 */
class Tsl extends MY_Controller {
    protected $title    = "Transaksi Sektor Lain";
    protected $model    = 'tsl_m';
    protected $related_model= array(
        'kk',
        'pegawai',
        'peg_pegawai'
    );
    protected $dd_model = array(
        'kk_m'                => 'NAMAKK',
        'pegawai_m'         => 'NAMAP'
    );
    function get_data_from_form() {
        $data=array(
            'IDTSL'     => $this->input->post('idtsl'),
            'TGLTSL'    => $this->input->post('tgltsl'),
            'URAIANTSL' => $this->input->post('uraiantsl'),
            'DKTSL'     => $this->input->post('dktsl'),
            'NOMINALTSL'=> $this->input->post('nominaltsl'),
            'IDKK'      => $this->input->post('idkk'),
            'NIP'       => $this->data['userid'],
            'PEG_NIP'   => $this->input->post('peg_nip'),
            'STATR'     => 0
        );
        return $data;
    }
    public function insert() {
        $data = $this->get_data_from_form();
        $this->mdl->insert($data);
        redirect($this->obj, 'refresh');
//        $mydat=array(
//            'first_name'=>'akhmad',
//            'last_name' =>'fariiqun'
//        );
//        $this->dopdf($mydat);
    }
     function buatpdf()
    {
        $this->load->library('fpdf');
        $pdf = new FPDF();
        $pdf->fontpath='system/fonts/';
        $pdf->AddPage();
        $pdf->SetFont('Arial','',12);
        $teks = "Cara Gampang Integrasi FPDF dengan Codeigniter";
        // mencetak 10 baris kalimat dalam variable "teks".
        for( $i=0; $i < 10; $i++ ) {
            $pdf->Cell(0, 5, $teks, 1, 1, 'L'); 
        }
        $pdf->Output();
    }
    function dopdf($mydat){

            //$this->output->enable_profiler(false);
            //$this->load->library('parser');
            require_once(APPPATH.'third_party/html2pdf_v4.03/html2pdf.class.php');

            // set vars
            $tpl_path = 'path/to/view_tpl.php';
            $thefullpath = '/path/to/file_pdf.pdf';
            $preview = true;
            $previewpath = '/path/to/preview_pdf.pdf';


            // PDFs datas
            $datas = array(
              'first_name' => $mydat['first_name'],
              'last_name'  => $mydat['last_name'],
              'site_title' => config_item('site_title'),
            );

            // Encode datas to utf8
            $tpl_data = array_map('utf8_encode',$datas);


            // 
            // GENERATE PDF AND SAVE FILE (OR OUTPUT)
            //

            //$content = $this->parser->parse($tpl_path, $tpl_data, TRUE);
            $content = $this->load->view('kosong', '', TRUE);
            $html2pdf = new HTML2PDF('P','A4','fr', true, 'UTF-8',  array(7, 7, 10, 10));
            $html2pdf->pdf->SetAuthor($tpl_data['site_title']);
            $html2pdf->pdf->SetTitle($tpl_data['site_title']);
            $html2pdf->pdf->SetSubject($tpl_data['site_title']);
            $html2pdf->pdf->SetKeywords($tpl_data['site_title']);
            $html2pdf->pdf->SetProtection(array('print'), '');//allow only view/print
            $html2pdf->WriteHTML($content);
            if (!$preview) //save
              $html2pdf->Output($thefullpath, 'F');
            else { //save and load
              $html2pdf->Output($previewpath, 'D');
            }

        }
}