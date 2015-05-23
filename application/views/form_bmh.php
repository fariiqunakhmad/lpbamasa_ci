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
                                            <label>Tahun</label>
                                            <input autofocus="" class="form-control" type="text" name="tahunbmh" id="tahunbmh" <?php if($record!=NULL){ echo 'value="'.$record->TAHUNBMH.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Periode</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="periodebmh" id="periodebmh1" value="1" <?php if($record!=NULL && $record->PERIODEBMH==1){ echo 'checked';}?>>1 (_ s/d _)
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="periodebmh" id="periodebmh2" value="2" <?php if($record!=NULL && $record->PERIODEBMH==2){ echo 'checked';}?>>2 (_ s/d _)
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Mulai</label>
                                            <input class="form-control" type="date" name="tglmulaibmh" id="tglmulaibmh" <?php if($record!=NULL){ echo 'value="'.$record->TGLMULAIBMH.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Berakhir</label>
                                            <input class="form-control" type="date" name="tglakhirbmh" id="tglakhirbmh" <?php if($record!=NULL){ echo 'value="'.$record->TGLAKHIRBMH.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya</label>
                                            <input class="form-control" type="text" name="biayabmh" id="biayabmh" <?php if($record!=NULL){ echo 'value="'.$record->BIAYABMH.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketua Pelaksana</label>    
                                            <select class="form-control" name="nip" id="nip" <?php if($record!=NULL){ echo ''; $idaselected=$record->NIP;}?>>
                                                <option value="">Pilih Ketua Pelaksana</option>
<?php 
    if(isset($recordspegawai_m)) :
        foreach($recordspegawai_m as $key => $val) :
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