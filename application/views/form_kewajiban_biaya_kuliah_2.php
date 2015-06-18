            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form name="form1" method="post" action="<?php echo $action; ?>">
                                        
                                        
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="<?php echo $table;?>">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>NIM</th>
                                                        <th>Nama</th>
                                                        <?php  if(isset($recordsbk)) : foreach($recordsbk as $row1) : ?>
                                                            <th><?php echo $row1->komponen_biaya_kuliah->NAMAKBK; ?></th>
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
                                                        <td><input type="checkbox" name="c[<?php echo $row->NIM;?>][<?php echo $row1->IDKBK;?>]" value="<?php echo $row1->BIAYA;?>"></td>
                                                            
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
                                            </table>
                                        </div>
                                        <input name="ida" value="<?php echo $ida;?>" hidden="">
                                        <input name="idpa" value="<?php echo $idpa;?>" hidden="">
                                        <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <button type="reset" name="reset" value="clear form" class="btn btn-sm btn-danger" >Clear Field</button>
                                    </form>
                                
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