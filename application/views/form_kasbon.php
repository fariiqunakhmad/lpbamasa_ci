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
                                            <label for="idkb">ID Kasbon</label>
                                            <input class="form-control" type="text" name="idkb" id="idkb" <?php if($record!=NULL){ echo 'value="'.$record->IDKB.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" type="date" name="tglkb" id="tglkb" <?php if($record!=NULL){ echo 'value="'.$record->TGLKB.'"' ;}else{echo 'value="'.date('Y-m-d').'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">Pemohon</label>
                                            <select data-live-search="true" class="form-control selectpicker" name="nip" id="nip" <?php if($record!=NULL){ echo ''; $idaselected=$record->NIP;}?>>
                                                <option value="">Pilih Pemohon</option>
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
                                            <label for="txtketerangankb">Keterangan</label>
                                            <input class="form-control" type="text" name="keterangankb" id="keterangankb" <?php if($record!=NULL){ echo 'value="'.$record->KETERANGANKB.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtnominalkb">Nominal</label>
                                            <input class="form-control" type="text" name="nominalkb" id="nominalkb" <?php if($record!=NULL){ echo 'value="'.$record->NOMINALKB.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtqtycicilankb">Cicilan</label>
                                            <input class="form-control" type="text" name="qtycicilankb" id="qtycicilankb" <?php if($record!=NULL){ echo 'value="'.$record->QTYCICILANKB.'"' ;}?>>
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