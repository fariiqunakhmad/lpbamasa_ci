                            <div class="table-responsive">
                                <div id="toolbar">
                                    <?php if($useras['id']==2){ ?>
                                    <a id="add" class="btn btn-default" href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form/<?php echo $kmk->IDKMK; ?>">
                                        <i class="glyphicon glyphicon-pencil"></i> Tambah Baru
                                    </a>
                                    <?php } ?>
                                </div>
                                <table
                                       class="table table-striped table-bordered table-hover" 
                                       id="<?php echo $table;?>"
                                       data-toggle="table"
                                       data-toolbar="#toolbar"
                                       data-search="true"
                                       data-show-toggle="true"
                                       data-show-columns="false"
                                       data-pagination="true" 
                                       data-page-size="5" 
                                       data-page-list="[5, 10, 20, 50, 100, 200]"
                                       data-show-pagination-switch="true"     
                                       data-show-export="false"
                                       data-sort-name="1" 
                                       data-sort-order="desc">
                                    <thead>
                                        <tr>
                                            <th data-halign="center"    data-sortable="true"    data-align="center">Pertemuan</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left">Tanggal</th>
                                            <th data-halign="center"    data-sortable="true"    data-align="left">Pengajar</th>
                                            <th data-halign="center"    data-sortable="false"   data-align="center" <?php if($useras['id']!=2){echo 'data-visible="false"';}?>>Kontrol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($records)) : foreach($records as $val) : ?>
                                        <tr>
                                            <td><?php echo $val->PERTEMUAN; ?></td>
                                            <td><?php echo $val->TGLMENGAJAR; ?></td>
                                            <td><?php echo $val->NIP.' '.$val->pegawai->NAMAP; ?></td>
                                            <td>
                                                <?php echo ' '.anchor($this->uri->slash_segment(1)."load_form/$val->IDKMK/$val->PERTEMUAN", '<span class="glyphicon glyphicon-pencil"></span>');?>
                                                <?php echo ' '.anchor($this->uri->slash_segment(1)."delete/$val->IDKMK/$val->PERTEMUAN", '<span class="glyphicon glyphicon-remove"></span>');?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>                         
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.row (nested) -->
<script>
    $(document).ready(function() {
        $('#<?php echo $table;?>').bootstrapTable({});
    });
</script>          