            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if($useras['id']==3){
                        echo'<a href="'.base_url().$this->uri->slash_segment(1).'load_form">Tambah Baru</a>';
                    } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table style="font-size: 1" class="table table-bordered table-hover" id="<?php echo $table;?>"
                                       data-toggle="table"
                                       data-search="true"
                                       data-show-toggle="true"
                                       data-show-columns="true"
                                       data-pagination="true" 
                                       data-page-size="5" 
                                       data-page-list="[5, 10, 20, 50, 100, 200]"
                                       data-show-pagination-switch="true"     
                                       data-show-export="true"
                                       data-detail-view="true"
                                       data-detail-formatter="detailFormatter"
                                       data-sort-name="1" 
                                       data-sort-order="desc"
                                       >
                                    
                                    <thead>
                                        <tr>
                                            <!--<th data-halign="center"    data-sortable="true"    data-align="center" >No</th>-->
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >ID</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Tanggal</th>
                                            <?php 
                                                if($useras['id']==1){
                                                    echo '<th data-halign="center"    data-sortable="true"    data-align="left" data-visible="false">Pemohon</th>';
                                                }
                                            ?>                                          
                                            <th data-halign="center"    data-sortable="false"    data-align="left" data-visible="false">Ketarangan</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="right" >Nominal</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Cicilan</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Kelunasan</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" data-visible="false">Wadir </th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Status </th>
                                            <th data-halign="center"    data-sortable="false"   data-align="center" >Kontrol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="odd gradeX">
                                            <!--<td><?php echo $no++; ?></td>-->
                                            <td><?php echo $row->IDKB; ?></td>
                                            <td><?php echo $row->kas->TGLKAS; ?></td>
                                            <?php 
                                            if($useras['id']==1){
                                                echo '<td>'.'('.$row->NIP.') '.$row->pegawai->NAMAP.'</td>';
                                            }?>
                                            <td><?php echo $row->KETERANGANKB; ?></td>
                                            <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->kas->NOMINALKAS,2,',','.'); ?></td>
                                            <td><a data-toggle="modal" data-target="#myModal" onclick="showCicilan('<?php echo $row->IDKB;?>')" ><?php echo $row->QTYCICILANKB." kali"; ?></a></td>
                                            <td>
                                                <?php
                                                switch ($row->STATKB) {
                                                    case 0:
                                                        echo 'BL';
                                                        break;
                                                    case 1:
                                                        echo 'L';
                                                        break;
                                                    default:
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td><?php if(isset($row->kas->NIP)){echo '('.$row->kas->NIP.') '.$row->kas->pegawai->NAMAP;} ?></td>
                                            <td><?php 
                                                    if($row->kas->NIP!=NULL){
                                                        if($row->kas->STATR==0){
                                                            echo 'S';
                                                        } else{
                                                            echo 'B';
                                                        }
                                                    } else{
                                                        if($row->kas->STATR==0){
                                                            echo 'BS';
                                                        } else{
                                                            echo 'T';
                                                        }
                                                    } ?></td>
                                            <td>
                                                <?php
                                                if($row->kas->NIP==NULL && $row->kas->STATR==0){
                                                    echo ' '.anchor($this->uri->slash_segment(1)."load_form/$row->IDKB", '<span class="glyphicon glyphicon-edit"></span>');
                                                    if($useras['id']==1){
                                                        echo ' '.anchor($this->uri->slash_segment(1)."delete/$row->IDKB", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                        echo ' '.anchor($this->uri->slash_segment(1)."accept/$row->IDKB", '<span class="glyphicon glyphicon-ok-sign"></span>');
                                                    }
                                                    if($useras['id']==3){
                                                        echo ' '.anchor($this->uri->slash_segment(1)."delete_app/$row->IDKB", '<span class="glyphicon glyphicon-remove"></span>');
                                                    }
                                                    
                                                }
                                                if($useras['id']==1 && $row->kas->NIP!=NULL){
                                                    echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDKB", '<span class="glyphicon glyphicon-print"></span>');                                                    
                                                    if($row->kas->STATR==0){
                                                        echo ' '.anchor($this->uri->slash_segment(1)."delete/$row->IDKB", '<span class="glyphicon glyphicon-remove"></span>');   
                                                    }
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
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div id="txtDetail"class="modal-dialog">
                                        <div  id="cprint" class="modal-content">    
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Kasbon</h4>
                                            </div>
                                            <div  class="modal-body">
                                                <div id="txtDetail">
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <div class="col-lg-12">
                                    <p><label>Keterangan :</label></p>
                                    <div class="col-lg-3">
                                        <u>Kelunasan</u>
                                        <li>L  : Lunas</li>
                                        <li>BL : Belum Lunas</li>
                                    </div>
                                    <div class="col-lg-3">
                                        <u>Status</u>
                                        <li>S  : Disetujui</li>
                                        <li>BS : Belum Disetujui</li>
                                        <li>B  : Dibatalkan</li>
                                        <li>T  : Ditolak</li>
                                    </div>
                                    <div class="col-lg-3">
                                        <u>Kontrol</u>
                                        <li><span class="glyphicon glyphicon-edit"></span> : Edit</li>
                                        <?php 
                                        if($useras['id']==1){
                                            echo '<li><span class="glyphicon glyphicon-ok-sign"></span> : Setujui</li>';
                                            echo '<li><span class="glyphicon glyphicon-remove-sign"></span> : Tolak</li>';
                                            echo '<li><span class="glyphicon glyphicon-remove"></span> : Batalkan</li>';
                                            echo '<li><span class="glyphicon glyphicon-print"></span> : Cetak Nota</li>';
                                        }
                                        if($useras['id']==3){
                                            echo '<li><span class="glyphicon glyphicon-remove"></span> : Batalkan</li>';
                                        }
                                        ?>
                                    </div>
                                </div>
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
