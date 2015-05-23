
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">Add</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">	
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Atas Nama</th>
                                            <th>Jumlah</th>
                                            <th>Petugas</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->TGLTSL; ?></td>
                                            <td><?php echo anchor("pbk/detail/", $row->IDTSL); ?></td>
                                            <td><?php echo $row->TGLTSL; ?></td>
                                            <td><?php echo $row->IDKK; ?></td>
                                            <td><?php echo $row->URAIANTSL; ?></td>
                                            <td><?php echo $row->DKTSL; ?></td>
                                            <td><?php echo anchor("tsl/delete/$row->IDTSL", 'Delete'); ?> | <?php echo anchor("tsl/update/$row->IDTSL", 'Update'); ?></td>
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
           