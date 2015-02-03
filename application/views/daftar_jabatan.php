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
        <!-- DataTables CSS -->
        <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables.bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Komponen Biaya Kuliah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url(); ?>kbk/load_form">Add</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">	
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Tunjangan</th>
                                            <th>Status</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->IDJAB; ?></td>
                                            <td><?php echo $row->NAMAJAB; ?></td>
                                            <td><?php echo $row->NOMINALTJ; ?></td>
                                            <td><?php echo $row->STATR; ?></td>
                                            <td><?php echo anchor("kbk/delete/$row->IDJAB", 'Delete'); ?> | <?php echo anchor("kbk/update/$row->IDJAB", 'Update'); ?></td>
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
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
    </body>
</html>
