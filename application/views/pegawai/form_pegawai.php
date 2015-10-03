            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form data-toggle="validator" name="pegawai" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data" >
                                    <div class="col-lg-12">
                                    
<!--                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input  class="form-control" type="text" name="nip" id="nip" <?php if(isset($record)){ echo 'value="'.$record->NIP.'"' ;}if(isset($NIP)){ echo 'value="'.$NIP.'"' ;}?>>
                                        </div>-->
                                        
                                        <?php
                                        if(!isset($record)){
                                        echo "<div class='form-group col-lg-6'>
                                            <label>Password *</label>
                                            <input class='form-control' type='password' name='passp' id='passp' pattern='^([_A-z0-9]){6,10}$' placeholder='6-10 karakter huruf dan/atau angka' required>
                                            <div class='help-block with-errors'></div>
                                        </div>";
                                        echo "<div class='form-group col-lg-6'>
                                            <label>Konfirmasi Password *</label>
                                            <input class='form-control' type='password' name='repassp' id='repassp' data-match='#passp' data-match-error='Maaf, konfirmasi password anda tidak cocok' data-error='Tulis ulang Password anda' required>
                                            <div class='help-block with-errors'></div>
                                        </div>";    
                                        }
                                        ?>
                                        
                                        <div class="form-group col-lg-<?php if(!isset($record)){ echo'6';} else{echo'12';}?>">
                                            <label>Nama *</label>
                                            <input class="form-control" type="text" name="namap" id="namap" <?php if(isset($record)){ echo 'value="'.$record->NAMAP.'"' ;}?> data-error="Nama tidak boleh kosong" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <?php
                                        if(!isset($record)){
                                            echo'<div class="form-group col-lg-6">
                                            <label>Foto</label>
                                            <input class="form-control" type="file" accept=".jpg" name="userfile">
                                            <div class="help-block with-errors"></div>
                                        </div>';
                                        }
                                        ?>
                                        
                                        <div class="form-group col-lg-6">
                                            <label>Jenis Kelamin *</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="jkp" id="jkp1" value="1" <?php if(isset($record) && $record->JKP==1){ echo 'checked';}?> required>Pria
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="jkp" id="jkp2" value="2" <?php if(isset($record) && $record->JKP==2){ echo 'checked';}?> required>Wanita
                                            </label>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Jenis Pegawai *</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="jenisp" id="jenisp1" value="1" <?php if(isset($record) && $record->JENISP==1){ echo 'checked';}?> required>Dosen
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="jenisp" id="jenisp2" value="2" <?php if(isset($record) && $record->JENISP==2){ echo 'checked';}?> required>Non Dosen
                                            </label>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Tempat Lahir *</label>
                                            <select  class="form-control selectpicker" data-live-search="true" name="idk" id="idk" <?php if(isset($record)){ echo ''; $idaselected=$record->IDK;}?> required>
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
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Tanggal Lahir *</label>
                                            <input  class="form-control" type="date" name="tgllp" id="tgllp" <?php if(isset($record)){ echo 'value="'.$record->TGLLP.'"' ;}?> required>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                            <label>Alamat *</label>
                                            <textarea  class="form-control" name="alamatp" id="alamatp" required><?php if(isset($record)){ echo $record->ALAMATP;}?></textarea>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Kota *</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="kot_idk" id="kot_idk" <?php if(isset($record)){ echo ''; $idaselected=$record->KOT_IDK;}?> required>
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
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Telp/HP</label>
                                            <input class="form-control" type="tel" name="tlpp" id="tlpp" <?php if(isset($record)){ echo 'value="'.$record->TLPP.'"' ;}?>>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Kewarganegaraan *</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="kwnp" id="kwnp1" value="1" <?php if(isset($record) && $record->KWNP==1){ echo 'checked';}?> required>WNI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="kwnp" id="kwnp2" value="2" <?php if(isset($record) && $record->KWNP==2){ echo 'checked';}?> required>WNA
                                            </label>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Status Perkawinan *</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="statp" id="statp1" value="0" <?php if(isset($record) && $record->STATP==0){ echo 'checked';}?> required>Lajang
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="statp" id="statp2" value="1" <?php if(isset($record) && $record->STATP==1){ echo 'checked';}?> required>Menikah
                                            </label>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Tanggal Masuk *</label>
                                            <?php 
                                            if(isset($record)){ 
                                                echo '<p>'.$record->TGLMASUKP.'</p>' ;} 
                                            else{
                                                echo '<input class="form-control" type="date" name="tglmasukp" id="tglmasukp" value="'.date("Y-m-d").'" required>' ;
                                            }?>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Jenjang Pendidikan *</label>
                                            <select  class="form-control" name="idjp" id="idjp" <?php if(isset($record)){ echo ''; $idaselected=$record->IDJP;}?> required>
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
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Jabatan *</label>
                                            <select class="form-control" name="idjab" id="idjab" <?php if(isset($record)){ echo ''; $idaselected=$record->IDJAB;}?> required>
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
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Golongan Jarak Rumah *</label>
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
                                            <div class='help-block with-errors'></div>
                                        </div>                                        
                                        <div class="form-group col-lg-6">
                                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Reset Field</button>
                                            <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp; * Wajib diisi
                                        </div>
                                    </div>
                                    <div>
                                
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
<!--<script>
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
    
    $('#pegawai').BootstrapValidator({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            namap: {
                row: '.col-xs-4',
                validators: {
                    notEmpty: {
                        message: 'Nama tidak boleh kosong'
                    }
                }
            }

        }
    });
});
</script>-->