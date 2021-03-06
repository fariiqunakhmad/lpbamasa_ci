            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form data-toggle="validator" name="form1" method="post" action="<?php echo $action; ?>">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ID Peserta (NIK) *</label>
                                            <input required placeholder="No KTP/SIM" class="form-control" type="text" name="idpbmh" <?php if($record!=NULL){ echo 'value="'.$record->IDPBMH.'"' ;}?> />
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Peserta *</label>
                                            <input required class="form-control" type="text" name="namapbmh" <?php if($record!=NULL){ echo 'value="'.$record->NAMAPBMH.'"' ;}?> />
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat/Tanggal Lahir *</label>
                                            <div class="input-group">
                                                <select data-live-search="true" 
                                                        class="selectpicker form-control" 
                                                        name="idk" required
                                                        >
                                                    <option value="">Pilih Tempat Lahir</option>
                                                    <?php 
                                                    if($record!=NULL){
                                                        $idkselected=$record->IDK;
                                                    }
                                                    if(isset($dd_kota_m)) :
                                                        foreach($dd_kota_m as $key => $val) :
                                                            if (isset($idkselected) && $key==$idkselected){
                                                                echo "\t\t\t\t\t\t<option selected value='$key'>$val</option>\n";
                                                            }
                                                            else {
                                                                echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
                                                            }
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </select>
                                                <span class="input-group-addon">,</span>
                                                <input required class="form-control" type="date" name="tlpbmh" <?php if($record!=NULL){ echo 'value="'.$record->TLPBMH.'"' ;}?>/>  
                                            </div>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin *</label>
                                            <div class="form-control-static">
                                                <input required data-error="pilih jenis kelamin" type="radio" name="jkpbmh" value="l" <?php if($record!=NULL && $record->JKPBMH=='l'){ echo 'checked';}?>>Laki-laki
                                                <input required data-error="pilih jenis kelamin" type="radio" name="jkpbmh" value="p" <?php if($record!=NULL && $record->JKPBMH=='p'){ echo 'checked';}?>>Perempuan
                                            </div>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Alamat *</label>
                                            <input required class="form-control" type="text" name="alamatpbmh" <?php if($record!=NULL){ echo 'value="'.$record->ALAMATPBMH.'"' ;}?>/>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota *</label>
                                            <select data-live-search="true" 
                                                    class="selectpicker form-control"
                                                    name="kot_idk" required>
                                                <option value="">Pilih Kota</option>
                                                <?php 
                                                if($record!=NULL){
                                                    $kot_idkselected=$record->KOT_IDK;
                                                }
                                                if(isset($dd_kota_m)) :
                                                    foreach($dd_kota_m as $key => $val) :
                                                        if (isset($kot_idkselected) && $key==$kot_idkselected){
                                                            echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$val</option>\n";
                                                        }
                                                        else {
                                                            echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
                                                        }
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label >Telp</label>
                                            <input class="form-control" type="text" name="tlppbmh" <?php if($record!=NULL){ echo 'value="'.$record->TLPPBMH.'"' ;}?> pattern="^[0-9\-\+\ \(\)]{9,17}$"/>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>    
                                            <select data-live-search="true" 
                                                    class="selectpicker form-control"
                                                    name="idj" >
                                                <option value="1">Pilih Pekerjaan</option>
                                                <?php 
                                                if($record!=NULL){
                                                    $idjselected=$record->IDJ;
                                                }
                                                if(isset($dd_pekerjaan_m)) :
                                                    foreach($dd_pekerjaan_m as $key => $val) :
                                                        if (isset($idjselected) && $key==$idjselected){
                                                            echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$val</option>\n";
                                                        }
                                                        else {
                                                            echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
                                                        }
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Reset Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                        &nbsp;&nbsp;*&nbsp;&nbsp; Wajib diisi
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