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
                                            <th>Periode Akademik</th>
                                            <th>Angkatan</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Komponen</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="gradeA">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDPA; ?></td>
                                            <td><?php echo $row->IDA; ?></td>
                                            <td><?php echo $row->NIM; ?></td>
                                            <td><?php echo $row->mahasiswa->NAMAM; ?></td>
                                            <td><?php echo $row->kbk->NAMAKBK; ?></td>
                                            <td><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDKBK", 'Delete'); ?> </td>
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