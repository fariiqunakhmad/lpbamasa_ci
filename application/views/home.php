            <div class="row">
                <div class="panel panel-default col-lg-12">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Kas per <?php echo date('d-m-Y');?>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="text-center h3">Saldo : <?php echo 'Rp '.number_format($today->SALDO,2,',','.');?></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="label-info label center-block">Debet</div>
                            <div class="text-center h4">Jumlah: <?php echo 'Rp '.number_format($today->DEBET,2,',','.');?></div>
                            <div id="d-donut-chart"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="label-info label center-block">Kredit</div>
                            <div class="text-center h4">Jumlah: <?php echo 'Rp '.number_format($today->KREDIT,2,',','.');?></div>
                            <div id="k-donut-chart"></div>
                        </div>
                        <div class="col-lg-12">
                            <a href="kas" class="btn btn-default btn-block">Tampilkan Detail</a>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <div class="panel panel-default col-lg-4">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i> Transaksi Belum Diverifikasi
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="list-group">
                            <a href="pembayaran_biaya_kuliah" class="list-group-item">
                                Pembayaran Biaya Kuliah
                                <span class="pull-right text-muted small"><em><?php echo $notif['pbk'];?> Transaksi</em>
                                </span>
                            </a>
                            <a href="pendaftaran_wisuda" class="list-group-item">
                                Pendaftaran Wisuda
                                <span class="pull-right text-muted small"><em><?php echo $notif['pw'];?> Transaksi</em>
                                </span>
                            </a>
                            <a href="pendaftaran_bmh" class="list-group-item">
                                Pendaftaran Peserta BMH
                                <span class="pull-right text-muted small"><em><?php echo $notif['pbmh'];?> Transaksi</em>
                                </span>
                            </a>
                            <a href="penggajian" class="list-group-item">
                                Penggajian Pegawai
                                <span class="pull-right text-muted small"><em><?php echo $notif['gp'];?> Transaksi</em>
                                </span>
                            </a>
                            <a href="kasbon" class="list-group-item">
                                Kasbon
                                <span class="pull-right text-muted small"><em><?php echo $notif['kb'];?> Transaksi</em>
                                </span>
                            </a>
                            <a href="tsl" class="list-group-item">
                                Sektor Lain
                                <span class="pull-right text-muted small"><em><?php echo $notif['tsl'];?> Transaksi</em>
                                </span>
                            </a>
                        </div>
                        <!-- /.list-group -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
                <div class="panel panel-default col-lg-8">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Progress Kas
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Actions
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Action</a>
                                    </li>
                                    <li><a href="#">Another action</a>
                                    </li>
                                    <li><a href="#">Something else here</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="kas-3-line-chart"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            