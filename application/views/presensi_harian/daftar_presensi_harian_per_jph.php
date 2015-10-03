            <div class="row">
                <!--<div class="col-lg-12">-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-lg-3">
                                <label>Bulan</label>
                                <select data-live-search="true" class="form-control selectpicker" name="bulan" onchange="showDetailDaftarPresensiHarian(<?php if(isset($idjph)){ echo $idjph;}?>,this.value);" >
                                    <option value="">Pilih Bulan</option>
                                    <?php 
                                        if(isset($monts)) :
                                            foreach($monts as $val) :
                                                if (isset($bulanselected) && $val->BULAN==$bulanselected){
                                                    echo "\t\t\t\t\t\t<option selected='selected' value='$val->BULAN'>$val->BULAN</option>\n";
                                                }
                                                else {
                                                    echo "\t\t\t\t\t\t<option value='$val->BULAN'>$val->BULAN</option>\n";
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
