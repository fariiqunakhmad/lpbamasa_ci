            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form data-toggle="validator" enctype="multipart/form-data" name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group col-lg-4">
                                            <label>Angkatan *</label>
                                            <select required class="form-control selectpicker"
                                                    data-live-search="true"
                                                    name="txtida" id="txtida" 
                                                    <?php 
                                                    if($record!=NULL){
                                                        $idaselected=$record->IDA; 
//echo "<script>showKbkDd('$idaselected');</script>"; 
                                                    }
                                                    ?>>
                                                <option value="">Pilih Angkatan</option>
<?php 
    if(isset($dd_angkatan_m)) :
        foreach($dd_angkatan_m as $key => $val) :
            if (isset($idaselected) && $key==$idaselected){
                echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$val</option>\n";
            }
            else {
                echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
            }
        endforeach;
    else :
        echo "\t\t\t\t\t\t<option value=''>Tidak ada pilihan</option>\n";
    endif;
?>
                                            </select>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Komponen *</label>
                                            <select required class="form-control selectpicker" data-live-search="true" name="txtidkbk" id="txtidkbk" <?php if($record!=NULL){ echo ''; $idkbkselected=$record->IDKBK;}?>>
                                                <option value="" >Pilih Komponen</option>
<?php 
    if(isset($dd_kbk_m)) :
        foreach($dd_kbk_m as $key => $val) :
            if (isset($idkbkselected) && $key==$idkbkselected){
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
                                        <div class="form-group col-lg-4">
                                            <label>Biaya *</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span>
                                                <input pattern="^[0-9]{1,}$" required data-error="Nominal harus diisi dengan format bilangan bulat" class="form-control text-right" type="text" name="txtbiaya" id="txtbiaya" <?php if($record!=NULL){ echo 'value="'.$record->BIAYA.'"' ;}?>>
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
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->