            <div class="row">
                <!--<div class="col-lg-12">-->
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">Add</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-lg-3">
                                <label>Kelas Mata Kuliah</label>
                                <select data-live-search="true" class="form-control selectpicker" name="bulan" onchange="showDetailDaftarPresensiMengajar(this.value);" >
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
                            <div class="col-lg-12" id="detail"></div>
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                <!--</div>-->
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
