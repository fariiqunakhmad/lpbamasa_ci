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
                                            <label>ID</label>
                                            <input autofocus="" class="form-control" type="text" name="idma" id="idma" <?php if($record!=NULL){ echo 'value="'.$record->IDMA.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Min</label>
                                            <input class="form-control" type="text" name="tahunminma" id="tahunminma" <?php if($record!=NULL){ echo 'value="'.$record->TAHUNMINMA.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tunjangan Abdi</label>
                                            <input class="form-control" type="text" name="nominalta" id="nominalta" <?php if($record!=NULL){ echo 'value="'.$record->NOMINALTA.'"' ;}?>>
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