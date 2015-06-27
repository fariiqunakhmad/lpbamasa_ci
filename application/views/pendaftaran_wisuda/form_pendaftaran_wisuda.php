
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="form1" name="form1" method="post" action="<?php echo $action; ?>">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="idpw">No Pendaftaran</label>
                                            <input class="form-control" type="text" name="idpw" id="idpw" <?php if($record!=NULL){ echo 'value="'.$record->IDPW.'"' ;}?> />
                                        </div>
                                        <div class="form-group">
                                            <label for="tglpw">Tanggal Pendaftaran</label>
                                            <input class="form-control" type="date" name="tglpw" id="tglpw" <?php if($record!=NULL){ echo 'value="'.$record->TGLPW.'"' ;}else{echo 'value="'.date('Y-m-d').'"' ;}?> />
                                        </div>
                                        <div class="form-group">
                                            <label >Mahasiswa</label>
                                            <select
                                                class="selectpicker form-control"
                                                data-live-search="true" 
                                                onchange="" 
                                                name="nim" 
                                                <?php if($record!=NULL){ $nimselected=$record->NIM;}?>>
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
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Periode Wisuda</label>    
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
                                                id="idw">
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
                                        </div>
                                        <div class="form-group">
                                            <label for="bayarpw">Biaya yang Dibayar</label>
                                            <input class="form-control" type="text" name="bayarpw" id="bayarpw" value="<?php if($record==NULL){echo $lastw->BIAYAW;} else { echo $record->BAYARPW;}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="catatanpw">Catatan</label>
                                            <textarea class="form-control" name="catatanpw" id="catatanpw" contenteditable="" cols="45" rows="5" ><?php if($record!=NULL){ echo $record->CATATANPW ;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
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
        