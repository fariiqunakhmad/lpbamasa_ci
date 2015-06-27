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
                                       data-show-pagination-switch="true"     
                                       data-show-export="false">
                                    <thead>
                                        <tr>
                                            <th data-halign="center"    data-sortable="true"    data-align="center" >No.</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >ID</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Tanggal</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Kelompok</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Uraian</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Penyetor/Penerima</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="center" >D/K</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="right" >Nominal (Rp)</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Petugas</th>
                                            <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
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
                                            <td><?php echo number_format($row->NOMINALTSL,2,',','.'); ?></td>
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
