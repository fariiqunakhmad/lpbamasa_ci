            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name="form1" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group">
                                            <label>Peran</label>
                                            <p class="form-control-static"><?php echo $peran->NAMAPERAN;?></p>
                                            <input hidden="" type="text" name="idperan"<?php if($idperan!=NULL){ echo 'value="'.$idperan.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Izin</label>
                                            <select class="selectpicker form-control"
                                                data-live-search="true" 
                                                name="idizin[]"
                                                multiple>
                                                <option value="">Pilih Izin</option>
                                                <?php
                                                    if(isset($dd_izin_m)) :
                                                        foreach($dd_izin_m as $key => $val) :
                                                            echo "\t\t\t\t\t\t<option ";
                                                            foreach ($peran_disable as $value) {if ($key == $value->IDIZIN) {echo 'disabled="disabled"';}}
                                                            echo "value='$key'>$key $val</option>\n";
                                                        endforeach;
                                                    else :
                                                        echo "<h2>No records were returned.</h2>";
                                                    endif;
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                    </form>
                                </div>
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