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
                                            <label>Nama</label>
                                            <input autofocus="" class="form-control" type="text" name="namajph" id="namajph" <?php if($record!=NULL){ echo 'value="'.$record->NAMAJPH.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input class="form-control" type="text" name="keteranganjph" id="keteranganjph" <?php if($record!=NULL){ echo 'value="'.$record->KETERANGANJPH.'"' ;}?>>
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