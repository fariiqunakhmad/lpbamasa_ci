

                            <div class="table-responsive">
                                <table border='1'
                                       class="table table-bordered table-hover" 
                                       id="<?php echo $table;?>">
                                    <font size="1">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"><center><font size="1">No.</font></center></th>
                                            <th rowspan="2"><center><font size="1">NIP/Nama</font></center></th>
                                            <th colspan="<?php echo count($dates);?>"><center><font size="1">Tanggal</font></center></th> 
                                        </tr>
                                        <tr>
                                            <?php if(isset($dates)) : foreach($dates as $date) : ?>
                                            <th><font size="1"><?php echo substr($date->TGLHK, 8); ?></font></th>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($pegawai)) : foreach($pegawai as $peg) : ?>
                                        <tr>
                                            <td><font size="1"><?php echo $no++; ?></font></td>
                                            <td><font size="1"><?php echo $peg->NIP.' '.$peg->NAMAP; ?></font></td>
                                            <?php if(isset($dates)) : foreach($dates as $date) : ?>
                                            <td>
                                                <font size="1">
                                                <?php 
                                                foreach ($detail as $key => $value) {
                                                    if($value->NIP==$peg->NIP && $value->TGLHK==$date->TGLHK){
                                                        echo $value->KETPH;
                                                    }
                                                }
                                                ?>  
                                                </font>
                                            </td>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                                    
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"><font size="1">Form presensi</font></td>
                                            <?php if(isset($dates)) : foreach($dates as $date) : ?>
                                            <td>
                                                <a href="<?php echo base_url();?>presensi_harian/load_form/<?php echo $idjph.'/'.$date->TGLHK;?>"><font size="1">+</font></a>  
                                            </td>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.row (nested) -->
<!--<script>
    $(document).ready(function() {
        $('#<?php echo $table;?>').dataTable({
        "columnDefs": [ {
            "visible": false,
            "targets": -1
        } ]
    });
    });
</script>-->

<script>
    $(document).ready(function() {
        $('#<?php echo $table;?>').dataTable({
//        "aoColumnDefs": [{ "bSortable": false, "aTargets": [0, 1, 2, 3] }]
            
            "bSort": false,
            "columnDefs": [ {
                "visible": false,
                "targets": 0
            } ]
        });
    });
</script>