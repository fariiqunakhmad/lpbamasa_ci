                                                <div class="col-lg-12">Komponen Cicilan Kasbon</div>

                                                <div class="col-lg-12">
                                                    <div class="table-responsive">
                                                        <table 
                                                            class="table table-bordered"
                                                            id="<?php echo $table;?>"
                                                            data-toggle="table">
                                                            
                                                            <thead>
                                                                <tr>
                                                                    <th data-halign="center" data-align="center" >No</th>
                                                                    <th data-halign="center" data-align="center" data-falign="center">IDKB</th>
                                                                    <th data-halign="center" data-align="right" data-falign="right" >NOMINAL</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; $jml=0; if(isset($recordsckp)) : foreach($recordsckp as $row) : ?>
                                                                <tr>
                                                                    <td><?php echo $no++; ?></td>
                                                                    <td><?php echo $row->IDKB; ?></td>
                                                                    <td class="right"><?php echo '<div class="pull-left">Rp </div>'.number_format($row->NOMINALCK,2,',','.'); $jml+=$row->NOMINALCK;?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                                <?php else : ?> 
                                                                No records were returned.
                                                                <?php endif; ?>
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="2" class="text-center"><b>Jumlah </b></td>
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

