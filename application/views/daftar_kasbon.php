            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>load_form">Add</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="<?php echo $table;?>">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Pemohon</th>
                                            <th>Ketarangan</th>
                                            <th>Nominal</th>
                                            <th>Cicilan</th>
                                            <th>Status</th>
                                            <th>Petugas</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->IDKB; ?></td>
                                            <td><?php echo $row->TGLKB; ?></td>
                                            <td><?php echo $row->pegawai->NAMAP; ?></td>
                                            <td><?php echo $row->KETERANGANKB; ?></td>
                                            <td><?php echo $row->NOMINALKB; ?></td>
                                            <td><?php echo $row->QTYCICILANKB." kali"; ?></td>
                                            <td>
                                                <?php 
switch ($row->STATKB) {
    case 0:
        echo 'Belum Lunas';
        break;
    case 1:
        echo 'Lunas';
        break;
    default:
        break;
}
                                                ?>
                                            </td>
                                            <td><?php echo $row->peg_pegawai->NAMAP; ?></td>
                                                                    <td><?php echo anchor($this->uri->slash_segment(1)."delete/$row->IDKB", 'Delete'); ?> | <?php echo anchor($this->uri->slash_segment(1)."load_form/$row->IDKB", 'Update'); ?></td>
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
