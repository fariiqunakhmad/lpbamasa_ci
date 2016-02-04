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
                               data-show-export="false"
                               data-detail-view="false"
                               data-detail-formatter="detailFormatter"
                               data-sort-name="0" 
                               data-sort-order="asc"
                               >
                            <thead>
                                <tr>
                                    <th data-halign="center"    data-sortable="true"    data-align="center" >No.</th>
                                    <!--<th data-halign="center"    data-sortable="true"    data-align="left" ></th>-->
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >NIP</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Nama</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Jenis</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Status</th>
                                    <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1; 

                                if(isset($records)) : foreach($records as $row) : 
                                    if(file_exists('assets/images/pegawai/'.$row->NIP.'.jpg')){
                                        $photo='assets/images/pegawai/'.$row->NIP.'.jpg';
                                    }else{
                                        $photo='assets/images/default-avatar-male.jpg';
                                    }?>
                                <tr class="gradeA">
                                    <td><?php echo $no++; ?></td>
                                    <!--<td><img src="<?php echo base_url().$photo;?>" alt="Avatar" style="width:60px; height: 60px;"></td>-->
                                    <td><?php echo  $row->NIP; ?></td>
                                    <td><?php echo anchor($this->uri->slash_segment(1)."detail/$row->NIP",$row->NAMAP); ?></td>
                                    <td>
                                        <?php 
                                        switch ($row->JENISP) {
                                            case 1:
                                                echo 'Dosen';
                                                break;
                                            case 2:
                                                echo 'Non Dosen';
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        switch ($row->STATR) {
                                            case 1:
                                                echo 'Non Aktif';
                                                break;
                                            case 0:
                                                echo 'Aktif';
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($row->STATR==0){
                                            echo anchor($this->uri->slash_segment(1)."delete/$row->NIP", 'Nonaktifkan');
                                            echo ' | ';
                                            echo anchor($this->uri->slash_segment(1)."load_form/$row->NIP", 'Perbarui');
                                        }else{
                                            echo anchor($this->uri->slash_segment(1)."restore/$row->NIP", 'Aktifkan Kembali');
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
