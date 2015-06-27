<!--<link href='http://localhost/lpbamasa_ci/assets/css/plugins/dataTables.bootstrap.css' rel='stylesheet'>
<link href="http://localhost/lpbamasa_ci/assets/css/bootstrap.min.css" rel="stylesheet">

         MetisMenu CSS 
        <link href="http://localhost/lpbamasa_ci/assets/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

         Custom CSS 
        <link href="http://localhost/lpbamasa_ci/assets/css/sb-admin-2.css" rel="stylesheet">

         Custom Fonts 
        <link href="http://localhost/lpbamasa_ci/assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        
        
        

<script src="http://localhost/lpbamasa_ci/assets/js/jquery-1.11.0.js"></script>

         Bootstrap Core JavaScript 
        <script src="http://localhost/lpbamasa_ci/assets/js/bootstrap.min.js"></script>

         Metis Menu Plugin JavaScript 
        <script src="http://localhost/lpbamasa_ci/assets/js/plugins/metisMenu/metisMenu.min.js"></script>

         Custom Theme JavaScript 
        <script src="http://localhost/lpbamasa_ci/assets/js/sb-admin-2.js"></script>
<script src='http://localhost/lpbamasa_ci/assets/js/plugins/dataTables/jquery.dataTables.js'></script>
	<script src='http://localhost/lpbamasa_ci/assets/js/plugins/dataTables/dataTables.bootstrap.js'></script>-->

                            <div class="table-responsive">
                                <table border='1'
                                       class="table table-striped table-bordered table-hover" 
                                       id="<?php echo $table;?>">
                                    <font size="1">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"><center><font size="1">No.</font></center></th>
                                            <th rowspan="2"><center><font size="1">NIP</font></center></th>
                                            <th rowspan="2"><center><font size="1">Nama</font></center></th>
                                            <th colspan="<?php echo count($dates);?>"><center><font size="1">Tanggal</font></center></th> 
                                        </tr>
                                        <tr>
                                            <?php if(isset($dates)) : foreach($dates as $date) : ?>
                                            <th><font size="1"><?php echo substr($date->TGLPH, 8); ?></font></th>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($pegawai)) : foreach($pegawai as $peg) : ?>
                                        <tr>
                                            <td><font size="1"><?php echo $no++; ?></font></td>
                                            <td><font size="1"><?php echo $peg->NIP; ?></font></td>
                                            <td><font size="1"><?php echo $peg->NAMAP; ?></font></td>
                                            <?php if(isset($dates)) : foreach($dates as $date) : ?>
                                            <td>
                                                <font size="1">
                                                <?php 
                                                foreach ($detail as $key => $value) {
                                                    if($value->NIP==$peg->NIP && $value->TGLPH==$date->TGLPH){
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
                                            <td colspan="3"><font size="1">Form presensi</font></td>
                                            <?php if(isset($dates)) : foreach($dates as $date) : ?>
                                            <td>
                                                <a href="<?php echo base_url();?>detail_presensi_harian/load_form/<?php echo $idjph.'/'.$date->TGLPH;?>"><font size="1">+</font></a>  
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