            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form data-toggle="validator" name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group col-lg-4">
                                            <label>Tanggal Pelaksanaan *</label>
                                            <input required class="form-control" type="date" name="tglw" id="tglw" <?php if($record!=NULL){ echo 'value="'.$record->TGLW.'"' ;}?>>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Wisuda ke *</label>
                                            <input required class="form-control" type="text" name="periodew" id="periodew" pattern="^[0-9]{1,}$" <?php if($record!=NULL){ echo 'value="'.$record->PERIODEW.'"' ;}?>>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Ketua Pelaksana *</label>    
                                            <select required data-live-search="true" class="selectpicker form-control" name="nip" id="nip" <?php if($record!=NULL){ echo ''; $idaselected=$record->NIP;}?>>
                                                <option value="">Pilih Ketua Pelaksana</option>
<?php 
    if(isset($dd_pegawai_m)) :
        foreach($dd_pegawai_m as $key => $val) :
            if (isset($idaselected) && $key==$idaselected){
                echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$val</option>\n";
            }
            else {
                echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
            }
        endforeach;
    else :
        echo "<h2>No records were returned.</h2>";
    endif;
?>
                                            </select>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Tempat Pelaksanaan</label>
                                            <input class="form-control" type="text" name="tempatw" id="tempatw" <?php if($record!=NULL){ echo 'value="'.$record->TEMPATW.'"' ;}?>>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Biaya *</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span>
                                                <input required class="form-control text-right" type="text" name="biayaw" id="biayaw" pattern="^[0-9]{1,}$" <?php if($record!=NULL){ echo 'value="'.$record->BIAYAW.'"' ;}?>>
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                            <div class='help-block with-errors'></div>
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