
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form id="form1" name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group">
                                            <label for="txtidpw">No Pendaftaran</label>
                                            <input class="form-control" type="text" name="idpw" id="idpw" <?php if($record!=NULL){ echo 'value="'.$record->IDPW.'"' ;}?> />
                                        </div>
                                        <div class="form-group">
                                            <label for="txttglpw">Tanggal Pendaftaran</label>
                                            <input class="form-control" type="date" name="tglpw" id="tglpw" <?php if($record!=NULL){ echo 'value="'.$record->TGLPW.'"' ;}?> />
                                        </div>
                                        <div class="form-group">
                                            <label>Periode Wisuda</label>    
                                            <select class="form-control" name="idw" id="idw" <?php if($record!=NULL){ echo ''; $idaselected=$record->IDW;}?>>
                                                <option value="">Pilih Periode Wisuda</option>
<?php 
    if(isset($recordswisuda_m)) :
        foreach($recordswisuda_m as $key => $val) :
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
                                            <label>Atas Nama</label>    
                                            <select class="form-control" name="nim" id="nim" <?php if($record!=NULL){ echo ''; $idaselected=$record->NIM;}?>>
                                                <option value="">Pilih Mahasiswa </option>
<?php 
    if(isset($recordsmahasiswa_m)) :
        foreach($recordsmahasiswa_m as $key => $val) :
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
                                            <label for="txtcatatanpw">Catatan</label>
                                            <textarea class="form-control" name="catatanpw" id="catatanpw" contenteditable="" cols="45" rows="5" <?php if($record!=NULL){ echo 'value="'.$record->CATATANPW.'"' ;}?>></textarea>
                                          </div>
                                        <div class="form-group">
                                            <label for="bayarpw">Biaya yang Dibayar</label>
                                            <input class="form-control" type="text" name="bayarpw" id="bayarpw" <?php if($record!=NULL){ echo 'value="'.$record->BAYARPW.'"' ;}?> />
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
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
        