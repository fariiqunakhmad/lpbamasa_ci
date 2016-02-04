                                                <div class="col-lg-12">Komponen Gaji Pegawai</div>

                                                <div class="col-lg-12">
                                                    <div class="table-responsive">
                                                        <table 
                                                            class="table table-bordered"
                                                            id="<?php echo $table;?>"
                                                            data-toggle="table">
                                                            
                                                            <thead>
                                                                <tr>
                                                                    <th data-halign="center" data-align="center" data-falign="center">No</th>
                                                                    <th data-halign="center">Komponen</th>
                                                                    <th data-halign="center" data-align="right">Gaji Satuan</th>
                                                                    <th data-halign="center" data-align="center">Qty</th>
                                                                    <th data-halign="center" data-align="right" data-falign="right">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; $jml=0; if(isset($recordskgp)) : foreach($recordskgp as $row) : ?>
                                                                <tr>                             
                                                                    <td><?php echo $no++;//echo $row->IDKGDP; ?></td>
                                                                    <td><?php echo $row->kg->NAMAKG; ?></td>
                                                                    <td class="right"><?php echo '<div class="pull-left">Rp </div>'.number_format($row->GAJISATUANDP,2,',','.'); ?></td>
                                                                    <td><?php echo $row->QTYDP; ?></td>
                                                                    <td class="right"><?php echo '<div class="pull-left">Rp </div>'.number_format($row->SUBTOTALDP,2,',','.'); $jml+=$row->SUBTOTALDP;?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                                <?php else : ?> 
                                                                No records were returned.
                                                                <?php endif; ?>
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="4" class="text-center"><b>Jumlah </b></td>
                                                                    <td><b><?php echo '<div class="pull-left">Rp </div><div class="pull-right">'.number_format($jml,2,',','.').'</div>';?></b></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <script>
                                                        $(document).ready(function() {
                                                                $('#<?php echo $table;?>').bootstrapTable();
                                                        });
                                                </script>

