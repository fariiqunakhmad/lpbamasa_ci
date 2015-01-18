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
                    <h1 class="page-header">Penggajian</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <h3 class="">Januari 2015</h3> 
                    <div class="panel panel-default">
<div class="panel-heading">Dosen</div>
                        <div class="panel-body">
                            <div class="table-responsive">	
        
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tunj Abdi</th>
                    <th>Tunj Jabatan</th>
                    <th>Tunj Kehadiran</th>
                    <th>Insentif Mengajar</th>
                    <th>Insentif Piket</th>
                    <th>Jumlah Gaji</th>
                    <th>Cicilan Kasbon</th>
                    <th>Gaji Bersih</th>
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
                    <td></td>
                    <td><?php echo $row->NIP; ?></td>
                    <td></td>
                </tr>
                <?php endforeach; ?>

                <?php else : ?> 
                <h2>No records were returned.</h2>
                <?php endif; ?>
            </tbody>
        </table>
 
 
                                </div>
                                </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
<div class="panel-heading">Non Dosen</div>
                        <div class="panel-body">
                            <div class="table-responsive">	
        
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tunj Abdi</th>
                    <th>Tunj Jabatan</th>
                    <th>Tunj Kehadiran</th>
                    <th>Jumlah Gaji</th>
                    <th>Cicilan Kasbon</th>
                    <th>Gaji Bersih</th>
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
                    <td></td>
                </tr>
                <?php endforeach; ?>

                <?php else : ?> 
                <h2>No records were returned.</h2>
                <?php endif; ?>
            </tbody>
        </table>
 
 
                                </div>
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