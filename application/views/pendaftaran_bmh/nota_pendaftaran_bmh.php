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
                    <td colspan="10"><center><?php if($nota->STATR==1 )echo 'Pembatalan ';?>Pembayaran Biaya BMH</center></td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <td colspan="2" width="20%">No Trans</td>
                    <td colspan="3" width="30%">: <?php echo $nota->IDDAFTARBMH;?></td>
                    <td colspan="2" width="20%">Tanggal</td>
                    <td colspan="3" width="30%">: <?php echo date("d-m-Y", strtotime($nota->kas->TGLKAS));?></td>
                </tr>
                <tr>
                    <td colspan="2">Peserta</td>
                    <td colspan="8">: <?php echo $nota->IDPBMH.' '.$nota->peserta_bmh->NAMAPBMH;?></td>
                </tr>
                <tr>
                    <td colspan="2">Alamat</td>
                    <td colspan="8">: <?php echo $nota->peserta_bmh->ALAMATPBMH;?></td>
                </tr>
                <tr>
                    <td colspan="2">Periode BMH </td>
                    <td colspan="8">: <?php echo $nota->IDBMH;?></td>
                </tr>
                <tr>
                    <td colspan="2">Biaya </td>
                    <td colspan="8">: <?php echo 'Rp '.number_format($nota->kas->NOMINALKAS,2,',','.');?></td>
                </tr>
                <tr>
                    <?php if($nota->STATR==1){?>
                    <td colspan="3">
                        <center>
                            <p>Peserta,</p>
                            <br>
                            <br>
                            <p>( <?php echo $nota->peserta_bmh->NAMAPBMH;?> )</p>
                             <?php echo $nota->IDPBMH;?>
                        </center>
                    </td>
                    <td colspan="4"><br></td>
                    <?php } else {?>
                    <td colspan="7"><br></td>
                    <?php }?>
                    <td colspan="3">
                        <center>
                            <p>Petugas,</p>
                            <br>
                            <br>
                            <p>( <?php echo $username;?> )</p>
                            <p><?php echo $userid;?></p>
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
        window.location='<?php echo base_url(); ?>pendaftaran_bmh';
    };
    
</script>
