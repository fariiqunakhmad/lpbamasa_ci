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
                                            <label>ID Jabatan</label>
                                            <input autofocus="" class="form-control" type="text" name="idjab" id="idjab" <?php if($record!=NULL){ echo 'value="'.$record->IDJAB.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="namajab" id="namajab" <?php if($record!=NULL){ echo 'value="'.$record->NAMAJAB.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tunjangan</label>
                                            <input class="form-control" type="text" name="nominaltj" id="nominaltj" <?php if($record!=NULL){ echo 'value="'.$record->NOMINALTJ.'"' ;}?>>
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
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