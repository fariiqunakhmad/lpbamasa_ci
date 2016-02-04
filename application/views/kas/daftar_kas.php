            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table style="font-size: 1" 
                               class="table table-bordered table-hover" 
                               id="<?php echo $table;?>"
                               data-toggle="table"
                               data-search="true"
                               data-show-toggle="true"
                               data-show-columns="true"
                               data-pagination="true"
                               data-page-number="99999999999"
                               data-page-size="10" 
                               data-page-list="[5, 10, 20, 50, 100, 200]"
                               data-show-pagination-switch="true"     
                               data-show-export="true"
                               data-detail-view="true"
                               data-detail-formatter="detailKas"
                               data-sort-name="1" 
                               data-sort-order="asc"
                               data-show-footer="true"
                               >
                            <thead>
                                <tr>
                                    <!--<th data-halign="center"    data-sortable="true"    data-align="center" >No</th>-->
                                    <th data-halign="center"    data-sortable="true"    data-align="left" data-footer-formatter="Hari ini" data-visible="false">ID</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" data-footer-formatter="footerTanggal" >Tanggal</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="left" data-footer-formatter="Total"  >Keterangan</th>
                                    <th data-halign="center"    data-sortable="true"   data-align="left" data-field="ref">Ref</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="right" data-footer-formatter="footerNominalD" data-field="nominald" data-width="200px">Debet</th>
                                    <th data-halign="center"    data-sortable="true"    data-align="right" data-footer-formatter="footerNominalK" data-field="nominalk" data-width="200px">Kredit</th>
                                    <th data-field="dkkas" data-visible="false">DKKAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; if(isset($records)) : foreach($records as $row) : ?>
                                <tr class="odd gradeX">
                                    <!--<td><?php echo $no++; ?></td>-->
                                    <td><?php echo $row->IDKAS; ?></td>
                                    <td><?php echo $row->TGLKAS; ?></td>
                                    <td><?php echo $row->kk->NAMAKK; ?></td>
                                    <td><?php echo $row->REFKAS; ?></td>
                                    <td><?php if($row->DKKAS==1) {echo '<div class="pull-left">Rp </div>'.number_format($row->NOMINALKAS,2,',','.');} ?></td>
                                    <td><?php if($row->DKKAS==2) {echo '<div class="pull-left">Rp </div>'.number_format($row->NOMINALKAS,2,',','.');} ?></td>
                                    <td><?php echo $row->DKKAS; ?></td>
                                </tr>
                                <?php endforeach; ?>
<!--                                <tr>
                                    <td></td>
                                    <td><?php echo date('Y-m-d H:i:s');?></td>
                                    <td>Saldo</td>
                                    <td></td>
                                    <td><div id="saldod"></div></td>
                                    <td><div id="saldok"></div></td>
                                </tr>-->
<!--                                <tr>
                                    <td></td>
                                    <td><?php echo date('Y-m-d');?></td>
                                    <td>Jumlah</td>
                                    <td></td>
                                    <td><div id="jumlahd"></div></td>
                                    <td><div id="jumlahk"></div></td>
                                </tr>-->
                                <?php else : ?> 
                                <h2>No records were returned.</h2>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td><?php echo date('Y-m-d');// echo date('Y-m-d H:i:s');?></td>
                                    <td>Saldo</td>
                                    <td></td>
                                    <td width="200px"><div id="saldod"></div></td>
                                    <td width="200px"><div id="saldok"></div></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
