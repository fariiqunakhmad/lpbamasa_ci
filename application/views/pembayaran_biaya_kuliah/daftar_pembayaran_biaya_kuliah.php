
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">Add</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">	
                                <table class="table table-striped table-bordered table-hover" 
                                       id="<?php echo $table;?>"
                                       data-search="true"
                                       data-show-toggle="true"
                                       data-pagination="true" 
                                       data-page-size="5" 
                                       data-page-list="[5, 10, 20, 50, 100, 200]"
                                       data-show-pagination-switch="true"
                                       >
                                    <thead>
                                        <tr>
                                            <th data-halign="center" data-sortable="true" data-align="center">No</th>
                                            <th data-halign="center" data-sortable="true" >ID</th>
                                            <th data-halign="center" data-sortable="true" >Tanggal</th>
                                            <th data-halign="center" data-sortable="true" >Mahasiswa</th>
                                            <th data-halign="center" data-sortable="true" data-align="right">Jumlah (Rp)</th>
                                            <th data-halign="center" data-sortable="true" >Petugas</th>
                                            <th data-halign="center" data-align="center">Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDPBK; ?></td>
                                            <td><?php echo $row->TGLPBK; ?></td>
                                            <td><?php echo $row->NIM.' '.$row->mahasiswa->NAMAM; ?></td>
                                            <td><?php echo number_format($row->NOMINALPBK,2,',','.'); ?></td>
                                            <td><?php echo $row->pegawai->NAMAP; ?></td>
                                            <td>
                                                <button class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="showDetail(this.value)" value="<?php echo $row->IDPBK;?>">Detail</button>
                                                <div class="btn btn-warning"><?php echo anchor($this->uri->slash_segment(1)."load_form/$row->IDPBK", 'Update'); ?></div>
                                                <div class="btn btn-danger" ><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDPBK", 'Delete'); ?></div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>

                                        <?php else : ?> 
                                        <h2>No records were returned.</h2>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div id="txtDetail"class="modal-dialog"></div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
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
        xmlhttp.open("GET","pembayaran_biaya_kuliah/detail/"+str,true);
        xmlhttp.send();
    }
}
      </script>