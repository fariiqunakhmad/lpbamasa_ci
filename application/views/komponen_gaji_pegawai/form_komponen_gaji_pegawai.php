

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <form id="form1" name="form1" method="post" action="<?php echo $action; ?>">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                    
                                        <div class="form-group col-lg-3">
                                            <label >ID Pembayaran</label>
                                            <input <?php if($record==NULL){ echo 'class="form-control"';}?> 
                                                   type="text" 
                                                   name="idpbk" 
                                                   <?php if($record!=NULL){echo 'value="'.$record->IDPBK.'" hidden="true"';}?> 
                                                   />
                                            <?php if($record!=NULL){echo '<p class="form-control-static">'.$record->IDPBK.'</p>';}?>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label >Tanggal Pembayaran</label>
                                            <input <?php if($record==NULL){ echo 'class="form-control"';}?> 
                                                type="date" 
                                                name="tglpbk" 
                                                <?php if($record!=NULL){ echo 'value="'.$record->TGLPBK.'" hidden="true"' ;} 
                                                else{echo 'value="'.date('Y-m-d').'"' ;}?> 
                                                />
                                            <?php if($record!=NULL){ echo '<p class="form-control-static">'.$record->TGLPBK.'</p>' ;}?>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label >Mahasiswa</label>
                                            <select <?php if($record==NULL){ echo 'class="selectpicker form-control"';}?>
                                                data-live-search="true" 
                                                onchange="showDetailForm(this.value)" 
                                                name="nim" 
                                                <?php if($record!=NULL){ echo 'hidden="true"'; $nimselected=$record->NIM;}?>>
                                                <option value="">Pilih Mahasiswa</option>
                                                <?php
                                                    if(isset($dd_mahasiswa_m)) :
                                                        foreach($dd_mahasiswa_m as $key => $val) :
                                                            if (isset($nimselected) && $key==$nimselected){
                                                                echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$key $val</option>\n";
                                                                $namamselected=$val;
                                                            }
                                                            else {
                                                                echo "\t\t\t\t\t\t<option value='$key'>$key $val</option>\n";
                                                            }
                                                        endforeach;
                                                    else :
                                                        echo "<h2>No records were returned.</h2>";
                                                    endif;
                                                ?>
                                            </select>
                                            <?php if($record!=NULL){echo '<p class="form-control-static">'.$nimselected.' '.$namamselected.'</p>';}?>
                                        </div>
                                        <?php if($record!=NULL): ?>
                                        <div class="form-group">
                                            <label >Komponen Biaya Kuliah</label>
                                            <div class="table-responsive">
                                                <table id="<?php echo $table;?>" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th data-halign="center" data-align="center" >No</th>
                                                            <th data-halign="center">Periode Akademik</th>
                                                            <th data-halign="center">Komponen</th>
                                                            <th data-halign="center" data-align="right">Nominal</th>
                                                            <th data-halign="center" data-align="center">Dibayar <input type="checkbox" name="checkall" onclick="setAllCheckbox()"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $no=1; 
                                                        if(isset($recordskbks)) { 
                                                            foreach($recordskbks as $row) {
                                                        ?><tr>                                            
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $row->IDPA; ?></td>
                                                            <td><?php echo $row->kbk->NAMAKBK; ?></td>
                                                            <td><?php echo $row->BIAYAKBK; ?></td>
                                                            <td>
                                                                <input type="checkbox" name="check[]" id="check" onchange="sumCheckedRow()" data-biaya="<?php echo $row->BIAYAKBK;?>" value="<?php echo $row->IDPA.' '.$row->IDKBK; ?>" checked="true" >
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                            } 
                                                        } 
                                                        if(isset($recordskbk)) { 
                                                            foreach($recordskbk as $row1) {
                                                        ?>                                         
                                                        <tr>                                            
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $row1->IDPA; ?></td>
                                                            <td><?php echo $row1->kbk->NAMAKBK; ?></td>
                                                            <td><?php echo $row1->BIAYAKBK; ?></td>
                                                            <td>
                                                                <input type="checkbox" name="check[]" id="check" onchange="sumCheckedRow()" data-biaya="<?php echo $row1->BIAYAKBK;?>" value="<?php echo $row1->IDPA.' '.$row1->IDKBK; ?>">
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-inline">
                                            <label> Total dibayar: </label>
                                            <input type="text" class="form-control" size="20" name="total" value="<?php if($record!=NULL){ echo $record->NOMINALPBK;} else{ echo 0;}?>"/>
                                        </div>

                                        <?php else:?>
                                        <div id="txtHint"></div>
                                        <?php endif;?>
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
                                        <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

