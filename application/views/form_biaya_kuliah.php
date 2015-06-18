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
                                            <label>Angkatan</label>
                                            <select class="form-control selectpicker" 
                                                    data-live-search="true"
                                                    name="txtida" id="txtida" <?php if($record!=NULL){ echo ''; $idaselected=$record->IDA;}?>>
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
                                        </div>
                                        <div class="form-group">
                                            <label>Komponen</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="txtidkbk" id="txtidkbk" <?php if($record!=NULL){ echo ''; $idkbkselected=$record->IDKBK;}?>>
                                                <option value="" >Pilih Komponen Biaya</option>
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
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya</label>
                                            <input class="form-control" type="text" name="txtbiaya" id="txtbiaya" <?php if($record!=NULL){ echo 'value="'.$record->BIAYA.'"' ;}?>>
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