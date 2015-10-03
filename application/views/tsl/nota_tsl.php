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
                    <td colspan="10">
                        <center>
                            <?php
                            if($nota->kas->DKKAS==1){
                                if($nota->STATR==0){
                                    echo 'Pemasukan';
                                }else {
                                    echo 'Pembatalan Pemasukan';
                                }
                            } else{
                                if($nota->STATR==0){
                                    echo 'Pengeluaran';
                                }else {
                                    echo 'Pembatalan Pegeluaran';
                                }
                            }
                            ?>
                            Sektor Lain
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <td colspan="2" >No Trans</td>
                    <td colspan="3" >: <?php echo $nota->IDTSL;?></td>
                    <td colspan="2" >Tanggal</td>
                    <td colspan="3" >: <?php echo date("d-m-Y", strtotime($nota->kas->TGLKAS));?></td>
                </tr>
                <tr>
                    <td colspan="2">Kelompok</td>
                    <td colspan="8">: <?php echo $nota->kas->kk->NAMAKK;?></td>
                </tr>
                <tr>
                    <td colspan="2">Uraian</td>
                    <td colspan="8">: <?php echo $nota->URAIANTSL;?></td>
                </tr>
                <tr>
                    <td colspan="2">Nominal </td>
                    <td colspan="8">: <?php echo 'Rp '.number_format($nota->kas->NOMINALKAS,2,',','.');?></td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <?php
                        if($nota->STATR==0){
                            if ($nota->kas->DKKAS==1) {
                                echo 
                                "<td colspan='7'>
                                 <td colspan='3'>
                                    <center>
                                        <p>Petugas,</p>
                                        <br>
                                        <br>
                                        <p>( $username )</p>
                                        <p> $userid </p>
                                    </center>
                                </td>";
                            } else {
                                echo 
                                "<td colspan='3'>
                                    <center>
                                        <p>Penerima,</p>
                                        <br>
                                        <br>
                                        <p>( &emsp;&emsp;&emsp;&emsp;&emsp; )</p>
                                        <p><br></p>
                                    </center>
                                </td>
                                <td colspan='4'>
                                <td colspan='3'>
                                    <center>
                                        <p>Petugas,</p>
                                        <br>
                                        <br>
                                        <p>( $username )</p>
                                        <p> $userid </p>
                                    </center>
                                </td>";
                            }
                        }else {
                            if($nota->kas->DKKAS==1){
                                echo 
                                "<td colspan='3'>
                                    <center>
                                        <p>Penerima,</p>
                                        <br>
                                        <br>
                                        <p>( &emsp;&emsp;&emsp;&emsp;&emsp; )</p>
                                        <p><br></p>
                                    </center>
                                </td>
                                <td colspan='4'>
                                <td colspan='3'>
                                    <center>
                                        <p>Petugas,</p>
                                        <br>
                                        <br>
                                        <p>( $username )</p>
                                        <p> $userid </p>
                                    </center>
                                </td>";
                            }else{
                                echo 
                                "<td colspan='3'>
                                    <center>
                                        <p>Wadir Bid Adm,</p>
                                        <br>
                                        <br>
                                        <p>( &emsp;&emsp;&emsp;&emsp;&emsp; )</p>
                                        <p><br></p>
                                    </center>
                                </td>
                                <td colspan='4'>
                                <td colspan='3'>
                                    <center>
                                        <p>Petugas,</p>
                                        <br>
                                        <br>
                                        <p>( $username )</p>
                                        <p> $userid </p>
                                    </center>
                                </td>";
                            }
                        }
                    
                    ?>
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
        window.location='<?php echo base_url(); ?>tsl';
    };
</script>