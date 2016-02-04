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
                                    <th data-halign="center"    data-sortable="true"    data-align="center" >Status</th>
                                    <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                <tr class="gradeA">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->IDKK; ?></td>
                                    <td><?php echo $row->NAMAKK; ?></td>
                                    <td><?php if($row->STATR==0){echo 'Aktif';}else{echo 'Non Aktif';} ?></td>
                                    <td>
                                        <?php
                                        if($row->STATR==0){
                                            echo anchor($this->uri->slash_segment(1)."delete/$row->IDKK", 'Delete');
                                            echo " | ";
                                            echo anchor($this->uri->slash_segment(1)."load_form/$row->IDKK", 'Update');
                                        }else{
                                            echo anchor($this->uri->slash_segment(1)."restore/$row->IDKK", 'Aktifkan Kembali');
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
