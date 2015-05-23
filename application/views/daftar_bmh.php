            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">Add</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="<?php echo $table;?>">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID</th>
                                            <th>Tahun</th>
                                            <th>Periode</th>
                                            <th>Mulai</th>
                                            <th>Berakhir</th>
                                            <th>Biaya</th>
                                            <th>Ketua Pelaksana</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="gradeA">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDBMH; ?></td>
                                            <td><?php echo $row->TAHUNBMH; ?></td>
                                            <td><?php echo $row->PERIODEBMH; ?></td>
                                            <td><?php echo $row->TGLMULAIBMH; ?></td>
                                            <td><?php echo $row->TGLAKHIRBMH; ?></td>
                                            <td><?php echo $row->BIAYABMH; ?></td>
                                            <td><?php echo $row->pegawai->NAMAP; ?></td>
                                            <td><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDBMH", 'Delete'); ?> | <?php echo anchor($this->uri->slash_segment(1)."load_form/$row->IDBMH", 'Update'); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else : ?> 
                                        <h2>No records were returned.</h2>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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
