            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group">
                                            <label>Periode</label>
                                            <input class="form-inline form-control" type="date" name="txtnamakbk" id="txtnamakbk" value="<?php echo date('yyyy-M-dd')?>"> s/d
                                            <input class="form-inline form-control" type="date" name="txtnamakbk" id="txtnamakbk" value="<?php echo date('yyyy-M-dd')?>">
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Generate</button>
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