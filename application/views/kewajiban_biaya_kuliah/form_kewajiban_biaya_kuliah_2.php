            <div class="row">
                <div class="col-lg-12">
<!--                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">-->
                            
                                    <form id="f2" method="post" action="<?php echo $action; ?>">
                                        <div class="form-group">
                                            <label class="col-lg-6">Periode Akademik : <?php echo $idpa;?></label>
                                            <label class="col-lg-6">Angkatan : <?php echo $ida;?></label>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="<?php echo $table;?>" data-toggle="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>NIM</th>
                                                            <th>Nama</th>
                                                            <?php  if(isset($recordsbk)) : foreach($recordsbk as $row1) : ?>
                                                                <th>
                                                                    <?php echo $row1->komponen_biaya_kuliah->NAMAKBK; ?>
                                                                    <input type="checkbox" id="ca<?php echo $row1->IDKBK;?>" name="ca[<?php echo $row1->IDKBK;?>]" onclick="setAllCheckbox(this.value)" value="<?php echo $row1->IDKBK;?>">
                                                                </th>
                                                            <?php endforeach; ?>
                                                            <?php else : ?> 
                                                            <h2>No records were returned.</h2>
                                                            <?php endif; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1; if(isset($recordsmahasiswa)) : foreach($recordsmahasiswa as $row) : ?>
                                                        <tr >
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $row->NIM; ?></td>
                                                            <td><?php echo $row->NAMAM; ?></td>
                                                            <?php if(isset($recordsbk)) : foreach($recordsbk as $row1) : ?>
                                                            <td>
                                                                <input 
                                                                    type="checkbox" 
                                                                    onchange="setCheckAllButton('<?php echo $row1->IDKBK;?>')" 
                                                                    name="c[<?php echo $row->NIM;?>][<?php echo $row1->IDKBK;?>]" 
                                                                    data-name="c<?php echo $row1->IDKBK;?>" 
                                                                    data-id="<?php echo $row1->IDKBK.($no-2);?>"
                                                                    value="<?php echo $row1->BIAYA;?>"
                                                                    <?php 
                                                                    if(isset($recordswbk)) : 
                                                                        foreach($recordswbk as $row2) : 
                                                                            if($row2->IDPA == $idpa && $row2->NIM == $row->NIM && $row2->IDKBK == $row1->IDKBK){
                                                                                echo 'checked';
                                                                            }
                                                                        endforeach; 
                                                                    endif; 
                                                                    ?>
                                                                    >
                                                            </td>
                                                            <?php endforeach; ?>
                                                            <?php else : ?> 
                                                            <h2>No records were returned.</h2>
                                                            <?php endif; ?>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                        <?php else : ?> 
                                                        <h2>No records were returned.</h2>
                                                        <?php endif; ?>
                                                    </tbody>
                                                    <input id="baris" value="<?php echo $no-1;?>" hidden="true">
                                                </table>
                                                <div class="row-fluid">
                                                    <input name="ida" value="<?php echo $ida;?>" hidden="">
                                                    <input name="idpa" value="<?php echo $idpa;?>" hidden="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                            <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Reset Field</button>
                                            <button class="btn btn-sm btn-warning" onclick="window.history.back()">Cancel</button>
                                        </div>
                                    </form>
                                
                            <!--</div>-->
                            <!-- /.row (nested) -->
<!--                        </div>
                         /.panel-body 
                    </div>
                     /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->