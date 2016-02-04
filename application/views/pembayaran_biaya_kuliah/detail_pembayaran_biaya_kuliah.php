                                                <div class="col-lg-2">No Trans</div>
                                                <div class="col-lg-4">: <?php echo $trans->IDPBK;?></div>
                                                <div class="col-lg-2">Tanggal</div>
                                                <div class="col-lg-4">: <?php echo $trans->kas->TGLKAS;?></div>
                                                <div class="col-lg-2">Mahasiswa</div>
                                                <div class="col-lg-4">: <?php echo $trans->NIM.' '.$trans->mahasiswa->NAMAM;?></div>
                                                <div class="col-lg-2">Petugas</div>
                                                <div class="col-lg-4">: <?php echo $trans->NIP.' '.$trans->pegawai->NAMAP;?></div>
                                                <?php
                                                if($useras['id']!=4){
                                                ?>
                                                <div class="col-lg-2">Status</div>
                                                <div class="col-lg-4">:
                                                    <?php
                                                    if($trans->STATR==0){
                                                        if(isset($trans->kas->NIP)){
                                                            echo 'Sah, Terverifikasi';
                                                        } else{
                                                            echo 'Sah, Belum Terverifikasi';
                                                        }
                                                    } else{
                                                        if(isset($trans->kas->NIP) && $trans->kas->STATR==1){
                                                            echo 'Batal, Terverifikasi';
                                                        }else{
                                                            echo 'Batal, Belum Terverifikasi';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <?php 
                                                    if(isset($trans->kas->NIP)){
                                                ?>
                                                <div class="col-lg-2">Wadir</div>
                                                <div class="col-lg-4">: <?php echo $trans->kas->NIP.' '.$trans->kas->pegawai->NAMAP;?></div>
                                                <?php 
                                                    } else {
                                                        echo '<div class="col-lg-6">&emsp;</div>';
                                                    }
                                                }
                                                ?>
                                                <div class="col-lg-2">Komponen</div>
                                                <div class="col-lg-10">:</div>
                                                <div class="col-lg-12">
                                                    <div class="table-responsive">
                                                        <table 
                                                            class="table table-bordered"
                                                            id="<?php echo $table;?>"
                                                            data-toggle="table"
                                                            >
                                                            <thead>
                                                                <tr>
                                                                    <th data-halign="center" data-align="center" >No</th>
                                                                    <th data-halign="center">Periode Akademik</th>
                                                                    <th data-halign="center">Nama Komponen</th>
                                                                    <th data-halign="center" data-align="right">Nominal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; if(isset($recordskpbk)) : foreach($recordskpbk as $row) : ?>
                                                                <tr>                                            
                                                                    <td><?php echo $no++; ?></td>
                                                                    <td><?php echo $row->kewajiban_biaya_kuliah->IDPA; ?></td>
                                                                    <td><?php echo $row->kewajiban_biaya_kuliah->kbk->NAMAKBK; ?></td>
                                                                    <td class="right"><?php echo '<div class="pull-left">Rp </div>'.number_format($row->kewajiban_biaya_kuliah->BIAYAKBK,2,',','.'); ?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                                <?php else : ?> 
                                                                <h2>No records were returned.</h2>
                                                                <?php endif; ?>
                                                                <tr>                                            
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><label>Jumlah </label></td>
                                                                    <td><b><?php echo '<div class="pull-left">Rp </div>'.number_format($trans->kas->NOMINALKAS,2,',','.');?></b></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <script>
                                                        $(document).ready(function() {
                                                                $('#<?php echo $table;?>').bootstrapTable();
                                                        });
                                                </script>
