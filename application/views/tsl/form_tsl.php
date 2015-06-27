            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input class="form-control" type="text" name="idtsl" id="idtsl" <?php if($record!=NULL){ echo 'value="'.$record->IDTSL.'"' ;}?>>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" type="date" name="tgltsl" id="tgltsl" <?php if($record!=NULL){ echo 'value="'.$record->TGLTSL.'"' ;}else{echo 'value="'.date('Y-m-d').'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Penerima/Penyetor</label>    
                                            <select data-live-search="true" class="form-control selectpicker" name="peg_nip" id="peg_nip" <?php if($record!=NULL){ echo ''; $idaselected=$record->PEG_NIP;}?>>
                                                <option value="">Pilih Penerima/Penyetor</option>
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
                                        <div class="form-group">
                                            <label>Kelompok</label>
                                            <select data-live-search="true" class="selectpicker form-control" name="idkk" id="idkk" <?php if($record!=NULL){ echo ''; $idaselected=$record->IDKK;}?>>
                                                <option value="">Pilih Kelompok</option>
<?php 
    if(isset($dd_kk_m)) :
        foreach($dd_kk_m as $key => $val) :
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
                                            <label>Uraian</label>
                                            <input class="form-control" type="text" name="uraiantsl" id="uraiantsl" <?php if($record!=NULL){ echo 'value="'.$record->URAIANTSL.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>D/K</label>
                                            <div class="radio-inline">
                                                <label>
                                                <input type="radio" name="dktsl" id="dktsl" value="D" <?php if($record!=NULL && $record->DKTSL=='D'){ echo 'checked';}?>>Debet
                                                </label>
                                            </div>
                                            <div class="radio-inline">
                                                <label>
                                                <input type="radio" name="dktsl" id="dktsl" value="K" <?php if($record!=NULL && $record->DKTSL=='K'){ echo 'checked';}?>>Kredit
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nominal</label>
                                            <input class="form-control" type="text" name="nominaltsl" id="nominaltsl" <?php if($record!=NULL){ echo 'value="'.$record->NOMINALTSL.'"' ;}?>>
                                        </div>
                                        
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
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