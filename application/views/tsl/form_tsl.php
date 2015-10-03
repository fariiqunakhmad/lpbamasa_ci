            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form name="form1" method="post" action="<?php echo $action; ?>">
                                    <div class="form-group col-lg-12">
                                        <label>Uraian</label>
                                        <input class="form-control" type="text" name="uraiantsl" id="uraiantsl" <?php if($record!=NULL){ echo 'value="'.$record->URAIANTSL.'"' ;}?> required="">
                                    </div>
                                    <div class="form-group col-lg-5">
                                        <label>Kelompok</label>
                                        <select data-live-search="true" class="selectpicker form-control" name="idkk" id="idkk" <?php if($record!=NULL){ echo ''; $idaselected=$record->kas->IDKK;}?> required="" >
                                            <option value="">Pilih Kelompok</option>
<?php 
if(isset($dd_kk_m)) :
    foreach($dd_kk_m as $key => $val) :
        if (isset($idaselected) && $key==$idaselected){
            echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$val</option>\n";
        }
        else {
            if($key=='02' || $key=='06' || $key=='07'){
                echo "\t\t\t\t\t\t<option disabled=\"disabled\" value='$key'>$val</option>\n";
            }else{
                echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
            }
        }
    endforeach;
else :
    echo "<h2>No records were returned.</h2>";
endif;
?>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <label>D/K</label>
                                        <div>
                                            <input type="radio" name="dktsl" id="dktsl" value="1" <?php if($record!=NULL && $record->kas->DKKAS==1){ echo 'checked';}?> required="">Debet &nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                            <input type="radio" name="dktsl" id="dktsl" value="2" <?php if($record!=NULL && $record->kas->DKKAS==2){ echo 'checked';}?> required="">Kredit
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-5">
                                        <label>Nominal</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp.</span>
                                            <input class="form-control" type="text" name="nominaltsl" id="nominaltsl" <?php if($record!=NULL){ echo 'value="'.$record->kas->NOMINALKAS.'"' ;}?> required="">
                                            <span class="input-group-addon">,00</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Reset Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
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