            <div id="coba" class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">Add</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="<?php echo $table;?>" class="table table-striped table-bordered table-hover" 
                                       data-search="true"
                                       data-show-toggle="true"
                                       data-pagination="true" 
                                       data-page-size="5" 
                                       data-page-list="[5, 10, 20, 50, 100, 200]"
                                       data-show-pagination-switch="true"     
                                       data-show-export="true"
                                       >
                                    <thead>
                                        <tr>
                                            <th data-halign="center" data-sortable="true" data-align="center">No.</th>
                                            <th data-halign="center" data-sortable="true">ID</th>
                                            <th data-halign="center" data-sortable="true">Nama</th>
                                            <th data-halign="center" data-sortable="true" data-align="right" >Tunjangan</th>
                                            <th data-halign="center" data-align="center">Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDJAB; ?></td>
                                            <td><?php echo $row->NAMAJAB; ?></td>
                                            <td><?php echo $row->NOMINALTJ; ?></td>
                                            <td><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDJAB", 'Delete'); ?> | <?php echo anchor($this->uri->slash_segment(1)."load_form/$row->IDJAB", 'Update'); ?></td>
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
            <button id="print" class="btn btn-default" onclick="$('#coba').tableExport({type:'pdf',escape:'false'});">
            <i class="glyphicon glyphicon-remove"></i> Print
        </button>
