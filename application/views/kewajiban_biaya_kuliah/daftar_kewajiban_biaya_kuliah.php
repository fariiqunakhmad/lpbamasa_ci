            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div id="toolbar">
                            <?php if($useras['id']==1){ ?>
                            <a id="add" class="btn btn-default" href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">
                                <i class="glyphicon glyphicon-pencil"></i> Setup
                            </a>
                            <?php } ?>
                        </div>
                        <table class="table table-striped table-bordered table-hover" 
                               id="<?php echo $table;?>"
                               data-toolbar="#toolbar"
                               data-toggle="table"
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
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Periode Akademik</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Angkatan</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >NIM</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Nama Mahasiswa</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Komponen</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="right" >Biaya (Rp)</th>
                                    <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
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
                                    <td><?php echo number_format($row->BIAYAKBK,2,',','.'); ?></td>
                                    <td><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDKBK", 'Delete'); ?> </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else : ?> 
                                <h2>No records were returned.</h2>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
