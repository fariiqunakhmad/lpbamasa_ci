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
                                            <label>Bulan</label>    
                                            <input type="month" class="form-control" name="peg_nip" id="peg_nip" <?php if($record!=NULL){ $idaselected=$record->PEG_NIP;}?>>
                                        </div>
                                                                                
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Generate</button>
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