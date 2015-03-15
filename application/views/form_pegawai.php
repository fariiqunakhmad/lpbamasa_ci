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
                                            <label>NIP</label>
                                            <input class="form-control" type="text" name="txtnip" id="txtnip" <?php if($record!=NULL){ echo 'value="'.$record->NIP.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="text" name="txtpassp" id="txtpassp" <?php if($record!=NULL){ echo 'value="'.$record->PASSP.'"' ;}?>>
                                        </div
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="txtnama" id="txtnama" <?php if($record!=NULL){ echo 'value="'.$record->PASSP.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <select class="form-control" name=""></select>
                                            </div>
                                            <div class="col-lg-4">
                                                <select class="form-control" name=""></select>
                                            </div>
                                                
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat/Tanggal Lahir</label>
                                            <select class="form-control" name="txtida" id="txtida" <?php if($record!=NULL){ echo ''; $idaselected=$record->IDA;}?>>
                                                <option value="">Pilih Angkatan</option>
<?php 
    if(isset($recordsA)) :
        foreach($recordsA as $key => $val) :
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
                                            <label>Jenis Kelamin</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtjkp" id="txtjkp1" value="1" >Pria
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtjkp" id="txtjkp2" value="2" >Wanita
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" type="text" name="txtnama" id="txtnama" <?php if($record!=NULL){ echo 'value="'.$record->PASSP.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <select class="form-control" name="txtida" id="txtida" <?php if($record!=NULL){ echo ''; $idaselected=$record->IDA;}?>>
                                                <option value="">Pilih Kota</option>
<?php 
    if(isset($recordsA)) :
        foreach($recordsA as $key => $val) :
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
                                            <label>Kewarganegaraan</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtkwnp" id="txtkwnp1" value="1" >WNI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtkwnp" id="txtkwnp2" value="2" >WNA
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Masuk</label>
                                            <input class="form-control" type="text" name="txtthnmasukp" id="txtthnmasukp" <?php if($record!=NULL){ echo 'value="'.$record->BIAYA.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pegawai</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtjenisp" id="txtjenisp1" value="1" >Dosen
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtjenisp" id="txtjenisp2" value="2" >Non Dosen
                                            </label>
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