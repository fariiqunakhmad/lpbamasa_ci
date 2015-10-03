
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if($useras['id']==2){
                        echo'<a href="'.base_url().$this->uri->slash_segment(1).'load_form">Tambah Baru</a>';
                    } 
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">	
                                <table class="table table-striped table-bordered table-hover" id="<?php echo $table;?>"
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
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >No Pendaftaran</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Tanggal</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Peserta</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >BMH</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="right" >Biaya</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Petugas</th>
                                            <th data-halign="center" data-sortable="true" data-align="left"   data-switchable="false">Status</th>
                                            <th data-halign="center" data-sortable="true" data-align="left"   data-visible="false">Wadir</th>
                                            <th data-halign="center" data-align="center">Kontrol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($records)) : foreach($records as $key => $row) : ?>
                                        <tr >
                                            <!--<td><?php echo $key+1; ?></td>-->
                                            <td><?php echo $row->IDDAFTARBMH; ?></td>
                                            <td><?php echo $row->kas->TGLKAS; ?></td>
                                            <td><?php echo $row->IDPBMH.' '.$row->peserta_bmh->NAMAPBMH; ?></td>
                                            <td><?php echo $row->IDBMH; ?></td>
                                            <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->kas->NOMINALKAS,2,',','.'); ?></td>
                                            <td><?php echo $row->pegawai->NAMAP; ?></td><td>
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
                                                            echo ' '.anchor($this->uri->slash_segment(1)."accept/$row->IDDAFTARBMH", '<span class="glyphicon glyphicon-ok-sign"></span>');
                                                        } else{
                                                            if($row->STATR==1){
                                                                if($row->kas->STATR==0){
                                                                    echo ' '.anchor($this->uri->slash_segment(1)."delete_kas/$row->IDDAFTARBMH", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                                }
                                                            }
                                                        }
                                                    }elseif($useras['id']==2){
                                                        if($row->STATR==0){
                                                            if($row->kas->STATR==0){
                                                                echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDDAFTARBMH", '<span class="glyphicon glyphicon-print"></span>');
                                                                if(!isset($row->kas->NIP)){
                                                                    if($row->NIP==$userid){
                                                                        echo ' '.anchor($this->uri->slash_segment(1)."delete/$row->IDDAFTARBMH", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                                    }
                                                                }else{
                                                                    echo ' '.anchor($this->uri->slash_segment(1)."delete_trans/$row->IDDAFTARBMH", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                                }
                                                            }
                                                        } else{
                                                            if($row->kas->STATR==0){
                                                                if(isset($row->kas->NIP)){
                                                                    echo ' '.anchor($this->uri->slash_segment(1)."cancel_delete_trans/$row->IDDAFTARBMH", '<span class="glyphicon glyphicon-arrow-left"></span>');
                                                                    echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDDAFTARBMH", '<span class="glyphicon glyphicon-print"></span>');
                                                                }
                                                            }else{
                                                                if(!isset($row->kas->NIP)){
                                                                    echo ' '.anchor($this->uri->slash_segment(1)."cancel_delete/$row->IDDAFTARBMH", '<span class="glyphicon glyphicon-arrow-left"></span>');
                                                                    echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDDAFTARBMH", '<span class="glyphicon glyphicon-print"></span>');
                                                                }
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
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          