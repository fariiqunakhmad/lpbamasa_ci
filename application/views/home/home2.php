            <div class="row">
                <div class="col-lg-12 text-center h4">
                    <p>Assalaamualaikum Wr. Wb.</p>
                    <p>Selamat datang Bapak/Ibu <b><?php echo $username; ?></b> di</p>
                    <p>Sistem Informasi Keuangan Lembaga Pangajaran Bahasa Arab Masjid Agung Sunan Ampel</p> 
                    <p>Hari ini <?php echo date('d-m-Y');?></p>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default col-lg-12">
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
            </div>
            