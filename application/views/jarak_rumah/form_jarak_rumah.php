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
                                            <input autofocus="" class="form-control" type="text" name="idjr" id="idjr" <?php if($record!=NULL){ echo 'value="'.$record->IDJR.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Jarak Min</label>
                                            <input class="form-control" type="text" name="jarakminjr" id="jarakminjr" <?php if($record!=NULL){ echo 'value="'.$record->JARAKMINJR.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tunjangan Transport</label>
                                            <input class="form-control" type="text" name="nominaltt" id="nominaltt" <?php if($record!=NULL){ echo 'value="'.$record->NOMINALTT.'"' ;}?>>
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Reset Field</button>
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