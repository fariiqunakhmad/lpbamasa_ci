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
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Tanggal</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Status</th>
                                    <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                <tr class="gradeA">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->TGLHK; ?></td>
                                    <td><?php if($row->STATR==0){echo 'Aktif';} else{echo 'Non Aktif';}?></td>
                                    <td>
                                        <?php
                                        if($row->STATR==0){
                                            echo "<a href='".$this->uri->slash_segment(1)."delete/".$row->TGLHK."' class='btn btn-sm btn-danger'>Delete</a>";
                                        }else{
                                            echo "<a href='".$this->uri->slash_segment(1)."update/".$row->TGLHK."' class='btn btn-sm btn-warning'>Aktifkan</a>";
                                        }
                                        ?>
<!--                                                <a href="<?php echo "presensi_harian/index/$row->TGLHK";?>" class="btn btn-sm btn-primary">Detail</a>-->
                                        <!--<a href="<?php echo $this->uri->slash_segment(1)."delete/$row->TGLHK";?>" class="btn btn-sm btn-danger">Delete</a>-->
<!--                                                <a href="<?php echo "presensi_harian/reset/$row->TGLHK";?>" class="btn btn-sm btn-warning">Reset</a>-->
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
