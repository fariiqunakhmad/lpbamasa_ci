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
                                            <label>Tahun</label>
                                            <input autofocus="" class="form-control" type="text" name="txttahunbmh" id="txttahunbmh" <?php if($record!=NULL){ echo 'value="'.$record->TAHUNBMH.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Periode</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtperiodebmh" id="txtperiodebmh1" value="1" <?php if($record!=NULL && $record->PERIODEBMH==1){ echo 'checked';}?>>1 (_ s/d _)
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtperiodebmh" id="txtperiodebmh2" value="2" <?php if($record!=NULL && $record->PERIODEBMH==2){ echo 'checked';}?>>2 (_ s/d _)
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Mulai</label>
                                            <input class="form-control" type="date" name="txttglmulaibmh" id="txttglmulaibmh" <?php if($record!=NULL){ echo 'value="'.$record->TGLMULAIBMH.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Berakhir</label>
                                            <input class="form-control" type="date" name="txttglakhirbmh" id="txttglakhirbmh" <?php if($record!=NULL){ echo 'value="'.$record->TGLAKHIRBMH.'"' ;}?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya</label>
                                            <input class="form-control" type="text" name="txtbiayabmh" id="txtbiayabmh" <?php if($record!=NULL){ echo 'value="'.$record->BIAYABMH.'"' ;}?>>
                                        </div>
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
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