                                        
                                                <div class="col-lg-12">
                                                    <div class="col-lg-12">
                                                        <label class="col-lg-3">No Trans</label>
                                                        <div class="col-lg-4">: <?php echo $trans->IDKB;?></div>
                                                        <label class="col-lg-2">Tanggal</label>
                                                        <div class="col-lg-3">: <?php echo $trans->kas->TGLKAS;?></div>
                                                    </div> 
                                                    <div class="col-lg-12">
                                                        <label class="col-lg-3">NIP</label>
                                                        <div class="col-lg-9">: <?php echo $trans->NIP;?></div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="col-lg-3">Nama</label>
                                                        <div class="col-lg-9">: <?php echo $trans->pegawai->NAMAP;?></div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="col-lg-3">Keterangan</label>
                                                        <div class="col-lg-9">: <?php echo $trans->KETERANGANKB;?></div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="col-lg-3">Nominal</label>
                                                        <div class="col-lg-9">: <?php echo 'Rp '.number_format($trans->kas->NOMINALKAS,2,',','.').' dicicil '.$trans->QTYCICILANKB.' kali';?></div>
                                                    </div>   
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <label> Cicilan:</label>
                                                    <div class="table-responsive">
                                                        <table 
                                                            class="table table-striped table-bordered table-hover"
                                                            id="<?php echo $table;?>"
                                                            >
                                                            <thead>
                                                                <tr>
                                                                    <th data-halign="center" data-align="center" >No</th>
                                                                    <th data-halign="center">Periode Penggajian</th>
                                                                    <th data-halign="center" data-align="right">Nominal (Rp)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; $jml=0; if(isset($recordsck)) : foreach($recordsck as $row) : ?>
                                                                <tr>                                            
                                                                    <td><?php echo $no++; ?></td>
                                                                    <td><?php echo $row->IDGAJI; ?></td>
                                                                    <td class="right"><?php $jml+=$row->NOMINALCK; echo number_format($row->NOMINALCK,2,',','.'); ?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                                <?php else : ?> 
                                                                <h2>No records were returned.</h2>
                                                                <?php endif; ?>
                                                                <tr>                                            
                                                                    <td></td>
                                                                    <td><label>Jumlah </label></td>
                                                                    <td><label><?php echo $jml;?></label></td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <center>
                                                        <p>Status Kelunasan </p>
                                                        <p style="font-weight: bold">
                                                            <?php 
                                                            switch ($trans->STATKB) {
                                                                case 0:
                                                                    echo 'Belum Lunas';
                                                                    break;
                                                                case 1:
                                                                    echo 'Lunas';
                                                                    break;
                                                                default:
                                                                    break;
                                                            }
                                                            ?>
                                                        </p>
                                                    </center>
                                                    
                                                </div>
<script>
    $(document).ready(function() {
        $('#<?php echo $table;?>').bootstrapTable();
    });
</script>
