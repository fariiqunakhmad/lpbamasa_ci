            <div class="row">
                <div class="form-group col-lg-12">
                    <label>Kelas Mata Kuliah</label>
                    <select data-live-search="true" class="form-control selectpicker" id="bulan" name="bulan" onchange="showDetailDaftarPresensiMengajar(this.value);" >
                        <option value="">Pilih Kelas</option>
                        <?php 
                            if(isset($dd_kelas_mk_m)) :
                                foreach($dd_kelas_mk_m as $key =>$val) :
                                    if (isset($kmkselected) && $key==$kmkselected){
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
                <div class="col-lg-12" id="detail">
                </div>
            </div>
            <!-- /.row -->
