            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form data-toggle="validator" enctype="multipart/form-data" name="form1" method="post" action="<?php echo $action; ?>">
                                    <div class="form-group col-lg-6">
                                        <label>Kelas MK *</label>
                                        <select readonly class="form-control" name="idkmk" id="idkmk" onchange="getKMK(this.value)" <?php if($record!=NULL){$idaselected=$record->IDKMK;}else{$idaselected=$idkmk;}?> required data-error="Kelas MK harus dipilih">
                                            <option value="">Pilih Kelas MK</option>
<?php 
if(isset($dd_kelas_mk_m)) :
    foreach($dd_kelas_mk_m as $key => $val) :
        if (isset($idaselected) && $key==$idaselected){
            echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$key $val</option>\n";
        }
        else {
            echo "\t\t\t\t\t\t<option value='$key'>$key $val</option>\n";
        }
    endforeach;
else :
    echo "\t\t\t\t\t\t<option value=''>Tidak ada pilihan</option>\n";
endif;
?>
                                        </select>
                                        <div class='help-block with-errors'></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Pertemuan *</label>
                                        <input type="text" class="form-control" name="pertemuan" id="pertemuan" <?php if($record!=NULL){ echo 'value="'.$record->PERTEMUAN.'"';}?> required data-error="Pertemuan tidak boleh kosong">
                                        <div class='help-block with-errors'></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Pengajar *</label>
                                        <select  class="form-control" name="nip" id="nip" <?php if($record!=NULL){ echo ''; $nipselected=$record->NIP;}?> required data-error="Pengajar harus dipilih">
                                            <option value="" >Pilih Dosen</option>
<?php 
if(isset($dd_dosen_m)) :
    foreach($dd_dosen_m as $key => $val) :
        if (isset($nipselected) && $key==$nipselected){
            echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$key $val</option>\n";
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
                                    <div class="form-group col-lg-6">
                                        <label>Tanggal Mengajar *</label>
                                        <input class="form-control" type="date" 
                                               name="tglmengajar" id="tglmengajar" 
                                                   <?php if($record!=NULL){ echo 'value="'.$record->TGLMENGAJAR.'"' ;}?> 
                                               required data-error="Tanggal mengajar harus dipilih">
                                        <div class='help-block with-errors'></div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary active">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger " >Reset Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                    </div>
                                    <div class="col-lg-6">
                                        *&nbsp;&nbsp; Wajib diisi
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