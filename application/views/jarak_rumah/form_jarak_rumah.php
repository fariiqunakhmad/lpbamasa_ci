            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                    <form name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group col-lg-4">
                                            <label>ID *</label>
                                            <input required class="form-control" type="text" name="idjr" id="idjr" <?php if($record!=NULL){ echo 'value="'.$record->IDJR.'"' ;}?>>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Jarak Minimal *</label>
                                            <div class="input-group">
                                                <input required class="form-control" type="text" name="jarakminjr" id="jarakminjr" <?php if($record!=NULL){ echo 'value="'.$record->JARAKMINJR.'"' ;}?>>
                                                <span class="input-group-addon">Km</span>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Tunjangan Transport *</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span>
                                                <input required class="form-control text-right" type="text" name="nominaltt" id="nominaltt" <?php if($record!=NULL){ echo 'value="'.$record->NOMINALTT.'"' ;}?>>
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary ">Submit</button>
                                            <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger " >Reset Field</button>
                                            <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                        </div>
                                        <div class="col-lg-6">
                                            *&nbsp;&nbsp; Wajib diisi
                                        </div>
                                    </form>
                                
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