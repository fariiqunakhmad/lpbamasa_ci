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
                               data-show-columns="true"
                               data-pagination="true" 
                               data-page-size="5" 
                               data-page-list="[5, 10, 20, 50, 100, 200]"
                               data-show-pagination-switch="true"
                               data-show-export="true"
                               data-detail-view="false"
                               data-detail-formatter="detailFormatter"
                               data-sort-name="1" 
                               data-sort-order="desc"
                               >
                            <thead>
                                <tr>
                                    <!--<th data-halign="center"    data-sortable="true"    data-align="center" >No</th>-->
                                    <th data-halign="center"    data-sortable="true"    data-align="left" >ID</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left">Tanggal</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left">Mahasiswa</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" data-visible="false">Catatan</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left">Wisuda ke</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="right">Biaya</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left">Petugas</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left"   data-switchable="false">Status</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left"   data-visible="false">Wadir</th>
                                    <th data-halign="center"    data-sortable="false"   data-align="center">Kontrol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                <tr class="odd gradeX">                                            
                                    <!--<td><?php echo $no++; ?></td>-->
                                    <td><?php echo $row->IDPW; ?></td>
                                    <td><?php echo $row->kas->TGLKAS; ?></td>
                                    <td><?php echo $row->NIM.' '.$row->mahasiswa->NAMAM; ?></td>
                                    <td><?php echo $row->CATATANPW; ?></td>
                                    <td><?php echo $row->wisuda->PERIODEW; ?></td>
                                    <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->kas->NOMINALKAS,2,',','.'); ?></td>
                                    <td><?php echo $row->NIP.' '.$row->pegawai->NAMAP; ?></td>
                                    <td>
                                        <?php
                                        if($row->STATR==0){
                                            if(isset($row->kas->NIP)){
                                                echo 'SV';
                                            } else{
                                                echo 'SBV';
                                            }
                                        } else{
                                            if(isset($row->kas->NIP) && $row->kas->STATR==1){
                                                echo 'BV';
                                            }else{
                                                echo 'BBV';
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php if(isset($row->kas->NIP)){echo '('.$row->kas->NIP.') '.$row->kas->pegawai->NAMAP;} ?></td>
                                    <td>

                                        <?php
                                            if($useras['id']==1){
                                                if(!isset($row->kas->NIP)){
                                                    echo ' '.anchor($this->uri->slash_segment(1)."accept/$row->IDPW", '<span class="glyphicon glyphicon-ok-sign"></span>');
                                                } else{
                                                    if($row->STATR==1){
                                                        if($row->kas->STATR==0){
                                                            echo ' '.anchor($this->uri->slash_segment(1)."delete_kas/$row->IDPW", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                        }
                                                    }
                                                }
                                            }elseif($useras['id']==2){
                                                if($row->STATR==0){
                                                    if($row->kas->STATR==0){
                                                        echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDPW", '<span class="glyphicon glyphicon-print"></span>');
                                                        if(!isset($row->kas->NIP)){
                                                            if($row->NIP==$userid){
                                                                echo ' '.anchor($this->uri->slash_segment(1)."delete/$row->IDPW", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                            }
                                                        }else{
                                                            echo ' '.anchor($this->uri->slash_segment(1)."delete_trans/$row->IDPW", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                        }
                                                    }
                                                } else{
                                                    if($row->kas->STATR==0){
                                                        if(isset($row->kas->NIP)){
                                                            echo ' '.anchor($this->uri->slash_segment(1)."cancel_delete_trans/$row->IDPW", '<span class="glyphicon glyphicon-arrow-left"></span>');
                                                            echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDPW", '<span class="glyphicon glyphicon-print"></span>');
                                                        }
                                                    }else{
                                                        if(!isset($row->kas->NIP)){
                                                            echo ' '.anchor($this->uri->slash_segment(1)."cancel_delete/$row->IDPW", '<span class="glyphicon glyphicon-arrow-left"></span>');
                                                            echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDPW", '<span class="glyphicon glyphicon-print"></span>');
                                                        }
                                                    }
                                                }
                                            }
                                        ?>

                                    </td>
                                    <!--<td><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDPW/$row->NIM", 'Delete'); ?> | <?php echo anchor($this->uri->slash_segment(1)."load_form/$row->IDPW/$row->NIM", 'Update'); ?></td>-->
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
                                <li>SBV&nbsp;: Sah, Belum Terverifikasi</li>
                                <li>SV&nbsp;&nbsp;&nbsp;: Sah, Terverifikasi</li>
                                <li>BBV&nbsp;: Batal, Belum Terverifikasi</li>
                                <li>BV&nbsp;&nbsp;&nbsp;: Batal, Terverifikasi</li>
                            </div>
                            <div class="col-lg-3">
                                <u>Kontrol</u>
                                <?php 
                                if($useras['id']==1){
                                    echo '<li><span class="glyphicon glyphicon-ok-sign"></span> : Verifikasi</li>';
                                    echo '<li><span class="glyphicon glyphicon-remove"></span> : Batalkan</li>';
                                }
                                if($useras['id']==2){
                                    echo '<li><span class="glyphicon glyphicon-print"></span> : Cetak Nota</li>';
                                    echo '<li><span class="glyphicon glyphicon-arrow-left"></span> : Sahkan Kembali</li>';
                                    echo '<li><span class="glyphicon glyphicon-remove-sign"></span> : Batalkan</li>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
