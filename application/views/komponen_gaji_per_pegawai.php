            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Pegawai</label>
                                <select class="selectpicker form-control"
                                    data-live-search="true" 
                                    onchange="showDetail(this.value)" 
                                    name="nim" 
                                    >
                                    <option value="">Pilih Pegeawai</option>
                                    <?php
                                        if(isset($dd_pegawai_m)) :
                                            foreach($dd_pegawai_m as $key => $val) :
                                                if (isset($nimselected) && $key==$nimselected){
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
                            <div id="detail" class="form-group"></div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
