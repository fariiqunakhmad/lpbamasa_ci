
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="form1" name="form1" method="post" action="<?php echo $action; ?>" data-toggle="validator" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Mahasiswa *</label>
                                            <select
                                                class="selectpicker form-control"
                                                data-live-search="true"
                                                name="nim" 
                                                required data-error="Mahasiswa harus dipilih"
                                                <?php if($record!=NULL){ $nimselected=$record->NIM;}?>
                                                >
                                                <option value="">Pilih Mahasiswa</option>
                                                <?php
                                                    if(isset($dd_mahasiswa_m)) :
                                                        foreach($dd_mahasiswa_m as $key => $val) :
                                                            if (isset($nimselected) && $key==$nimselected){
                                                                echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$key $val</option>\n";
                                                                $namamselected=$val;
                                                            }
                                                            else {
                                                                echo "\t\t\t\t\t\t<option value='$key'>$key $val</option>\n";
                                                            }
                                                        endforeach;
                                                    else :
                                                        echo "<h2>No records were returned.</h2>";
                                                    endif;
                                                ?>
                                            </select>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="catatanpw">Catatan</label>
                                            <textarea class="form-control" name="catatanpw" id="catatanpw" contenteditable=""  rows="1" ><?php if($record!=NULL){ echo $record->CATATANPW ;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Periode Wisuda *</label>    
                                            <select 
                                                <?php if($record==NULL){
                                                    $idaselected=$lastw->IDW;
                                                }else{
                                                    $idaselected=$record->IDW;
                                                }
                                                ?>
                                                class="selectpicker form-control"
                                                data-live-search="true" 
                                                onchange="getBiayaW(this.value)" 
                                                name="idw" 
                                                id="idw" required data-error="Periode wisuda harus dipilih">
                                                <option value="">Pilih Periode Wisuda</option>
                                                <?php 
                                                    if(isset($dd_wisuda_m)) :
                                                        foreach($dd_wisuda_m as $key => $val) :
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
                                        <div class="form-group">
                                            <label>Biaya yang Dibayar </label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span>
                                                <input readonly="" class="form-control text-right" type="text" name="bayarpw" id="bayarpw" value="<?php if($record==NULL){echo $lastw->BIAYAW;} else { echo $record->BAYARPW;}?>" data-error="tidak boleh kosong" required>
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Reset Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp; * Wajib diisi
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
        