            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form data-toggle="validator" enctype="multipart/form-data" name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group col-lg-12">
                                            <label>Bulan *</label>    
                                            <input type="month" class="form-control" name="bulan" id="bulan" <?php if($record!=NULL){ $idaselected=$record->PEG_NIP;}?> required data-error="bulan penggajian harus dipilih">
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary active">Generate</button>
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