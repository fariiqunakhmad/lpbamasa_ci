                                        <div  id="cprint" class="modal-content">    
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Pembayaran Biaya Kuliah</h4>
                                            </div>
                                            <div  class="modal-body">
                                                <div class="col-lg-6">
                                                    <div class="col-lg-12">
                                                        <label class="col-lg-5">No Trans</label>
                                                        : <?php echo $IDPBK;?>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="col-lg-5">NIM</label>
                                                        : <?php echo $NIM;?>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="col-lg-5">Nama</label>
                                                        : <?php echo $NAMAM;?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="col-lg-12">
                                                        <label class="col-lg-5">Tanggal</label>
                                                        : <?php echo $TGLPBK;?>
                                                    </div>    
                                                </div>
                                                
                                                
                                                
                                                
                                                <div class="col-lg-12 form-group">
                                                    <label> Komponen:</label>
                                                    <div class="table-responsive">
                                                        <table 
                                                            class="table table-striped table-bordered table-hover"
                                                            id="<?php echo $table;?>"
                                                            >
                                                            <thead>
                                                                <tr>
                                                                    <th data-halign="center" data-align="center" >No</th>
                                                                    <th data-halign="center">Periode Akademik</th>
                                                                    <th data-halign="center">Nama Komponen</th>
                                                                    <th data-halign="center" data-align="right">Nominal (Rp)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; if(isset($recordskbk)) : foreach($recordskbk as $row) : ?>
                                                                <tr>                                            
                                                                    <td><?php echo $no++; ?></td>
                                                                    <td><?php echo $row->IDPA; ?></td>
                                                                    <td><?php echo $row->kbk->NAMAKBK; ?></td>
                                                                    <td class="right"><?php echo number_format($row->BIAYAKBK,2,',','.'); ?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                                <?php else : ?> 
                                                                <h2>No records were returned.</h2>
                                                                <?php endif; ?>
                                                                <tr>                                            
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><label>Jumlah </label></td>
                                                                    <td><label><?php echo $NOMINALPBK;?></label></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="form-group col-lg-7">
                                                </div>
                                                <div class="form-group col-lg-5">
                                                    <center>
                                                        <p>Petugas </p>
                                                        <p> </p>
                                                        <p> </p>
                                                        <p>(<?php echo $NAMAP;?>)</p>
                                                    </center>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                            
                                            

<script>
    $(document).ready(function() {
        $('#<?php echo $table;?>').bootstrapTable();
    });
</script>
