

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form<?php echo $tab; ?>
                        </div>
                        <div class="panel-body">
                            <form data-toggle="validator" id="form1" name="form1" onsubmit="javascript: insert(event); return false;" >
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div <?php if($record==NULL){echo 'hidden="true"';}?>  class="form-group col-lg-6">
                                            <label>ID</label>
                                            <input <?php if($record!=NULL){echo 'readonly="true"';}?> class="form-control" type="text" name="idkgp" id="idkgp" <?php if($record!=NULL){ echo 'value= "'.$record->IDKGP.'"';}?>>
                                        </div>
                                        <div hidden="true" class="form-group col-lg-6">
                                            <label>Pegawai</label>    
                                            <select data-live-search="true" 
                                                    class="form-control selectpicker" 
                                                    name="nip" id="nip" <?php if($record!=NULL){$idaselected=$record->NIP;}elseif(isset ($nip)){$idaselected=$nip;}?>>
                                                <option value="">Pilih Pegawai</option>
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
                                        </div>
                                    
                                        <div class="form-group col-lg-6">
                                            <label>Komponen *</label>
                                            <!--document.getElementById('nip').value-->
                                            <select <?php if($record!=NULL){echo 'readonly="true"';}?>
                                                data-live-search="true" 
                                                class="form-control selectpicker" 
                                                onchange="getGajiSatuan($('select[name=nip]').val(), this.value); " 
                                                name="idkg" id="idkg" 
                                                <?php if($record!=NULL){ echo ''; $idkgselected=$record->IDKG;}?> required>
                                                <?php if($record==NULL){echo '<option value="">Pilih Komponen</option>';}?>
<?php 
    if(isset($dd_kg_m)) :
        foreach($dd_kg_m as $key => $val) :
            if (isset($idkgselected)){
                if($key==$idkgselected){
                    echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$val</option>\n";
                }  else {
                    echo "\t\t\t\t\t\t<option disabled value='$key'>$val</option>\n";
                }
            }else {
                $a=FALSE;
                foreach ($records_kgp as $kgp) {
                    if($kgp->IDKG==$key){
                        $a=TRUE;
                    }
                }
                if($a){
                    echo "\t\t\t\t\t\t<option disabled=\"disabled\" value='$key'>$val</option>\n";
                }else{
                    echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
                }
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
                                            <label>Gaji satuan *</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span>
                                                <input required pattern="^[0-9]{1,}$" class="form-control text-right" type="text" name="gajisatuan" id="gajisatuan" <?php if($record!=NULL){ echo 'value= "'.$record->GAJISATUAN.'"';}?>>
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <button onclick="" type="submit" name="submit" value="submit"  class="btn btn-sm btn-primary">Submit</button>
                                            <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Reset Field</button>
                                            <button type="button" class="btn btn-sm btn-warning" onclick="showFormI('')">Cancel</button>
                                            &nbsp;&nbsp;*&nbsp;&nbsp; Wajib diisi
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

