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
//    public function __construct() {
//        parent::__construct();
//        
//        
//    }
    function index() {
//        if(can_access($this->obj)){
            parent::index();
            array_push($this->view['js'], 'assets/js/modul/penggajian.js');
            $this->data['records']= $this->mdl->get_all();
            $this->page->view($this->view, $this->data);
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
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
    function insert() {
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
        if ($kasbons){
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
            $this->check_kb_state($param['data']['IDGAJI']);
        }
        
    }
    function gen_tunjangan_transport($param) {
        
//        $param['BULANGAJI']='2015-10';
        $this->load->model('presensi_harian_m');
//        $i = $this->presensi_harian_m->rekap($param['BULANGAJI']);
        $this->load->model('presensi_mengajar_m');
        $p = $this->presensi_harian_m->as_array()->get_data_for_ta($param['BULANGAJI']);
        $pa = $this->presensi_mengajar_m->as_array()->get_data_for_ta($param['BULANGAJI']);
        foreach ($pa as $value) {
            $state=FALSE;
            foreach ($p as $value1) {
                if($value['NIP']==$value1['NIP'] & $value['TGL']==$value1['TGL']){
                    $state=TRUE;
                }
            }
            if(!$state){
                array_push($p, $value);
            }
        }
        $rekap=[];
        foreach ($p as $v) {
            if(count($rekap)>0){
                foreach ($rekap as $key => $value) {
                    if ($v['NIP']==$key) {
                        $rekap[$v['NIP']]+=1;
                    } elseif (!isset($rekap[$v['NIP']])) {
                        $rekap[$v['NIP']]=1;
                    }
                }
            } else {
                $rekap[$v['NIP']]=1;
            }
        }
//        print_r($p);
//        print '<br>';
//        print_r($rekap);
        
        $jml=0;
//        foreach ($i as  $value) {
//            $nip=$value->NIP;
//            $jumlahhadir=$value->JUMLAHHADIR;
        foreach ($rekap as $key => $value) {
            $nip=$key;
            $jumlahhadir=$value;
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
                    'IDKGDP'        =>'6',
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
    function komponen_penggajian($idtrans) {
        $this->load->model('detail_penggajian_m');
        $this->data['recordskg']   = $this->detail_penggajian_m->get_pegawai($idtrans);//with_deleted()->get_many_by('IDGAJI',$idtrans);
        $this->data['table']        = 'detail_'.$this->obj.$idtrans;
        $this->load->view($this->obj.'/komponen_penggajian', $this->data);
    }
    function komponen_cicilan_kasbon($idtrans) {
        $this->load->model('cicilan_kasbon_m');
        $this->data['recordsck']    = $this->cicilan_kasbon_m->get_pegawai($idtrans);
        $this->data['table']        = 'ck_'.$this->obj.$idtrans;
        $this->load->view($this->obj.'/komponen_cicilan_kasbon', $this->data);
    }
    function detail_gaji_pegawai($idgaji, $nip) {
        $this->load->model('detail_penggajian_m');
        $this->data['recordskgp']   = $this->detail_penggajian_m->with('kg')->with_deleted()->get_many_by(['IDGAJI'=>$idgaji, 'NIPDP'=>$nip]);
        $this->data['table']        = 'detail_'.$this->obj.$idgaji.$nip;
        $this->load->view($this->obj.'/komponen_penggajian_pegawai', $this->data);
    }
    function detail_cicilan_kasbon_pegawai($idgaji, $nip) {
        $this->load->model('cicilan_kasbon_m');
        $this->data['recordsckp']   = $this->cicilan_kasbon_m->with_deleted()->get_many_by_nip($idgaji, $nip);
        $this->data['table']        = 'detail_ck_'.$this->obj.$idgaji.$nip;
        $this->load->view($this->obj.'/komponen_cicilan_kasbon_pegawai', $this->data);
    }
    function accept($idtrans) {
//        if(can_access($this->obj.'/'.$this->uri->segment(2))){
            $data['NIP']    = $this->data['userid'];
            $trans=$this->mdl->get($idtrans);
            $idkas1 = $trans->IDKAS;
            $idkas2 = $trans->KAS_IDKAS;
            $this->kas->update_many([$idkas1, $idkas2], $data);
            redirect($this->obj.'/nota/'.$idtrans, 'refresh');
//        } else {
//            show_error("Mohon maaf, peran anda tidak diizinkan untuk mengakses fungsi ini..");	
//        }
    }
    function delete($idtrans) {
        $gaji=$this->mdl->get($idtrans);
        $this->mdl->delete($idtrans);
        $this->kas->delete_by('REFKAS',$idtrans);
        $this->load->model('detail_penggajian_m');
        $this->load->model('cicilan_kasbon_m');
        $this->detail_penggajian_m->delete_by('IDGAJI', $idtrans);
        $this->cicilan_kasbon_m->delete_by('IDGAJI', $idtrans);
        $this->check_kb_state($idtrans);
        if($gaji->kas2->NIP== NULL){
            redirect($this->obj, 'refresh');
        }else{
            redirect($this->obj.'/nota/'.$idtrans, 'refresh');
        }
    }
    function slip($idtrans) {
        $this->load->model('pegawai_m');
        $this->load->model('detail_penggajian_m');
        $this->load->model('cicilan_kasbon_m');
        $this->data['pegawai']  = $this->pegawai_m->get_all();
        $this->data['gaji']     = $this->mdl->get($idtrans);
        foreach ($this->data['pegawai'] as $value) {
            $this->data['dp'][$value->NIP]= $this->detail_penggajian_m->with('kg')->get_many_by(['IDGAJI'=>$idtrans, 'NIPDP'=>$value->NIP]);
            $this->data['ck'][$value->NIP]= $this->cicilan_kasbon_m->get_many_by_nip($idtrans, $value->NIP);
        }
        $this->load->view($this->obj.'/slip_'.$this->obj, $this->data);
    }
    function check_kb_state($idgaji) {
        $this->load->model('cicilan_kasbon_m');
        $this->load->model('kasbon_m');
        $cicilankasbons= $this->cicilan_kasbon_m->get_sum($idgaji);
        foreach ($cicilankasbons as $ck) {
            $kb= $this->kasbon_m->with('kas')->get($ck->IDKB);
            if($ck->JUMLAH >= $kb->kas->NOMINALKAS){
                $this->kasbon_m->update($kb->IDKB,['STATKB'=>1]);
            } else{
                $this->kasbon_m->update($kb->IDKB,['STATKB'=>0]);

            }
        }
    }

}
