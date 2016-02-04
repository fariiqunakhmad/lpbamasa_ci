
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Riwayat Pembayaran Biaya Kuliah
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">	
                                <table class="table table-striped table-bordered table-hover" 
                                       id="<?php echo $table;?>"
                                       data-toggle="table"
                                       data-search="true"
                                       data-show-toggle="true"
                                       data-pagination="true" 
                                       data-page-size="5" 
                                       data-page-list="[5, 10, 20, 50, 100, 200]"
                                       data-show-pagination-switch="true"
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
                                            <th data-halign="center" data-sortable="true" >Petugas</th>
                                            <th data-halign="center" data-sortable="true" data-align="right">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr>
                                            <!--<td><?php echo $no++; ?></td>-->
                                            <td><?php echo $row->IDPBK; ?></td>
                                            <td><?php echo $row->kas->TGLKAS; ?></td>
                                            <td><?php echo $row->pegawai->NAMAP; ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#myModal" onclick="showDetail('<?php echo $row->IDPBK;?>')" > <?php echo '<div class="pull-left">Rp </div>'.number_format($row->kas->NOMINALKAS,2,',','.'); ?></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else : ?> 
                                        <h2>No records were returned.</h2>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Kewajiban Biaya Kuliah Belum Terbayar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="<?php echo $table1;?>"
                                       data-toggle="table"
                                       data-search="true"
                                       data-show-toggle="true"
                                       data-pagination="true" 
                                       data-page-size="5" 
                                       data-page-list="[5, 10, 20, 50, 100, 200]"
                                       data-show-pagination-switch="true"
                                       >
                                    <thead>
                                        <tr>
                                            <!--<th data-halign="center"    data-sortable="true"    data-align="center" >No.</th>-->
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Periode Akademik</th>
                                            <!--<th data-halign="center"    data-sortable="true"    data-align="left" >Angkatan</th>-->
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Komponen</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="right">Biaya (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records1)) : foreach($records1 as $row) : ?>
                                        <tr class="gradeA">
                                            <!--<td><?php echo $no++; ?></td>-->
                                            <td><?php echo $row->IDPA; ?></td>
                                            <!--<td><?php echo $row->IDA; ?></td>-->
                                            <td><?php echo $row->kbk->NAMAKBK; ?></td>
                                            <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->BIAYAKBK,2,',','.'); ?></td>

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