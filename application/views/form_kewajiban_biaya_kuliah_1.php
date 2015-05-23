            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group">
                                            <label>Periode Akademik</label>
                                            <select class="form-control" name="idpa" id="idpa" <?php if($record!=NULL){ echo ''; $idaselected=$record->IDPA;}?>>
                                                <option value="">Pilih Periode Akademik</option>
<?php 
    if(isset($recordsperiode_akademik_m)) :
        foreach($recordsperiode_akademik_m as $key => $val) :
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
                                            <label>Angkatan</label>
                                            <select class="form-control" name="ida" id="ida" <?php if($record!=NULL){ echo ''; $idaselected=$record->IDA;}?>>
                                                <option value="">Pilih Angkatan</option>
<?php 
    if(isset($recordsangkatan_m)) :
        foreach($recordsangkatan_m as $key => $val) :
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
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Setup</button>
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