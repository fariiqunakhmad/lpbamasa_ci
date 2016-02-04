            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div id="toolbar">
                            <?php if($useras['id']==1){ ?>
                            <a id="add" class="btn btn-default" href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">
                                <i class="glyphicon glyphicon-pencil"></i> Tambah Baru
                            </a>
                            <?php } ?>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="<?php echo $table;?>"
                               data-toolbar="#toolbar"
                               data-toggle="table"
                               data-search="true"
                               data-show-toggle="true"
                               data-show-columns="true"
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
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Wisuda ke</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Ketua Pelaksana</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Tempat</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="right" >Biaya</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="center" data-visible="false">Status</th>
                                    <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                <tr class="gradeA">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->IDW; ?></td>
                                    <td><?php echo $row->TGLW; ?></td>
                                    <td><?php echo $row->PERIODEW; ?></td>
                                    <td><?php echo $row->pegawai->NAMAP; ?></td>
                                    <td><?php echo $row->TEMPATW; ?></td>
                                    <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->BIAYAW,2,',','.'); ?></td>
                                    <td><?php if($row->STATR==0){echo 'Aktif';}else{echo 'Non Aktif';} ?></td>
                                    <td>
                                        <?php
                                        if($row->STATR==0){
                                            echo anchor($this->uri->slash_segment(1)."delete/$row->IDW", 'Delete');
                                            echo " | ";
                                            echo anchor($this->uri->slash_segment(1)."load_form/$row->IDW", 'Update');
                                        }else{
                                            echo anchor($this->uri->slash_segment(1)."restore/$row->IDW", 'Aktifkan Kembali');
                                        }
                                        ?>
                                    </td>
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
