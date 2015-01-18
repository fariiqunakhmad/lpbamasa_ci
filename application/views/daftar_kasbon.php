<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="wrapper">
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kasbon</h1>
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
                    <th>Tanggal</th>
                    <th>Oleh</th>
                    <th>Ketarangan</th>
                    <th>Nominal</th>
                    <th>Cicilan</th>
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
                    <td><?php echo $row->STATTSL; ?></td>
                    <td><?php echo $row->NIP; ?></td>
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
</body>
</html>