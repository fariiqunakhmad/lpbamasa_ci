            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">Tambah Baru</a>
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
                                       data-show-export="true">
                                    <thead>
                                        <tr>
                                            <th data-halign="center"    data-sortable="true"    data-align="center" >No.</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >ID</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Tahun</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Periode</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Mulai</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Berakhir</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="right" >Biaya Pendaftaran</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Ketua Pelaksana</th>
                                            <th data-halign="center"    data-sortable="false"   data-align="center" >Control</th>
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
                                            <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->BIAYABMH,2,',','.'); ?></td>
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
