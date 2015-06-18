                            <div class="well col-lg-12">
                                <h4>Peserta Baru</h4>
                                <form id="form1" name="form1">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ID Peserta</label>
                                            <input class="form-control" type="text" name="idpbmhbaru" />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Peserta</label>
                                            <input class="form-control" type="text" name="namapbmh" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <select data-live-search="true" 
                                                    class="selectpicker form-control" 
                                                    name="idk"
                                                    >
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
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tlpbmh" />  
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="form-control-static">
                                                <input type="radio" name="jkpbmh" value="l">Laki-laki
                                                <input type="radio" name="jkpbmh" value="p">Perempuan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" type="text" name="alamatpbmh" />
                                        </div>
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <select data-live-search="true" 
                                                    class="selectpicker form-control"
                                                    name="kot_idk">
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
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="txttlppbmh">Telp</label>
                                            <input class="form-control" type="text" name="tlppbmh" />
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>    
                                            <select data-live-search="true" 
                                                    class="selectpicker form-control"
                                                    name="idj" >
                                                <option value="">Pilih Pekerjaan</option>
                                                <?php 
                                                if(isset($dd_pekerjaan_m)) :
                                                    foreach($dd_pekerjaan_m as $key => $val) :
                                                        if (isset($idaselected) && $key==$idaselected){
                                                            echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$val</option>\n";
                                                        }
                                                        else {
                                                            echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
                                                        }
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>                                        
