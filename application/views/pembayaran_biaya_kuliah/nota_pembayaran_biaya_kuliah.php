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
                            <?php if($recordpbk->STATR==1 )echo 'Pembatalan ';?>Pembayaran Biaya Kuliah
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <tr>
                    <td colspan="2" width="20%">No Trans</td>
                    <td colspan="3" width="35%">: <?php echo $recordpbk->IDPBK;?></td>
                    <td colspan="2" width="20%">Tanggal</td>
                    <td colspan="3" width="25%">: <?php echo date("d-m-Y", strtotime($recordpbk->kas->TGLKAS));?></td>
                </tr>
                <tr>
                    <td colspan="2">NIM</td>
                    <td colspan="8">: <?php echo $recordpbk->NIM;?></td>
                </tr>
                <tr>
                    <td colspan="2">Nama</td>
                    <td colspan="8">: <?php echo $recordpbk->mahasiswa->NAMAM;?></td>
                </tr>
                <tr>
                    <td colspan="2">Komponen</td>
                    <td colspan="8">:</td>
                </tr>
                <tr>
                    <td colspan="10" >
                        <center>
                            <table width="100%" border="1" style="font-size: 8pt;"
                                id="<?php echo $table1;?>"
                                >
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Periode Akademik</th>
                                        <th >Nama Komponen</th>
                                        <th >Nominal (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; if(isset($recordskbk)) : foreach($recordskbk as $row) : ?>
                                    <tr>                                            
                                        <td align="center"><?php echo $no++; ?></td>
                                        <td><?php echo $row->kewajiban_biaya_kuliah->IDPA; ?></td>
                                        <td><?php echo $row->kewajiban_biaya_kuliah->kbk->NAMAKBK; ?></td>
                                        <td style="text-align: right;"><?php echo number_format($row->kewajiban_biaya_kuliah->BIAYAKBK,2,',','.'); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else : ?> 
                                    <h2>No records were returned.</h2>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="3" style="text-align: center; font-weight: normal;"><label>Jumlah </label></td>
                                        <td align="right"><label><?php echo number_format($recordpbk->kas->NOMINALKAS,2,',','.');?></label></td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </td>
                </tr>
                <tr>
                    <?php if($recordpbk->STATR==1){?>
                    <td colspan="3">
                        <center>
                            <p>Mahasiswa,</p>
                            <br>
                            <br>
                            <p>( <?php echo $recordpbk->mahasiswa->NAMAM;?> )</p>
                             <?php echo $recordpbk->NIM;?>
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
                             <?php echo $userid;?>
                        </center>
                    </td>
                </tr>
                <?php if($recordpbk->STATR==0 ){?>
                <tr>
                    <td colspan="10">NB:</td>
                </tr>
                <tr>
                    <td colspan="10">Kewajiban biaya kuliah yang belum dibayar per <?php echo date("d-m-Y");?>:</td>
                </tr>
                <tr>
                    <td colspan="10" >
                        <center>
                            <table width="100%" border="1" style="font-size: 8pt;"
                                id="<?php echo $table2;?>"
                                >
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Periode Akademik</th>
                                        <th >Nama Komponen</th>
                                        <th >Nominal (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=1;?> 
                                    <?php $jml=0; ?> 
                                    <?php if(isset($recordskbkbl)) : ?> 
                                    <?php    foreach($recordskbkbl as $row) :?> 
                                    <?php        $jml+=$row->BIAYAKBK; ?>
                                    <tr>                                            
                                        <td align="center"><?php echo $n++; ?></td>
                                        <td><?php echo $row->IDPA; ?></td>
                                        <td><?php echo $row->kbk->NAMAKBK; ?></td>
                                        <td style="text-align: right;"><?php echo number_format($row->BIAYAKBK,2,',','.'); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else : ?> 
                                    <h2>No records were returned.</h2>
                                    <?php endif; ?>
                                    <tr>
                                        <td align="center" style="font-style: " colspan="3">Jumlah </td>
                                        <td align="right"><?php echo number_format($jml,2,',','.');?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"><br></td>
                </tr>
                <?php }?>
            </table>
        </td>
    </tr>
</table>
<script  type="text/javascript">
    window.onload =function (){
        window.print();
        window.location='<?php echo base_url(); ?>pembayaran_biaya_kuliah';
    };
</script>

