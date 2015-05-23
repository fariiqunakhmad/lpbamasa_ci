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
                                            <th>Jenis</th>
                                            <th>Tanggal</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="gradeA">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->jenisph->NAMAJPH; ?></td>
                                            <td><?php echo $row->TGLPH; ?></td>
                                            <td>
                                                <a href="<?php echo "detail_presensi_harian/index/$row->IDJPH/$row->TGLPH";?>" class="btn btn-sm btn-primary">Detail</a>
                                                <a href="<?php echo $this->uri->slash_segment(1)."delete/$row->IDJPH/$row->TGLPH";?>" class="btn btn-sm btn-danger">Delete</a>
                                                <a href="<?php echo "detail_presensi_harian/reset/$row->IDJPH/$row->TGLPH";?>" class="btn btn-sm btn-warning">Reset</a>
                                            </td>
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