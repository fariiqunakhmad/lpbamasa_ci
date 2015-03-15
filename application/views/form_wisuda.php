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
                                            <label>Tanggal Pelaksanaan</label>
                                            <input class="form-control" type="date" name="txttglw" id="txttglw" <?php if($record!=NULL){ echo 'value="'.$record->TGLW.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Pelaksanaan</label>
                                            <input class="form-control" type="text" name="txttempatw" id="txttempatw" <?php if($record!=NULL){ echo 'value="'.$record->TEMPATW.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya</label>
                                            <input class="form-control" type="text" name="txtbiayaw" id="txtbiayaw" <?php if($record!=NULL){ echo 'value="'.$record->BIAYAW.'"' ;}?>>
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