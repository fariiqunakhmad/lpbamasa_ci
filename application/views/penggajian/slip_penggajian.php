<style>
table {
    border-collapse: collapse;
}
</style>
<?php foreach($pegawai as $peg) : ?>
    <table style="width: 302;" align="center">
        <tr><td>&nbsp;</td></tr>
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
                        <td colspan="10"><center>Slip Gaji</center></td>
                    </tr>
                    <tr>
                        <td colspan="10"><br></td>
                    </tr>
                    <tr>
                        <td colspan="2" width="20%">NIP</td>
                        <td colspan="3" width="35%">: <?php echo $peg->NIP;?></td>
                        <td colspan="2" width="20%">Tanggal</td>
                        <td colspan="3" width="25%">: <?php echo date("d-m-Y");?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Nama</td>
                        <td colspan="8">: <?php echo $peg->NAMAP;?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Periode</td>
                        <td colspan="8">: <?php echo $gaji->BULANGAJI;?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Komponen</td>
                        <td colspan="8">:</td>
                    </tr>
                    <tr>
                        <td colspan="10" >
                            <center>
                                <table width="100%" border="1" style="font-size: 8pt;">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th >Komponen</th>
                                            <th >Gaji Satuan (Rp)</th>
                                            <th >Qty</th>
                                            <th >Sub Total (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        $jml=0;
                                        if(isset($dp[$peg->NIP])) :
                                            foreach($dp[$peg->NIP] as $komponen) : 
                                        ?>
                                        <tr>                                            
                                            <td align="center"><?php echo $no++; ?></td>
                                            <td><?php echo $komponen->kg->NAMAKG; ?></td>
                                            <td style="text-align: right;"><?php echo number_format($komponen->GAJISATUANDP,2,',','.');?></td>
                                            <td><?php echo $komponen->QTYDP; ?></td>
                                            <td style="text-align: right;"><?php echo number_format($komponen->SUBTOTALDP,2,',','.'); $jml+=$komponen->SUBTOTALDP;?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php
                                        if(isset($ck[$peg->NIP])) :
                                            foreach($ck[$peg->NIP] as $komponen) : 
                                        ?>
                                        <tr>                                            
                                            <td align="center"><?php echo $no++; ?></td>
                                            <td><?php echo $komponen->IDKB; ?></td>
                                            <td style="text-align: right;"><?php echo number_format($komponen->NOMINALCK,2,',','.');?></td>
                                            <td><?php echo 1; ?></td>
                                            <td style="text-align: right;"><?php echo number_format(-$komponen->NOMINALCK,2,',','.'); $jml-=$komponen->NOMINALCK;?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center; font-weight: normal;"><label>Jumlah </label></td>
                                            <td align="right"><label><?php echo number_format($jml,2,',','.');?></label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7"><br></td>
                        <td colspan="3">
                            <center>
                                <p>Petugas,</p>
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
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><div style="border-bottom: 1px dashed ;"></div></td>
        </tr>
    </table>
<?php endforeach; ?>

<script  type="text/javascript">
    window.onload =function (){
        window.print();
        window.location='<?php echo base_url(); ?>penggajian';
    };
</script>

