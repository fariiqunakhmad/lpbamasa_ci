                            <div class="well col-lg-12">
                                <h4>Peserta Baru</h4>
                                <form id="form1" name="form1">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ID Peserta (NIK) *</label>
                                            <input class="form-control" type="text" name="idpbmhbaru" required placeholder="No KTP/SIM" data-error="ID peserta tidak boleh kosong"/>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Peserta *</label>
                                            <input class="form-control" type="text" name="namapbmh" required data-error="Nama tidak boleh kosong"/>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat/Tanggal Lahir *</label>
                                            <div class="input-group" required data-error="Tempat dan tanggal lahir tidak boleh kosong">
                                                <select data-live-search="true" 
                                                        class="selectpicker form-control" 
                                                        name="idk"
                                                        required data-error="Tempat lahir harus dipilih dan tanggal lahir tidak boleh kosong"
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
                                                <span class="input-group-addon">,</span>
                                                <input class="form-control" type="date" name="tlpbmh" required data-error="Tempat lahir harus dipilih dan tanggal lahir tidak boleh kosong"/>
                                            </div>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin *</label>
                                            <div class="form-control-static">
                                                <input type="radio" name="jkpbmh" value="l" required data-error="Jenis kelamin harus dipilih">Laki-laki
                                                <input type="radio" name="jkpbmh" value="p" required data-error="Jenis kelamin harus dipilih">Perempuan
                                            </div>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Alamat *</label>
                                            <input class="form-control" type="text" name="alamatpbmh" required data-error="Alamat tidak boleh kosong"/>
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota *</label>
                                            <select data-live-search="true" 
                                                    class="selectpicker form-control"
                                                    name="kot_idk"
                                                    required data-error="Kota harus dipilih">
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
                                            <div class='help-block with-errors'></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txttlppbmh">Telp</label>
                                            <input class="form-control" type="tel" name="tlppbmh" pattern="^[0-9\-\+\ \(\)]{9,17}$"/>
                                            <div class='help-block with-errors'></div>
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
