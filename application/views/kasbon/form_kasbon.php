            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form data-toggle="validator" enctype="multipart/form-data"  id="form1" name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="col-lg-12 form-group">
                                            <label>Keterangan *</label>
                                            <input class="form-control" type="text" name="keterangankb" id="keterangankb" <?php if($record!=NULL){ echo 'value="'.$record->KETERANGANKB.'"' ;}?> required data-error="keterangan keperluan kasbon harus diisi">
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label>Nominal *</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp.</span>
                                                <input class="form-control text-right" type="text" name="nominalkb" id="nominalkb" <?php if($record!=NULL){ echo 'value="'.$record->kas->NOMINALKAS.'"' ;}?> required pattern="^[0-9]{1,}$" data-error="Nominal harap diisi dengan bilangan bulat positif">
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label>Banyak Cicilan *</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="qtycicilankb" id="qtycicilankb" <?php if($record!=NULL){ echo 'value="'.$record->QTYCICILANKB.'"' ;}?> required pattern="^[0-9]{1,}$" data-error="Banyak cicilan harap diisi dengan bilangan bulat positif" >
                                                <span class="input-group-addon">Kali</span>
                                            </div>
                                            <div class='help-block with-errors'></div>
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