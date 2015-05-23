
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="form1" name="form1" method="post" action="">
                                    <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label for="txtnodaftarbmh">No Pendaftaran</label>
                                            <input class="form-control" type="text" name="txtnodaftarbmh" id="txtnodaftarbmh" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="txtnamapbmh">Nama Peserta</label>
                                            <input class="form-control" type="text" name="txtnamapbmh" id="txtnamapbmh" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <select class="form-control" name="idk" id="idk" <?php if($record!=NULL){ echo ''; $idaselected=$record->IDK;}?>>
                                                <option value="">Pilih Tempat Lahir</option>
<?php 
    if(isset($recordskota_m)) :
        foreach($recordskota_m as $key => $val) :
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
                                            <label for="txttlpbmh">Tanggal Lahir</label>
                                            <input class="form-control" type="text" name="txttlpbmh" id="txttlpbmh" />
                                          </div>
                                        <div class="form-group">
                                            <label for="txtjkpbmg">Jenis Kelamin</label>
                                            <input class="form-control" type="text" name="txtjkpbmg" id="txtjkpbmg" />
                                        </div>
                                        <div class="form-group">
                                            <label for="txtalamatpbmh">Alamat</label>
                                            <input class="form-control" type="text" name="txtalamatpbmh" id="txtalamatpbmh" />
                                        </div>
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <select class="form-control" name="kot_idk" id="kot_idk" <?php if($record!=NULL){ echo ''; $idaselected=$record->KOT_IDK;}?>>
                                                <option value="">Pilih Kota</option>
<?php 
    if(isset($recordskota_m)) :
        foreach($recordskota_m as $key => $val) :
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
                                            <label for="txttlppbmh">Telp</label>
                                            <input class="form-control" type="text" name="txttlppbmh" id="txttlppbmh" />
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>    
                                            <select class="form-control" name="peg_nip" id="peg_nip" <?php if($record!=NULL){ echo ''; $idaselected=$record->PEG_NIP;}?>>
                                                <option value="">Pilih Pekerjaan</option>
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
                                    
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">  
                                            <label for="txttgldaftarbmh">Tanggal Pendaftaran</label>
                                            <input class="form-control" type="text" name="txttgldaftarbmh" id="txttgldaftarbmh" />
                                        </div>
                                        <div class="form-group">
                                            <label>Periode BMH</label>    
                                            <select class="form-control" name="peg_nip" id="peg_nip" <?php if($record!=NULL){ echo ''; $idaselected=$record->PEG_NIP;}?>>
                                                <option value="">Pilih Periode BMH</option>
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
                                        <div class="form-group">
                                            <label for="txtbiayadaftarbmh">Tanggal Pelaksanaan</label>
                                            <input class="form-control" type="text" name="txtbiayadaftarbmh" id="txtbiayadaftarbmh" />
                                        </div>
                                        <div class="form-group">
                                            <label for="txtbiayadaftarbmh">Biaya BMH</label>
                                            <input class="form-control" type="text" name="txtbiayadaftarbmh" id="txtbiayadaftarbmh" />
                                        </div>
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
        