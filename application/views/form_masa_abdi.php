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
                                            <label>Tahun Min</label>
                                            <input autofocus="" class="form-control" type="text" name="txttahunmin" id="txttahunmin" <?php if($record!=NULL){ echo 'value="'.$record->TAHUNMINMA.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Max</label>
                                            <input class="form-control" type="text" name="txttahunmax" id="txttahunmax" <?php if($record!=NULL){ echo 'value="'.$record->TAHUNMAXMA.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tunjangan Abdi</label>
                                            <input class="form-control" type="text" name="txtnominalta" id="txtnominalta" <?php if($record!=NULL){ echo 'value="'.$record->NOMINALTA.'"' ;}?>>
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