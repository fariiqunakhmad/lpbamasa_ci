                            <div class="form-group col-lg-3">
                                <label>Jenis Pegawai</label>
                                <p class="form-control-static"><?php if($pegawai->JENISP ==1 ){echo 'Dosen';} else{echo 'Non Dosen';}?></p>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Jabatan</label>
                                <p class="form-control-static"><?php echo $pegawai->jabatan->NAMAJAB;?></p>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Masa Abdi</label>
                                <p class="form-control-static"><?php echo $ma.' tahun';?></p>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Jarak Rumah</label>
                                <p class="form-control-static"><?php echo '> '.$pegawai->jarak_rumah->JARAKMINJR.' km';?></p>
                            </div>
                            <label>Komponen Gaji</label>&nbsp;&nbsp;<button class="btn btn-xs btn-primary" onclick="showFormI(<?php echo $nip;?>,'')"><span class="glyphicon glyphicon-plus" ></span></button>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="<?php echo $table;?>"
                                       data-toggle="table"
                                       data-search="false"
                                       data-show-toggle="false"
                                       data-pagination="false" 
                                       data-page-size="5" 
                                       data-page-list="[5, 10, 20, 50, 100, 200]"
                                       data-show-pagination-switch="false"     
                                       data-show-export="false">
                                    <thead>
                                        <tr>
                                            <th data-halign="center"    data-sortable="true"    data-align="center" >No.</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >ID</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Nama Komponen</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="right" >Gaji Satuan</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left" >Status</th>
                                            <th data-halign="center"    data-sortable="false"    data-align="center" >Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records_kgp)) : foreach($records_kgp as $row) : ?>
                                        <tr class="gradeA">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDKGP; ?></td>
                                            <td><?php echo $row->kg->NAMAKG; ?></td>
                                            <td><?php echo '<div class="pull-left">Rp </div><div class="pull-right">'.number_format($row->GAJISATUAN,2,',','.').'</div>'; ?></td>
                                            <td><?php if($row->STATR){echo 'Non Aktif';}else{echo 'Aktif';} ?></td>
                                            <td>
                                                <?php if($row->STATR){?>
                                                    <a onclick="act('<?php echo $row->NIP;?>','<?php echo $row->IDKGP;?>')">Aktifkan</a> |
                                                <?php } else {?>
                                                    <a onclick="del('<?php echo $row->NIP;?>','<?php echo $row->IDKGP;?>')">Non Aktifkan</a> |
                                                <?php } ?>
                                                <a onclick="showFormU('<?php echo $row->NIP;?>','<?php echo $row->IDKGP;?>')">Update</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else : ?> 
                                        <h2>No records were returned.</h2>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.row (nested) -->
<script>
    $(document).ready(function() {
        $('#<?php echo $table;?>').bootstrapTable();
    });
</script>