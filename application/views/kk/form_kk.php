            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form data-toggle="validator" name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group col-lg-6">
                                            <label>ID *</label>
                                            <input required class="form-control" type="text" name="txtidkk" id="txtidkk" <?php if($record!=NULL){ echo 'value="'.$record->IDKK.'"' ;}?>>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group  col-lg-6">
                                            <label>Nama *</label>
                                            <input required class="form-control" type="text" name="txtnamakk" id="txtnamakk" <?php if($record!=NULL){ echo 'value="'.$record->NAMAKK.'"' ;}?>>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
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