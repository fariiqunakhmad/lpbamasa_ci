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
                    <td colspan="10"><center><?php if($nota->STATR==0)echo 'Pencairan Dana'; else echo 'Pembatalan';?> Penggajian</center></td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <td colspan="2" >No Trans</td>
                    <td colspan="3" >: <?php echo $nota->IDGAJI;?></td>
                    <td colspan="2" >Tanggal</td>
                    <td colspan="3" >: <?php echo date("d-m-Y", strtotime($nota->kas1->TGLKAS));?></td>
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
                    <td colspan="2">Periode</td>
                    <td colspan="8">: <?php echo $nota->BULANGAJI;?></td>
                </tr>
                <tr>
                    <td colspan="6">Jumlah Penggajian </td>
                    <td colspan="1">Rp </td>
                    <td colspan="3" style="text-align: right;"><?php echo number_format($nota->kas1->NOMINALKAS,2,',','.');?></td>
                </tr>
                <tr>
                    <td colspan="6">Jumlah Cicilan Kasbon</td>
                    <td colspan="1">Rp </td>
                    <td colspan="3" style="text-align: right;"><?php echo number_format($nota->kas2->NOMINALKAS,2,',','.');?></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td colspan="4"><hr size="1 px"></td>
                </tr>
                <tr>
                    <td colspan="6">Nominal </td>
                    <td colspan="1">Rp </td>
                    <td colspan="3" style="text-align: right;"><?php echo number_format($nota->kas1->NOMINALKAS-$nota->kas2->NOMINALKAS,2,',','.');?></td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <center>
                            <p>Petugas,</p>
                            <br>
                            <br>
                            <p>( <?php echo $nota->pegawai->NAMAP;?> )</p>
                            <p> <?php echo $nota->NIP;?> </p>
                        </center>
                    </td>
                    <td colspan="2"><br></td>
                    <td colspan="4">
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
        window.location='<?php echo base_url(); ?>penggajian';
    };
    
</script>