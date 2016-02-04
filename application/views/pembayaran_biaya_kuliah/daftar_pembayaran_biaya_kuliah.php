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
                               data-detail-view="true"
                               data-detail-formatter="detailFormatter"
                               data-sort-name="1" 
                               data-sort-order="desc"
                               >
                            <thead>
                                <tr>
                                    <!--<th data-halign="center" data-sortable="true" data-align="center">No</th>-->
                                    <th data-halign="center" data-sortable="true" data-field="idpbk">ID</th>
                                    <th data-halign="center" data-sortable="true" >Tanggal</th>
                                    <th data-halign="center" data-sortable="true" >Mahasiswa</th>
                                    <th data-halign="center" data-sortable="true" data-align="right">Jumlah</th>
                                    <th data-halign="center" data-sortable="true" >Petugas</th>
                                    <th data-halign="center" data-sortable="true" data-align="left"   data-switchable="false">Status</th>
                                    <th data-halign="center" data-sortable="true" data-align="left"   data-visible="false">Wadir</th>
                                    <th data-halign="center" data-align="center">Kontrol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                <tr>
                                    <!--<td><?php echo $no++; ?></td>-->
                                    <td><?php echo $row->IDPBK; ?></td>
                                    <td><?php echo $row->kas->TGLKAS; ?></td>
                                    <td><?php echo $row->NIM.' '.$row->mahasiswa->NAMAM; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModal" onclick="showDetail('<?php echo $row->IDPBK;?>')"><?php echo '<div class="pull-left">Rp </div>'.number_format($row->kas->NOMINALKAS,2,',','.'); ?> </a>
                                    </td>
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
                                                    echo ' '.anchor($this->uri->slash_segment(1)."accept/$row->IDPBK", '<span class="glyphicon glyphicon-ok-sign"></span>');
                                                } else{
                                                    if($row->STATR==1){
                                                        if($row->kas->STATR==0){
                                                            echo ' '.anchor($this->uri->slash_segment(1)."delete_kas/$row->IDPBK", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                        }
                                                    }
                                                }
                                            }elseif($useras['id']==2){
                                                if($row->STATR==0){
                                                    if($row->kas->STATR==0){
                                                        echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDPBK", '<span class="glyphicon glyphicon-print"></span>');
                                                        if(!isset($row->kas->NIP)){
                                                            if($row->NIP==$userid){
                                                                echo ' '.anchor($this->uri->slash_segment(1)."delete/$row->IDPBK", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                            }
                                                        }else{
                                                            echo ' '.anchor($this->uri->slash_segment(1)."delete_trans/$row->IDPBK", '<span class="glyphicon glyphicon-remove-sign"></span>');
                                                        }
                                                    }
                                                } else{
                                                    if($row->kas->STATR==0){
                                                        if(isset($row->kas->NIP)){
                                                            echo ' '.anchor($this->uri->slash_segment(1)."cancel_delete_trans/$row->IDPBK", '<span class="glyphicon glyphicon-arrow-left"></span>');
                                                            echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDPBK", '<span class="glyphicon glyphicon-print"></span>');
                                                        }
                                                    }else{
                                                        if(!isset($row->kas->NIP)){
                                                            echo ' '.anchor($this->uri->slash_segment(1)."cancel_delete/$row->IDPBK", '<span class="glyphicon glyphicon-arrow-left"></span>');
                                                            echo ' '.anchor($this->uri->slash_segment(1)."nota/$row->IDPBK", '<span class="glyphicon glyphicon-print"></span>');
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
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog" >
                            <div class="modal-dialog">
                                <div  id="cprint" class="modal-content">    
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Pembayaran Biaya Kuliah</h4>
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
                        <!-- /.modal -->
                    </div>
                </div>
            </div>
            <script type="text/javascript">
    
 function showDetail(str) {
    if (str == "") {
        document.getElementById("txtDetail").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtDetail").innerHTML = xmlhttp.responseText;
                var arr = document.getElementsByTagName('script')
                for (var n = 0; n < arr.length; n++)
                    eval(arr[n].innerHTML)//run script inside div
            }
        }
        var host= config.base;
        xmlhttp.open("GET",host+"pembayaran_biaya_kuliah/detail/"+str,true);
        xmlhttp.send();
    }
}


function deleteR(value){
        var host= config.base;
        $.ajax({
            url: host+value,
            success: function (data) {
                        location.reload();
                    }
          });
}
function detailFormatter(index, row) {
    var host= config.base;
    var html;
    html=$.ajax({
        url     : host+"pembayaran_biaya_kuliah/detail/"+row['idpbk'], 
        global: false,
        async:false,
        error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR+' + '+textStatus+' + '+ errorThrown)
                    }
    }).responseText;
    return html;
}
    
      </script>