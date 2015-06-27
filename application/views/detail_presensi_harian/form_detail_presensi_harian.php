            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <form name="form1" method="post" action="<?php echo $action; ?>">
                                <div class="col-lg-2">
                                    <label>Tanggal</label>
                                </div>
                                <div class="col-lg-4">
                                    <?php echo ': '.$this->uri->segment(4);?>
                                </div>
                                <div class="col-lg-2">
                                    <label>Jenis Presensi</label>
                                </div>
                                <div class="col-lg-4">
                                    <?php 
                                    if($this->uri->segment(3)==1){
                                        echo ': Piket Dosen';
                                    } elseif ($this->uri->segment(3)==2) {
                                        echo ': Pegawai';
                                    }
                                    ?>
                                </div>
                                <input hidden="true" type="text" name="tglph" id="tglph" value='<?php echo $this->uri->segment(4);?>'>
                                <input hidden="true" type="text" name="idjph" id="idjph" value='<?php echo $this->uri->segment(3);?>'>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Hadir</th>
                                                <th>Sakit</th>
                                                <th>Izin</th>
                                                <th>Alpha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; if(isset($records_pegawai)) : foreach($records_pegawai as $row) : ?>
                                            <tr class="gradeA">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row->NIP; ?><input type="text" name="nip[<?php echo $row->NIP; ?>]" value="<?php echo $row->NIP; ?>" hidden=""></td>
                                                <td><?php echo $row->NAMAP; ?></td>
                                                <td><input name="ketph[<?php echo $row->NIP; ?>]" type="radio" value="h"></td>
                                                <td><input name="ketph[<?php echo $row->NIP; ?>]" type="radio" value="s"></td>
                                                <td><input name="ketph[<?php echo $row->NIP; ?>]" type="radio" value="i"></td>
                                                <td><input name="ketph[<?php echo $row->NIP; ?>]" type="radio" value="a"></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else : ?> 
                                            <h2>No records were returned.</h2>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
                                <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->