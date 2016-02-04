            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form data-toggle="validator" name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group">
                                            <label>Tanggal *</label>
                                            <input class="form-control" required type="text" name="tglph" id="tglph" <?php if($record!=NULL){ echo 'value="'.$record->TGLPH.'"' ;}?>>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Reset Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                        * Harus diisi
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