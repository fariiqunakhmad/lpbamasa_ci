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
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>NIM</th>
                                            <th>Catatan</th>
                                            <th>Periode Wisuda</th>
                                            <th>Biaya</th>
                                            <th>Pegawai</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="odd gradeX">                                            
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDPW; ?></td>
                                            <td><?php echo $row->TGLPW; ?></td>
                                            <td><?php echo $row->mahasiswa->NAMAM; ?></td>
                                            <td><?php echo $row->CATATANPW; ?></td>
                                            <td><?php echo $row->IDW; ?></td>
                                            <td><?php echo $row->BAYARPW; ?></td>
                                            <td><?php echo $row->pegawai->NAMAP; ?></td>
                                            <td><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDPW/$row->NIM", 'Delete'); ?> | <?php echo anchor($this->uri->slash_segment(1)."load_form/$row->IDPW/$row->NIM", 'Update'); ?></td>
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
