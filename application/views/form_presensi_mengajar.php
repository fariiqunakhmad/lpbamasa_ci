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
                                            <label>Kelas MK</label>
                                            <select class="form-control" name="idkmk" id="idkmk" onchange="getKMK(this.value)" <?php if($record!=NULL){ echo ''; $idaselected=$record->IDKMK;}?>>
                                                <option value="">Pilih Kelas MK</option>
<?php 
    if(isset($dd_kelas_mk_m)) :
        foreach($dd_kelas_mk_m as $key => $val) :
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
                                            <label>Pertemuan</label>
                                            <input type="text" class="form-control" name="pertemuan" id="pertemuan" >
                                        </div>
                                        <div class="form-group">
                                            <label>Pengajar</label>
                                            <select  class="form-control" name="nip" id="nip" <?php if($record!=NULL){ echo ''; $idkbkselected=$record->NIP;}?>>
                                                <option value="" >Pilih Dosen</option>
<?php 
    if(isset($dd_pegawai_m)) :
        foreach($dd_pegawai_m as $key => $val) :
            if (isset($idkbkselected) && $key==$idkbkselected){
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
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Mengajar</label>
                                            <input class="form-control" type="date" name="tglmengajar" id="tglmengajar" <?php if($record!=NULL){ echo 'value="'.$record->TGLMENGAJAR.'"' ;}?>>
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