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
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Nama</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Tempat/Tanggal Lahir</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >JK</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Alamat</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Telepon</th>
                                            <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="odd gradeX">                                            
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDPBMH; ?></td>
                                            <td><?php echo $row->NAMAPBMH; ?></td>
                                            <td><?php echo $row->kota_lahir->NAMAK.', '.$row->TLPBMH; ?></td>
                                            <td><?php if($row->JKPBMH=='l'){ echo 'Laki-laki';} elseif($row->JKPBMH=='p'){echo 'Perempuan';} ?></td>
                                            <td><?php echo $row->ALAMATPBMH.', '.$row->kota->NAMAK ; ?></td>
                                            <td><?php echo $row->TLPPBMH; ?></td>
                                            <td><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDPBMH", 'Delete'); ?> | <?php echo anchor($this->uri->slash_segment(1)."load_form/$row->IDPBMH", 'Update'); ?></td>
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
