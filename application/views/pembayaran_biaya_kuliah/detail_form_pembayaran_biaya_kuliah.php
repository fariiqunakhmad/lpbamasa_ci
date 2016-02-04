                                            <div class="form-group col-lg-12">
                                                <label >Komponen Biaya Kuliah **</label>
                                                <div class="table-responsive">
                                                    <table id="<?php echo $table;?>" 
                                                           class="table table-striped table-bordered table-hover" 
                                                           >
                                                        <thead>
                                                            <tr>
                                                                <th data-halign="center" data-align="center" >No</th>
                                                                <th data-halign="center">Periode Akademik</th>
                                                                <th data-halign="center">Komponen</th>
                                                                <th data-halign="center" data-align="right">Nominal</th>
                                                                <th data-halign="center" data-align="center">Dibayar <input type="checkbox" name="checkall" onclick="setAllCheckbox()"> </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no=1; if(isset($recordskbk)) : foreach($recordskbk as $row) : ?>
                                                            <tr>                                            
                                                                <td><?php echo $no++; ?></td>
                                                                <td><?php echo $row->IDPA; ?></td>
                                                                <td><?php echo $row->kbk->NAMAKBK; ?></td>
                                                                <td><?php echo '<div class="pull-left">Rp </div>'.number_format($row->BIAYAKBK,2,',','.'); ?></td>
                                                                <td>
                                                                    <input type="checkbox" name="check[]" id="check" onchange="sumCheckedRow()" data-biaya="<?php echo $row->BIAYAKBK;?>" value="<?php echo $row->IDWBK; ?>">                                                                        
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                            <?php else : ?> 
                                                            <h2>No records were returned.</h2>
                                                            <?php endif; ?>
                                                        </tbody>
                                                        <tfoot>
                                                        <td colspan="3" class="text-center"><b>Jumlah dibayar</b></td>
                                                            <td><div class="pull-left">Rp </div><div class="pull-right" id="jml">0,00</div></td>
                                                            <td class="text-center"><input type="checkbox" name="checkmin" required data-error="pilih minimal 1 komponen biaya kuliah"></td>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class='help-block with-errors'></div>
                                            </div>
<script>
    $(document).ready(function() {
        $('#<?php echo $table;?>').bootstrapTable();
    });
</script>
