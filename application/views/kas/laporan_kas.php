<style>
table {
    border-collapse: collapse;
}
td, th {
    padding: 5px;
}
</style>

<table style="width: 1000px;" align="center">
    <tr>
        <td align="center">
            <table border="0" width="98%" style="font-size: 12pt; font-family: sans-serif; ">
                <tr>
                    <td colspan="2" rowspan="3" ><center><img alt="Brand" src="<?php echo base_url(); ?>assets/images/logo.png" height="120" width="120"></center></td>
                    <td colspan="8" style="font-size: 16pt; text-align: center"><b>LEMBAGA PENGAJARAN BAHASA ARAB MASJID AGUNG SUNAN AMPEL </b></td>
                </tr>
<!--                <tr>
                    <td colspan="8" style="font-size: 14pt; text-align: center"><b>MASJID AGUNG SUNAN AMPEL</b></td>
                </tr>-->
                <tr>
                    <td colspan="8" style="font-size: 20pt; text-align: center"><b>(LPBA MASA)</b></td>
                </tr>
                <tr>
                    <td colspan="8" style="font-size: 10pt; text-align: center">Jl. Ampel Masjid 53 Telp/Fax : (031)3520146 Surabaya 60151</td>
                </tr>
                <tr>
                    <td colspan="10"><hr size="2 px"></td>
                </tr>
                <tr>
                    <td colspan="10" style="font-size: 14pt; text-align: center;"><b>Laporan Kas</b></td>
                </tr>
                <tr>
                    <td colspan="10"><center>Periode : <?php echo date('d-m-Y', strtotime($date[0])).' s/d '.date('d-m-Y', strtotime($date[1]));?></center></td>
                </tr>
                <tr>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="5"style="text-align: left;"><b>Debet</b></td>
                    <td colspan="5"style="text-align: right"><b>Kredit</b></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <table width="100%" border="1" style="font-size: inherit; " id="<?php echo $tabled;?>">
                            <thead>
                                <tr>
                                    <th ><center>ID</center></th>
                                    <th colspan="2"><center>Kelompok</center></th>
                                    <th colspan="2"><center>Nominal (Rp)</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(count($records1)>=count($records2)){
                                    $size=count($records1);
                                } else{
                                    $size=count($records2);
                                }
                                $jmld=0;
                                for($i=0; $i<$size; $i++) : ?>
                                <tr class="odd gradeX">
                                    <td><center><?php if(isset($records1[$i]->IDKK)){echo $records1[$i]->IDKK;} ?></center></td>
                                    <td colspan="2"><?php if(isset($records1[$i]->NAMAKK)){echo $records1[$i]->NAMAKK;} ?></td>
                                    <td colspan="2" style="text-align: right"><?php if(isset($records1[$i]->TOTAL)){$jmld+=$records1[$i]->TOTAL;echo number_format($records1[$i]->TOTAL,2,',','.');} ?></td>
                                </tr>
                                <?php endfor; ?>
                                <tr>
                                    <td colspan="3" style="text-align: center; font-weight: normal;"><b>Jumlah </b></td>
                                    <td colspan="2"align="right"><b><?php echo number_format($jmld,2,',','.');?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td colspan="5">
                        <table width="100%" border="1" style="font-size: inherit;" id="<?php echo $tablek;?>">
                            <thead>
                                <tr>
                                    <th ><center>ID</center></th>
                                    <th colspan="2"><center>Kelompok</center></th>
                                    <th colspan="2"><center>Nominal (Rp)</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(count($records1)>=count($records2)){
                                    $size=count($records1);
                                } else{
                                    $size=count($records2);
                                }
                                $jmlk=0;
                                for($i=0; $i<$size; $i++) : ?>
                                <tr class="odd gradeX">
                                    <td><center><?php if(isset($records2[$i]->IDKK)){echo $records2[$i]->IDKK;} else{echo '&nbsp;';}?></center></td>
                                    <td colspan="2"><?php if(isset($records2[$i]->NAMAKK)){echo $records2[$i]->NAMAKK;} ?></td>
                                    <td colspan="2" style="text-align: right"><?php if(isset($records2[$i]->TOTAL)){$jmlk+=$records2[$i]->TOTAL; echo number_format($records2[$i]->TOTAL,2,',','.');} ?></td>
                                </tr>
                                <?php endfor; ?>
                                <tr>
                                    <td colspan="3" style="text-align: center; font-weight: normal;"><b>Jumlah </b></td>
                                    <td colspan="2" align="right"><b><?php echo number_format($jmlk,2,',','.');?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: center;"><b>Saldo = Rp <?php echo number_format($jmld-$jmlk,2,',','.')?></b></td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <td colspan="7" ><br></td>
                    <td colspan="3" >
                        <center>
                            Surabaya, <?php echo date('d-m-Y');?>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="70%"><br></td>
                    <td colspan="3" width="30%">
                        <center>
                            Wakil Direktur<br>
                            Bidang Keuangan dan SDM,
                            <br>
                            <br>
                            <br>
                            <br>
                            <p>( <?php echo $username;?> )</p>
                             <?php echo $userid;?>
                        </center>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
</table>

<script  type="text/javascript">
    window.onload =function (){
        window.print();
        window.location='<?php echo base_url(); ?>kas/load_form_laporan';
    };
    
</script>
