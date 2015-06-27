            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="pegawai" method="post" action="<?php echo $action; ?>" ">
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input  class="form-control" type="text" name="nip" id="nip" <?php if(isset($record)){ echo 'value="'.$record->NIP.'"' ;}if(isset($NIP)){ echo 'value="'.$NIP.'"' ;}?>>
                                        </div>
                                        
                                        <?php
                                        if(!isset($record)){
                                            
                                        echo "<div class='form-group'>
                                            <label>Password</label>
                                            <input  class='form-control' type='password' name='passp' id='passp' pattern='^([_A-z0-9]){3,}$' maxlength='20'>
                                            
                                        </div>";
                                            
                                        }
                                        ?>
                                        
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input  class="form-control" type="text" name="namap" id="namap" <?php if(isset($record)){ echo 'value="'.$record->NAMAP.'"' ;}?>>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <select  class="form-control" name="idk" id="idk" <?php if(isset($record)){ echo ''; $idaselected=$record->IDK;}?>>
                                                <option value="">Pilih Tempat Lahir</option>
<?php 
    if(isset($dd_kota_m)) :
        foreach($dd_kota_m as $key => $val) :
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
                                            <label>Tanggal Lahir</label>
                                            <input  class="form-control" type="date" name="tgllp" id="tgllp" <?php if(isset($record)){ echo 'value="'.$record->TGLLP.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="jkp" id="jkp1" value="1" <?php if(isset($record) && $record->JKP==1){ echo 'checked';}?>>Pria
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="jkp" id="jkp2" value="2" <?php if(isset($record) && $record->JKP==2){ echo 'checked';}?>>Wanita
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea  class="form-control" name="alamatp" id="alamatp" <?php if(isset($record)){ echo 'value="'.$record->ALAMATP.'"' ;}?>></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <select  class="form-control" name="kot_idk" id="kot_idk" <?php if(isset($record)){ echo ''; $idaselected=$record->KOT_IDK;}?>>
                                                <option value="">Pilih Kota</option>
<?php 
    if(isset($dd_kota_m)) :
        foreach($dd_kota_m as $key => $val) :
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
                                            <label>Telp/HP</label>
                                            <input class="form-control" type="tel" name="tlpp" id="tlpp" <?php if(isset($record)){ echo 'value="'.$record->TLPP.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Kewarganegaraan</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="kwnp" id="kwnp1" value="1" <?php if(isset($record) && $record->KWNP==1){ echo 'checked';}?>>WNI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="kwnp" id="kwnp2" value="2" <?php if(isset($record) && $record->KWNP==2){ echo 'checked';}?>>WNA
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Perkawinan</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="statp" id="statp1" value="0" <?php if(isset($record) && $record->STATP==0){ echo 'checked';}?>>Lajang
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="statp" id="statp2" value="1" <?php if(isset($record) && $record->STATP==1){ echo 'checked';}?>>Menikah
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Masuk</label>
                                            <input  class="form-control" type="text" name="thmasukp" id="thmasukp" <?php if(isset($record)){ echo 'value="'.$record->THMASUKP.'"' ;} else{echo 'value="'.date("Y").'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Golongan Jarak Rumah</label>
                                            <select  class="form-control" name="idjr" id="idjr" <?php if(isset($record)){ echo ''; $idaselected=$record->IDJR;}?>>
                                                <option value="">Pilih Golongan Jarak Rumah</option>
<?php 
    if(isset($dd_jarak_rumah_m)) :
        foreach($dd_jarak_rumah_m as $key => $val) :
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
                                            <label>Jenis Pegawai</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="jenisp" id="jenisp1" value="1" <?php if(isset($record) && $record->JENISP==1){ echo 'checked';}?>>Dosen
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="jenisp" id="jenisp2" value="2" <?php if(isset($record) && $record->JENISP==2){ echo 'checked';}?>>Non Dosen
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenjang Pendidikan</label>
                                            <select  class="form-control" name="idjp" id="idjp" <?php if(isset($record)){ echo ''; $idaselected=$record->IDJP;}?>>
                                                <option value="">Pilih Jabatan</option>
<?php 
    if(isset($dd_jenjang_pendidikan_m)) :
        foreach($dd_jenjang_pendidikan_m as $key => $val) :
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
                                            <label>Jabatan</label>
                                            <select class="form-control" name="idjab" id="idjab" <?php if(isset($record)){ echo ''; $idaselected=$record->IDJAB;}?>>
                                                <option value="">Pilih Jabatan</option>
<?php 
    if(isset($dd_jabatan_m)) :
        foreach($dd_jabatan_m as $key => $val) :
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