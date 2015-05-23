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
                                            <label>ID</label>
                                            <input class="form-control" type="text" name="idgaji" id="idgaji" <?php if($record!=NULL){ echo 'value="'.$record->IDGAJI.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Bulan</label>    
                                            <select class="form-control" name="peg_nip" id="peg_nip" <?php if($record!=NULL){ $idaselected=$record->PEG_NIP;}?>>
                                                <option value="">Pilih Bulan</option>
                                                <option value="1" <?php if ($idaselected==1) echo 'selected=""';?>>Januari</option>
                                                <option value="2" <?php if ($idaselected==2) echo 'selected=""';?>>Pebruari</option>
                                                <option value="3" <?php if ($idaselected==3) echo 'selected=""';?>>Maret</option>
                                                <option value="4" <?php if ($idaselected==4) echo 'selected=""';?>>April</option>
                                                <option value="5" <?php if ($idaselected==5) echo 'selected=""';?>>Mei</option>
                                                <option value="6" <?php if ($idaselected==6) echo 'selected=""';?>>Juni</option>
                                                <option value="7" <?php if ($idaselected==7) echo 'selected=""';?>>Juli</option>
                                                <option value="8" <?php if ($idaselected==8) echo 'selected=""';?>>Agustus</option>
                                                <option value="9" <?php if ($idaselected==9) echo 'selected=""';?>>September</option>
                                                <option value="10" <?php if ($idaselected==10) echo 'selected=""';?>>Oktober</option>
                                                <option value="11" <?php if ($idaselected==11) echo 'selected=""';?>>November</option>
                                                <option value="12" <?php if ($idaselected==12) echo 'selected=""';?>>Desember</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input class="form-control" type="text" name="tahungaji" id="tahungaji" <?php if($record!=NULL){ echo 'value="'.$record->TAHUNGAJI.'"' ;}?>>
                                        </div>
                                        
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Generate</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
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