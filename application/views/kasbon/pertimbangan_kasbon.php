                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Pertimbangan Kasbon</h4>
                                    </div>
                                    <div class="modal-body">
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
                                            <div class="col-lg-9">: <?php echo 'Rp '.number_format($trans->kas->NOMINALKAS,2,',','.').' dicicil '.$trans->QTYCICILANKB.' kali @ Rp '.number_format($trans->kas->NOMINALKAS/$trans->QTYCICILANKB,2,',','.');?></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="col-lg-3">Gaji kotor terakhir</label>
                                            <div class="col-lg-9">: <?php echo 'Rp '.number_format($last_gaji[0]->NOMINAL,2,',','.').' pada periode '.substr($last_gaji[0]->IDGAJI, 6, 2).' - '.substr($last_gaji[0]->IDGAJI, 2, 4);?></div>
                                        </div> 
                                        <div class="col-lg-12">
                                            <label class="col-lg-12"> Tanggungan Kasbon:</label>
                                            <div class="table-responsive col-lg-12">
                                                <table 
                                                    class="table table-striped table-bordered table-hover"
                                                    id="<?php echo $table;?>"
                                                    >
                                                    <thead>
                                                        <tr>
                                                            <th data-halign="center" data-align="center" >No</th>
                                                            <th data-halign="center">Kasbon</th>
                                                            <th data-halign="center" data-align="right">Nominal</th>
                                                            <th data-halign="center" data-align="right">Cicilan</th>
                                                            <th data-halign="center" data-align="right">Nominal Cicilan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1; $jml=0; if(isset($tanggungan)) : foreach($tanggungan as $row) : ?>
                                                        <tr>                                            
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $row->IDKB; ?></td>
                                                            <td class="right"><?php echo '<div class="pull-left">Rp </div>'.number_format($row->kas->NOMINALKAS,2,',','.'); ?></td>
                                                            <td class="right"><?php echo $row->QTYCICILANKB.' kali'; ?></td>
                                                            <td class="right"><?php $jml+=$row->kas->NOMINALKAS/$row->QTYCICILANKB; echo '<div class="pull-left">Rp </div>'.number_format($row->kas->NOMINALKAS/$row->QTYCICILANKB,2,',','.'); ?></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                        <?php else : ?> 
                                                        <h2>No records were returned.</h2>
                                                        <?php endif; ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" class="text-center"><b>Jumlah </b></td>
                                                            <td><b><?php echo '<div class="pull-left">Rp </div><div class="pull-right">'.number_format($jml,2,',','.').'</div>';?></b></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php
                                        if($trans->kas->NIP==NULL && $trans->kas->STATR==0){
                                            echo ' <a href="'.$this->uri->slash_segment(1).'load_form/'.$trans->IDKB.'" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>';
                                            if($useras['id']==1){
                                                echo ' <a href="'.$this->uri->slash_segment(1).'reject_app/'.$trans->IDKB.'" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Tolak</a>';
                                                echo ' <a href="'.$this->uri->slash_segment(1).'accept/'.$trans->IDKB.'" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> Setujui</a>';
                                            }
                                        }
                                        ?>
                                    </div>   
                                                
                                                
<script>
    $(document).ready(function() {
        $('#<?php echo $table;?>').bootstrapTable();
    });
</script>
