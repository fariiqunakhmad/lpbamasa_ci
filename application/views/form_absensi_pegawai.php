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
                    <h1 class="page-header">Absensi Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <form id="form1" name="form1" method="post" action="">

                                                <div class="form-group">
                                                  <label for="txttanggal">Tanggal</label>
                                                  <input type="date" name="txttanggal" id="txttanggal" />
                                  </div>
                                                <div class="form-group">
                                                    <div class="table-responsive">
                                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                      <thead>
                                                    <tr>
                                                      <th scope="col">No</th>
                                                      <th scope="col">NIP</th>
                                                      <th scope="col">Nama</th>
                                                      <th scope="col">Hadir</th>
                                                      <th scope="col">Izin</th>
                                                      <th scope="col">Sakit</th>
                                                    </tr>
                                                      </thead>
                                                      <tbody>
                                                    <tr>
                                                      <td>1</td>
                                                      <td>9384</td>
                                                      <td>Akhmad</td>
                                                      <td><input type="checkbox" name="txthadir" id="txthadir" /></td>
                                                      <td><input type="checkbox" name="txtizin" id="txtizin" /></td>
                                                      <td><input type="checkbox" name="txtsakit" id="txtsakit" /></td>
                                                    </tr>
                                                    <tr>
                                                      <td>2</td>
                                                      <td>9486</td>
                                                      <td>Fariiqun</td>
                                                      <td><input type="checkbox" name="txthadir" id="txthadir" /></td>
                                                      <td><input type="checkbox" name="txtizin" id="txtizin" /></td>
                                                      <td><input type="checkbox" name="txtsakit" id="txtsakit" /></td>
                                                    </tr>
                                                    <tr>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td><input type="button" name="txthadir" id="txthadir" value="Select All"/></td>
                                                      <td></td>
                                                      <td></td>
                                                    </tr>
                                                  </tbody>
                                                  </table>
                                                    </div>
                    </div>
                                                <div class="form-group"></div>
<div class="form-group"></div>
                                       
                                                    <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                                    <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
</form>
 </div>
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

</body>
</html>
