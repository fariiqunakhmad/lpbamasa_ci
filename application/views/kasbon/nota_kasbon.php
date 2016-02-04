<style>
table {
    border-collapse: collapse;
}
</style>

<table style="width: 302;" align="center">
    <tr>
        <td align="center">
            <table border="0" width="98%" style="font-size: 8pt; font-family: sans-serif;">
                <tr>
                    <td colspan="2" rowspan="4"><center><img alt="Brand" src="<?php echo base_url(); ?>assets/images/logo.png" height="60" width="60"></center></td>
                    <td colspan="8"><center>LEMBAGA PENGAJARAN BAHASA ARAB</center></td>
                </tr>
                <tr>
                    <td colspan="8"><center>MASJID AGUNG SUNAN AMPEL</center></td>
                </tr>
                <tr>
                    <td colspan="8"><center>(LPBA MASA)</center></td>
                </tr>
                <tr>
                    <td colspan="8" style="font-size: 6pt;"><center>Jl. Ampel Masjid 53 Telp/Fax : (031)3520146 Surabaya 60151</center></td>
                </tr>
                <tr>
                    <td colspan="10"><hr size="2 px"></td>
                </tr>
                <tr>
                    <td colspan="10"><center>Bukti Transaksi</center></td>
                </tr>
                <tr>
                    <td colspan="10"><center><?php if($nota->STATR==0)echo 'Pencairan'; else echo 'Pembatalan';?> Kasbon</center></td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <td colspan="2" >No Trans</td>
                    <td colspan="3" >: <?php echo $nota->IDKB;?></td>
                    <td colspan="2" >Tanggal</td>
                    <td colspan="3" >: <?php echo date("d-m-Y", strtotime($nota->kas->TGLKAS));?></td>
                </tr>
                <tr>
                    <td colspan="2">NIP</td>
                    <td colspan="8">: <?php echo $nota->NIP;?></td>
                </tr>
                <tr>
                    <td colspan="2">Nama</td>
                    <td colspan="8">: <?php echo $nota->pegawai->NAMAP;?></td>
                </tr>
                <tr>
                    <td colspan="2">Keterangan</td>
                    <td colspan="8">: <?php echo $nota->KETERANGANKB;?></td>
                </tr>
                <tr>
                    <td colspan="2">Nominal </td>
                    <td colspan="8">: <?php echo 'Rp '.number_format($nota->kas->NOMINALKAS,2,',','.').', dicicil '.$nota->QTYCICILANKB.' kali penggajian.';?></td>
                </tr>
                <?php
                if($nota->STATR!=0 && $cicilan!=NULL){
                    $jumlahcicilan=0;
                    $n=0;
                    foreach ($cicilan as $value) {
                        $jumlahcicilan+=$value->NOMINALCK;
                        $n++;
                    }
                ?>
                <tr>
                    <td colspan="2">Cicilan </td>
                    <td colspan="8">: <?php echo 'Rp '.number_format($jumlahcicilan,2,',','.').', dari '.$n.' cicilan @ Rp '.number_format($jumlahcicilan/$n,2,',','.');?></td>
                </tr>
                <tr>
                    <td colspan="2">Jumlah </td>
                    <td colspan="8">: <?php echo 'Rp '.number_format($nota->kas->NOMINALKAS-$jumlahcicilan,2,',','.');?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <center>
                            <p>Pemohon,</p>
                            <br>
                            <br>
                            <p>( <?php echo $nota->pegawai->NAMAP;?> )</p>
                            <p> <?php echo $nota->NIP;?> </p>
                        </center>
                    </td>
                    <td colspan="4"><br></td>
                    <td colspan="3">
                        <center>
                            <p>Wadir Bid Keu & SDM,</p>
                            <br>
                            <br>
                            <p>( <?php echo $username;?> )</p>
                            <p> <?php echo $userid;?> </p>
                        </center>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="10"><br></td>
                </tr>
            </table>
        </td>
    </tr>
    
</table>

<script  type="text/javascript">
    window.onload =function (){
        window.print();
        window.location='<?php echo base_url(); ?>kasbon';
    };
    
</script>