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
                                            <th>Tanggal</th>
                                            <th>Kelompok</th>
                                            <th>Uraian</th>
                                            <th>Penyetor/Penerima</th>
                                            <th>D/K</th>
                                            <th>Nominal</th>
                                            <th>Petugas</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="odd gradeX">                                            
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDTSL; ?></td>
                                            <td><?php echo $row->TGLTSL; ?></td>
                                            <td><?php echo $row->kk->NAMAKK; ?></td>
                                            <td><?php echo $row->URAIANTSL; ?></td>
                                            <td><?php echo $row->peg_pegawai->NAMAP; ?></td>
                                            <td><?php echo $row->DKTSL; ?></td>
                                            <td><?php echo $row->NOMINALTSL; ?></td>
                                            <td><?php echo $row->pegawai->NAMAP; ?></td>
                                            <td><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDTSL", 'Delete'); ?> | <?php echo anchor($this->uri->slash_segment(1)."load_form/$row->IDTSL", 'Update'); ?></td>
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
