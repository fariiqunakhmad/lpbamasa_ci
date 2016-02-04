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
                                            <input required class="form-control" type="text" name="idjab" id="idjab" <?php if($record!=NULL){ echo 'value="'.$record->IDJAB.'"' ;}?>>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Nama Jabatan *</label>
                                            <input required class="form-control" type="text" name="namajab" id="namajab" <?php if($record!=NULL){ echo 'value="'.$record->NAMAJAB.'"' ;}?>>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Tunjangan Jabatan *</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span>
                                                <input required class="form-control text-right" type="text" name="nominaltj" id="nominaltj" <?php if($record!=NULL){ echo 'value="'.$record->NOMINALTJ.'"' ;}?>>
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary active">Submit</button>
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