            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">Tambah</a>
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
                                            <th data-halign="center"    data-sortable="true"    data-align="right" >Masa Abdi Minimal</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="right" >Tunjangan Abdi</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="center" >Status</th>
                                            <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="gradeA">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDMA; ?></td>
                                            <td><?php echo $row->TAHUNMINMA.' Tahun'; ?></td>
                                            <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->NOMINALTA,2,',','.'); ?></td>
                                            <td><?php if($row->STATR==0){echo 'Aktif';}else{echo 'Non Aktif';} ?></td>
                                            <td>
                                                <?php
                                                if($row->STATR==0){
                                                    echo anchor($this->uri->slash_segment(1)."delete/$row->IDMA", 'Delete');
                                                    echo " | ";
                                                    echo anchor($this->uri->slash_segment(1)."load_form/$row->IDMA", 'Update');
                                                }else{
                                                    echo anchor($this->uri->slash_segment(1)."restore/$row->IDMA", 'Aktifkan Kembali');
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
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
