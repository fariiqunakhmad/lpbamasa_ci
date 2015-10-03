                                                <div class="col-lg-2">No Trans</div>
                                                <div class="col-lg-4">: <?php echo $IDPBK;?></div>
                                                <div class="col-lg-2">Tanggal</div>
                                                <div class="col-lg-4">: <?php echo $TGLPBK;?></div>
                                                <div class="col-lg-2">Mahasiswa</div>
                                                <div class="col-lg-10">: <?php echo $NIM.' '.$NAMAM;?></div>
                                                <div class="col-lg-2">Komponen</div>
                                                <div class="col-lg-10">:</div>
                                                <div class="col-lg-12">
                                                    <div class="table-responsive">
                                                        <table 
                                                            class="table table-bordered"
                                                            id="<?php echo $table;?>"
                                                            data-toggle="table"
                                                            >
                                                            <thead>
                                                                <tr>
                                                                    <th data-halign="center" data-align="center" >No</th>
                                                                    <th data-halign="center">Periode Akademik</th>
                                                                    <th data-halign="center">Nama Komponen</th>
                                                                    <th data-halign="center" data-align="right">Nominal (Rp)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; if(isset($recordskbk)) : foreach($recordskbk as $row) : ?>
                                                                <tr>                                            
                                                                    <td><?php echo $no++; ?></td>
                                                                    <td><?php echo $row->IDPA; ?></td>
                                                                    <td><?php echo $row->kbk->NAMAKBK; ?></td>
                                                                    <td class="right"><?php echo number_format($row->BIAYAKBK,2,',','.'); ?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                                <?php else : ?> 
                                                                <h2>No records were returned.</h2>
                                                                <?php endif; ?>
                                                                <tr>                                            
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><label>Jumlah </label></td>
                                                                    <td><label><?php echo number_format($NOMINALPBK,2,',','.');?></label></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <script>
                                                        $(document).ready(function() {
                                                                $('#<?php echo $table;?>').bootstrapTable();
                                                        });
                                                </script>
