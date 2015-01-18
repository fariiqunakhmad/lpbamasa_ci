<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="wrapper">
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Penggajian</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url(); ?>tsl/load_form">Add</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">	
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Tanggal Setup</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Pegawai</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->IDTSL; ?></td>
                                            <td><?php echo $row->TGLTSL; ?></td>
                                            <td><?php echo $row->IDKK; ?></td>
                                            <td><?php echo $row->URAIANTSL; ?></td>
                                            <td><?php echo $row->DKTSL; ?></td>
                                            <td><?php echo $row->NILAITSL; ?></td>
                                            <td><?php echo anchor("tsl/delete/$row->IDTSL", 'Delete'); ?> | <?php echo anchor("tsl/update/$row->IDTSL", 'Update'); ?></td>
                                        </tr>
                                        <?php endforeach; ?>

                                        <?php else : ?> 
                                        <h2>No records were returned.</h2>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
 
 
                                </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <p>&nbsp;</p>
    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
    </body>
</html>
