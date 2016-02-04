
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="form1" name="form1" method="post" action="<?php echo $action;?>" data-toggle="validator" enctype="multipart/form-data">
                                    <div class="form-group col-lg-4">
                                        <label>Periode BMH *</label>
                                        <?php if($record==NULL){
                                            $idaselected=$lastbmh->IDBMH;
                                        }else{
                                            $idaselected=$record->IDBMH;
                                        }
                                        ?>
                                        <select 
                                            class="selectpicker form-control"
                                            data-live-search="true" 
                                            onchange="getBMH(this.value)" 
                                            name="idbmh"
                                            required data-error="Periode BMH harus dipilih"
                                            >
                                            <option value="">Pilih Periode BMH</option>
                                            <?php 
                                                if(isset($dd_bmh_m)) :
                                                    foreach($dd_bmh_m as $key => $val) :
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
                                    <div class="form-group col-lg-4">
                                        <label>Tanggal Pelaksanaan</label>
                                        <input readonly="" class="form-control" type="text" name="pelaksanaan" id="pelaksanaan" value="<?php if($record==NULL){echo $lastbmh->TGLMULAIBMH.' s/d '.$lastbmh->TGLAKHIRBMH;}else{echo $record->bmh->TGLMULAIBMH.' s/d '.$record->bmh->TGLAKHIRBMH;}?>"/>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Biaya BMH</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input readonly="" class="form-control text-right" type="text" name="bayardaftarbmh" id="bayardaftarbmh" value="<?php if($record==NULL){echo $lastbmh->BIAYABMH;}else{echo $record->bmh->BIAYABMH;}?>" data-error="tidak boleh kosong" required>
                                            <span class="input-group-addon">,00</span>
                                        </div>
<!--                                        <input readonly="" class="form-control" type="text" name="bayardaftarbmh" id="bayardaftarbmh" value="<?php if($record==NULL){echo $lastbmh->BIAYABMH;}else{echo $record->bmh->BIAYABMH;}?>"/>-->
                                        <div class='help-block with-errors'></div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Peserta *</label>    
                                            <?php if($record==NULL){
                                                //$idpselected=$lastw->IDW;
                                            }else{
                                                $idpselected=$record->IDPBMH;
                                            }
                                            ?>
                                        <select
                                            class="selectpicker form-control"
                                            data-live-search="true" 
                                            name="idpbmh"
                                            onchange="loadFormPesertaBMH(this.value)"
                                            required data-error="Peserta harus dipilih"
                                            >
                                            <option value="">Pilih Peserta</option>
                                            <option value="baru">Baru</option>
                                            <?php 
                                                if(isset($dd_peserta_bmh_m)) :
                                                    foreach($dd_peserta_bmh_m as $key => $val) :
                                                        if (isset($idpselected) && $key==$idpselected){
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
                                        <div class='help-block with-errors'></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="formPesertaBMH">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary active">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger " >Reset Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                    </div>
                                    <div class="col-lg-6">
                                        *&nbsp;&nbsp; Wajib diisi
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
        