
                                            <div class="form-group">
                                                <label >Komponen Biaya Kuliah</label>
                                                <div class="table-responsive">
                                                    <table id="<?php echo $table;?>" class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th data-halign="center" data-align="center" >No</th>
                                                                <th data-halign="center">Periode Akademik</th>
                                                                <th data-halign="center">Komponen</th>
                                                                <th data-halign="center" data-align="right">Nominal (Rp)</th>
                                                                <th data-halign="center" data-align="center">Dibayar <input type="checkbox" name="checkall" onclick="setAllCheckbox()"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no=1; if(isset($recordskbk)) : foreach($recordskbk as $row) : ?>
                                                            <tr>                                            
                                                                <td><?php echo $no++; ?></td>
                                                                <td><?php echo $row->IDPA; ?></td>
                                                                <td><?php echo $row->kbk->NAMAKBK; ?></td>
                                                                <td><?php echo number_format($row->BIAYAKBK,2,',','.'); ?></td>
                                                                <td ><input type="checkbox" name="check[]" id="check" onchange="sumCheckedRow()" data-biaya="<?php echo $row->BIAYAKBK;?>" value="<?php echo $row->IDPA.' '.$row->IDKBK; ?>"></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                            <?php else : ?> 
                                                            <h2>No records were returned.</h2>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-inline">
                                                <label> Total dibayar: </label>
                                                <input type="text" class="form-control" size="20" name="total" value="0"/>
                                            </div>

<script>
    $(document).ready(function() {
        $('#<?php echo $table;?>').bootstrapTable();
    });
</script>
