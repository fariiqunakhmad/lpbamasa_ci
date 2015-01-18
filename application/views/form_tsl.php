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
                    <h1 class="page-header">Transaksi Sektor Lain</h1>
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
                                    <form name="form1" method="post" action="create">

                                                <div class="form-group">
                                                    <label>ID</label>

                                                    <input class="form-control" type="text" name="txtidtsl" id="txtidtsl">
                                                </div>

                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input class="form-control" type="date" name="txttgltsl" id="txttgltsl">
                                                </div>
                                                <div class="form-group">
                                                    <label>Penerima/Penyetor</label>    
                                                    <input class="form-control" type="text" name="txtnip" id="txtnip" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Kelompok</label>


                                                        <select class="form-control" name="txtidkk" id="txtidkk">
                                                            <option value="">Pilih Kelompok</option>
                                                        <?php if(isset($records)) : foreach($records as $row) : ?> 
                                                            <option value="<?php echo $row->IDKK; ?>"><?php echo $row->NAMAKK; ?> </option>
                                                            <?php endforeach; ?>
                                                            <?php else : ?> 
                                                            <h2>No records were returned.</h2>
                                                        <?php endif; ?>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Uraian</label>

                                                    <input class="form-control" type="text" name="txturaiantsl" id="txturaiantsl">
                                                </div>
                                                <div class="form-group">
                                                    <label>D/K</label>
                                                    <div class="radio-inline">
                                                        <label>
                                                        <input type="radio" name="rdktsl" id="rdktsl" value="D">Debet
                                                        </label>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <label>
                                                        <input type="radio" name="rdktsl" id="rdktsl" value="K">Kredit
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nominal</label>

                                                    <input class="form-control" type="text" name="txtnominaltsl" id="txtnominaltsl">
                                                </div>
                                                <div class="form-group">
                                                    <label hidden="">Status</label>
                                                    <div class="radio-inline">
                                                        <label>
                                                            <input name="rstattsl" type="radio" id="rstattsl" value="1" hidden="" checked>
                                                        </label>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <label>
                                                            <input type="radio" name="rstattsl" id="rstattsl" value="0" hidden="">
                                                        </label>
                                                    </div>
                                                </div>
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
    <p>&nbsp;</p>
		
    </body>
</html>
