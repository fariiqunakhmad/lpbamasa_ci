            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div id="toolbar">
                            <?php if($useras['id']==2){ ?>
                            <a id="add" class="btn btn-default" href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">
                                <i class="glyphicon glyphicon-pencil"></i> Tambah Baru
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
                               data-show-export="false"
                               data-sort-name="0" 
                               data-sort-order="desc"
                               data-detail-view="true"
                               data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <!--<th data-halign="center"    data-sortable="true"    data-align="center" >No</th>-->
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >ID</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Tanggal Setup</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Bulan</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" data-visible="false">Petugas</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="right" >Gaji</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="right" >Cicilan Kasbon</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="right" >Total </th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" data-visible="false">Wadir </th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >Status </th>
                                    <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                <tr class="odd gradeX">                                            
                                    <!--<td><?php echo $no++; ?></td>-->
                                    <td><?php echo $row->IDGAJI; ?></td>
                                    <td><?php echo $row->kas1->TGLKAS; ?></td>
                                    <td><?php echo $row->BULANGAJI; ?></td>
                                    <td><?php echo $row->pegawai->NAMAP; ?></td>
                                    <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->kas1->NOMINALKAS,2,',','.'); ?></td>
                                    <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->kas2->NOMINALKAS,2,',','.'); ?></td>
                                    <td><?php echo '<div class="pull-left">Rp </div>'.number_format(($row->kas1->NOMINALKAS-$row->kas2->NOMINALKAS),2,',','.'); ?></td>
                                    <td><?php if(isset($row->kas1->NIP) && isset($row->kas2->NIP)){echo '('.$row->kas1->NIP.') '.$row->kas1->pegawai->NAMAP;} ?></td>
                                    <td><?php 
                                            if($row->kas1->NIP!=NULL){
                                                if($row->kas1->STATR==0){
                                                    echo 'S';
                                                } else{
                                                    echo 'B';
                                                }
                                            } else{
                                                if($row->kas1->STATR==0){
                                                    echo 'BS';
                                                } else{
                                                    echo 'T';
                                                }
                                            } ?></td>
                                    <td>
                                        <?php
                                        if($row->kas1->NIP==NULL && $row->kas1->STATR==0){
                                            if($useras['id']==1){
                                                echo ' '.anchor($this->uri->slash_segment(1)."delete/$row->IDGAJI", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                echo ' '.anchor($this->uri->slash_segment(1)."accept/$row->IDGAJI", '<span class="glyphicon glyphicon-ok-sign"></span>');
                                            }
                                            if($useras['id']==2){
                                                echo ' '.anchor($this->uri->slash_segment(1)."delete_app/$row->IDGAJI", '<span class="glyphicon glyphicon-remove"></span>');
                                            }
                                        }
                                        if($row->kas1->NIP!=NULL){
                                            if($useras['id']==1){
                                                echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDGAJI", '<span class="glyphicon glyphicon-print"></span>');                                                    
                                                if($row->kas1->STATR==0){
                                                    echo ' '.anchor($this->uri->slash_segment(1)."delete/$row->IDGAJI", '<span class="glyphicon glyphicon-remove"></span>');   
                                                }
                                            }
                                            if($useras['id']==2){
                                                if($row->kas1->STATR==0){
                                                    echo ' '.anchor($this->uri->slash_segment(1)."slip/$row->IDGAJI", '<span class="glyphicon glyphicon-print"></span>');   
                                                }
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
                        <div class="col-lg-12">
                            <p><label>Keterangan :</label></p>
                            <div class="col-lg-3">
                                <u>Status</u>
                                <li>S  : Disetujui</li>
                                <li>BS : Belum Disetujui</li>
                                <li>B  : Dibatalkan</li>
                                <li>T  : Ditolak</li>
                            </div>
                            <div class="col-lg-3">
                                <u>Kontrol</u>
                                <?php 
                                if($useras['id']==1){
                                    echo '<li><span class="glyphicon glyphicon-ok-sign"></span> : Setujui</li>';
                                    echo '<li><span class="glyphicon glyphicon-remove-sign"></span> : Tolak</li>';
                                    echo '<li><span class="glyphicon glyphicon-remove"></span> : Batalkan</li>';
                                    echo '<li><span class="glyphicon glyphicon-print"></span> : Cetak Nota</li>';
                                }
                                if($useras['id']==2){
                                    echo '<li><span class="glyphicon glyphicon-remove"></span> : Batalkan</li>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
