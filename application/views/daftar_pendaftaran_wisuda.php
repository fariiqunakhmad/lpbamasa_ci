            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">Add</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="<?php echo $table;?>"
                                       data-search="true"
                                       data-show-toggle="true"
                                       data-pagination="true" 
                                       data-page-size="5" 
                                       data-page-list="[5, 10, 20, 50, 100, 200]"
                                       data-show-pagination-switch="true">
                                    <thead>
                                        <tr>
                                            <th data-halign="center"    data-sortable="true"    data-align="center" >No</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >ID</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left">Tanggal</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left">NIM</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left">Catatan</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left">Wisuda ke</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="right">Biaya</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left">Pegawai</th>
                                            <th data-halign="center"    data-sortable="false"   data-align="center">Control</th>
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
                                            <td><?php echo $row->wisuda->PERIODEW; ?></td>
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
