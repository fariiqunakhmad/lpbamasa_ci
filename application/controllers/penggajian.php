<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of kbk
 *
 * @author Akhmad Fariiqun Awwa
 */
class Penggajian extends MY_Transaction {
    protected $title    = "Penggajian";
    protected $model    = 'penggajian_m';
    protected $related_model= array(
        'pegawai',
        'kas1',
        'kas2'
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
    protected function gen_id($bulangaji) {
        list($tahun, $bulan) = explode("-",$bulangaji);
        $last=$this->mdl->get_last_by_id('GP'.$tahun.$bulan);
        if($last){
            return 'gp'.(substr($last[0]->IDGAJI, 2)+1);
        }else{
            return 'gp'.$tahun.$bulan.'01';
        }
    }
    function get_data_from_form() {
        $value['kas'][0]['IDKK']        = '06';
        $value['kas'][0]['DKKAS']       = 2;
        $value['kas'][0]['NOMINALKAS']  = 0;
        $value['kas'][0]['NIP']         = NULL;
        $value['kas'][0]['TGLKAS']      = date('Y-m-d');
        $value['kas'][0]['STATR']       = 0;
        $value['kas'][0]['IDKAS']       = $this->gen_kas_id($value['kas'][0]['DKKAS'], $value['kas'][0]['IDKK'], $value['kas'][0]['TGLKAS']);
        
        $value['kas'][1]['IDKK']        = '07';
        $value['kas'][1]['DKKAS']       = 1;
        $value['kas'][1]['NOMINALKAS']  = 0;
        $value['kas'][1]['NIP']         = NULL;
        $value['kas'][1]['TGLKAS']      = date('Y-m-d');
        $value['kas'][1]['STATR']       = 0;
        $value['kas'][1]['IDKAS']       = $this->gen_kas_id($value['kas'][1]['DKKAS'], $value['kas'][1]['IDKK'], $value['kas'][1]['TGLKAS']);
        
        $value['data']['BULANGAJI']     = $this->input->post('bulan');
        $value['data']['NIP']           = $this->data['userid'];
        $value['data']['IDKAS']         = $value['kas'][0]['IDKAS'];
        $value['data']['KAS_IDKAS']     = $value['kas'][1]['IDKAS'];
        $value['data']['STATR']         = 0;
        $value['data']['IDGAJI']        = $this->gen_id($value['data']['BULANGAJI']);
        $value['idtrans']               = $value['data']['IDGAJI'];
        
        return $value;
    }
    public function insert() {
        $param=  $this->get_data_from_form();
        $this->kas->insert_many($param['kas']);
        $this->mdl->insert($param['data']);
        
        $this->load->model('detail_penggajian_m');
        $this->load->model('komponen_gaji_pegawai_m');
        
        $this->gen_detail_penggajian($param);
        $this->gen_cicilan_kasbon($param);
        $this->kas->update([$param['kas'][0]['IDKAS'],$param['kas'][1]['IDKAS']], ['REFKAS'=>$param['idtrans']]);
        redirect($this->obj, 'refresh');
    }
    function gen_detail_penggajian($param) {
        $tt = $this->gen_tunjangan_transport($param['data']);
        $ta = $this->gen_tunjangan_abdi($param['data']);
        $tj = $this->gen_tunjangan_jabatan($param['data']);
        $im = $this->gen_insentif_mengajar($param['data']);
        $jmldp  = $tt+$ta+$tj+$im;
        $this->kas->update($param['data']['IDKAS'],['NOMINALKAS'=>$jmldp]);
    }
    function gen_cicilan_kasbon($param) {
        $this->load->model('cicilan_kasbon_m');
        $this->load->model('kasbon_m');
        $kasbons= $this->kasbon_m->with('kas')->get_sah();
        
        $jmlck=0;
        foreach ($kasbons as $key => $value) {
            $idkb= $value->IDKB;
            $nominalck  = ceil($value->kas->NOMINALKAS/$value->QTYCICILANKB);
            $cicilan[$key]=[
                'IDGAJI'    => $param['data']['IDGAJI'], 
                'IDKB'      => $idkb,
                'NOMINALCK' => $nominalck,
                'STATR'     => 0
            ];
            $jmlck += $nominalck;
        }
        $this->cicilan_kasbon_m->insert_many($cicilan);
        $this->kas->update($param['data']['KAS_IDKAS'],['NOMINALKAS'=>$jmlck]);
    }
    function gen_tunjangan_transport($param) {
        $this->load->model('presensi_harian_m');
        $i = $this->presensi_harian_m->rekap_2($param['BULANGAJI']);
        $jml=0;
        foreach ($i as  $value) {
            $nip=$value->NIP;
            $jumlahhadir=$value->JUMLAHHADIR;
            $kgp = $this->komponen_gaji_pegawai_m->get_by(['NIP'=>$nip, 'IDKG'=>2]);
            if($kgp){
                $data=[
                    'IDKGP'         =>$kgp->IDKGP,
                    'IDGAJI'        =>$param['IDGAJI'],
                    'NIPDP'         =>$nip,
                    'IDKGDP'        =>'2',
                    'GAJISATUANDP'  =>$kgp->GAJISATUAN,
                    'QTYDP'         =>$jumlahhadir,
                    'SUBTOTALDP'    =>$kgp->GAJISATUAN*$jumlahhadir,
                    'STATR'         =>0
                ];
                $this->detail_penggajian_m->insert($data);
                $jml += $data['SUBTOTALDP'];
            }
        }
        return $jml;
    }
    function gen_tunjangan_abdi($param) {
        $this->load->model('pegawai_m');
        $pegawai = $this->pegawai_m->get_all();
        $jml=0;
        foreach ($pegawai as  $value) {
            $nip=$value->NIP;
            $this->check_ta($nip);
            $kgp = $this->komponen_gaji_pegawai_m->get_by(['NIP'=>$nip, 'IDKG'=>3]);
            if($kgp){
                $data=[
                    'IDKGP'         =>$kgp->IDKGP,
                    'IDGAJI'        =>$param['IDGAJI'],
                    'NIPDP'         =>$nip,
                    'IDKGDP'        =>'3',
                    'GAJISATUANDP'  =>$kgp->GAJISATUAN,
                    'QTYDP'         =>1,
                    'SUBTOTALDP'    =>$kgp->GAJISATUAN*1,
                    'STATR'         =>0
                ];
                $this->detail_penggajian_m->insert($data);
                $jml += $data['SUBTOTALDP'];
            }
        }
        return $jml;
    }
    function gen_tunjangan_jabatan($param) {
        //$this->load->model('pegawai_m');
        $pegawai = $this->pegawai_m->get_all();
        $jml=0;
        foreach ($pegawai as  $value) {
            $nip=$value->NIP;
            $this->check_tj($nip);
            $kgp = $this->komponen_gaji_pegawai_m->get_by(['NIP'=>$nip, 'IDKG'=>4]);
            if($kgp){
                $data=[
                    'IDKGP'         =>$kgp->IDKGP,
                    'IDGAJI'        =>$param['IDGAJI'],
                    'NIPDP'         =>$nip,
                    'IDKGDP'        =>'4',
                    'GAJISATUANDP'  =>$kgp->GAJISATUAN,
                    'QTYDP'         =>1,
                    'SUBTOTALDP'    =>$kgp->GAJISATUAN*1,
                    'STATR'         =>0
                ];
                $this->detail_penggajian_m->insert($data);
                $jml += $data['SUBTOTALDP'];
            }
        }
        return $jml;
    }
    function gen_insentif_mengajar($param) {
        $this->load->model('presensi_mengajar_m');
        $pm = $this->presensi_mengajar_m->rekap_per_dosen($param['BULANGAJI']);
        $jml=0;
        foreach ($pm as  $value) {
            $nip=$value->NIP;
            $jumlahhadir=$value->JUMLAHHADIR;
            $kgp = $this->komponen_gaji_pegawai_m->get_by(['NIP'=>$nip, 'IDKG'=>6]);
            if($kgp){
                $data=[
                    'IDKGP'         =>$kgp->IDKGP,
                    'IDGAJI'        =>$param['IDGAJI'],
                    'NIPDP'         =>$nip,
                    'IDKGDP'        =>'4',
                    'GAJISATUANDP'  =>$kgp->GAJISATUAN,
                    'QTYDP'         =>$jumlahhadir,
                    'SUBTOTALDP'    =>$kgp->GAJISATUAN*$jumlahhadir,
                    'STATR'         =>0
                ];
                $this->detail_penggajian_m->insert($data);
                $jml += $data['SUBTOTALDP'];
            }
        }
        return $jml;
    }
    function check_ta($nip) {
        $pegawai    = $this->pegawai_m->with('masa_abdi')->get($nip);
        $tglmasuk   = $pegawai->TGLMASUKP;
        $idma       = $pegawai->IDMA;
        $nominalta  = $pegawai->masa_abdi->NOMINALTA;
        list($tahun_masuk, $bulan_masuk, $tanggal_masuk) = explode("-",$tglmasuk);
        list($tahun_today, $bulan_today, $tanggal_today) = explode("-",date('Y-m-d'));
        $hari_masuk=gregoriantojd($bulan_masuk,$tanggal_masuk,$tahun_masuk);
        $hari_today=gregoriantojd($bulan_today,$tanggal_today,$tahun_today);
        $umur   =$hari_today-$hari_masuk;
        $tahun  =  floor($umur/365);//menghitung usia tahun
        $this->load->model('masa_abdi_m');
        $datama = $this->masa_abdi_m->get_all();
        $i      =count($datama);
        while($tahun < $datama[$i-1]->TAHUNMINMA && $i > 0 ){$i--;}
        $kgp    = $this->komponen_gaji_pegawai_m->get_by(['NIP'=>$nip, 'IDKG'=>3]);
        if($kgp){
            if($idma !== $datama[$i-1]->IDMA || $nominalta !== $kgp->GAJISATUAN){
                $this->pegawai_m->update($nip, ['IDMA'=>$datama[$i-1]->IDMA]);
                $this->komponen_gaji_pegawai_m->update($kgp->IDKGP, ['GAJISATUAN'=>$datama[$i-1]->NOMINALTA]);
            }
        }
    }
    function check_tj($nip) {
        $pegawai    = $this->pegawai_m->with('jabatan')->get($nip);
        $nominaltj  = $pegawai->jabatan->NOMINALTJ;
        $kgp    = $this->komponen_gaji_pegawai_m->get_by(['NIP'=>$nip, 'IDKG'=>4]);
        if($kgp){
            if($nominaltj !== $kgp->GAJISATUAN){
                $this->komponen_gaji_pegawai_m->update($kgp->IDKGP, ['GAJISATUAN'=>$nominaltj]);
            }
        }
    }
}
