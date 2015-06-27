            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="col-lg-6">
                                    <table class="table table-bordered table-hover" id="<?php echo $table;?>">
                                        <thead>
                                            <tr>
                                                <th colspan="2" data-halign="center" data-sortable="true" data-align="left">Sektor Pemasukan</th>
                                                <th data-halign="center" data-sortable="true" data-align="right">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Pembayaran biaya kuliah</td>
                                                <td><right><?php echo number_format($pbk,2,',','.'); ?></right></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Pembayaran biaya wisuda</td>
                                                <td><right><?php echo number_format($pbw,2,',','.'); ?></right></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Pembayaran biaya BMH</td>
                                                <td><right><?php echo number_format($pbb,2,',','.'); ?></right></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Cicilan Kasbon</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Lain-lain:</td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                            <div class="table-responsive">
                                <div class="col-lg-6">
                                    <table class="table table-bordered table-hover" id="<?php echo $table;?>">
                                         <thead>
                                             <tr>
                                                 <th colspan="2" data-halign="center" data-sortable="true" data-align="left">Sektor Pengeluaran</th>
                                                 <th data-halign="center" data-sortable="true" data-align="right">Jumlah</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td colspan="2">Gaji pegawai</td>
                                                 <td><right><?php echo number_format(0,2,',','.'); ?></right></td>
                                             </tr>
                                             <tr>
                                                 <td colspan="2">Kasbon pegawai</td>
                                                 <td><right><?php echo number_format($kasbon,2,',','.'); ?></right></td>
                                             </tr>
                                             <tr>
                                                 <td colspan="2">Lain-lain:</td>
                                                 <td></td>
                                             </tr>

                                         </tbody>
                                     </table>
                                </div>
                                
                                
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
