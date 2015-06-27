                        <?php
                            $p=$this->uri->segment(1);
                            $a='class="active"';
                        ?>
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>">
                                <i class="fa fa-dashboard fa-fw"></i> 
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-bar-chart-o fa-fw"></i> 
                                Transaksi
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>pembayaran_biaya_kuliah/load_form">
                                        Pembayaran Biaya Kuliah v
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>pendaftaran_wisuda/load_form">
                                        Pendaftaran Wisuda v
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>pendaftaran_bmh/load_form">
                                        Pendaftaran BMH v
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>penggajian/load_form">
                                        Penggajian
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>kasbon/load_form">
                                        Kasbon v
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>tsl/load_form">
                                        Sektor Lain v
                                    </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>">
                                <i class="fa fa-folder fa-fw"></i> 
                                Modul
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="">
                                        Biaya Kuliah v
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>pembayaran_biaya_kuliah">
                                                Pembayaran Biaya Kuliah v
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>biaya_kuliah">
                                                Biaya Kuliah Angkatan v
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>kewajiban_biaya_kuliah">
                                                Kewajiban Biaya Kuliah v
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>kbk">
                                                Komponen Biaya Kuliah v
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        Wisuda v
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>pendaftaran_wisuda">
                                                Pendaftaran Wisuda v
                                            </a>
                                        </li> 
                                        <li>
                                            <a href="<?php echo base_url(); ?>wisuda">
                                                Kegiatan Wisuda v
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        BMH v
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>pendaftaran_bmh">
                                                Pendaftaran Peserta BMH v
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>bmh">
                                                Kegiatan Bimbingan Manasik Haji v
                                            </a>
                                        </li>        
                                        <li>
                                            <a href="<?php echo base_url(); ?>peserta_bmh">
                                                Peserta BMH v
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        Penggajian Pegawai
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>penggajian">
                                                Generate Penggajian
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>kg">
                                                Komponen Gaji v
                                            </a>
                                        </li>        
                                        <li>
                                            <a href="<?php echo base_url(); ?>komponen_gaji_pegawai">
                                                Komponen Gaji Pegawai
                                            </a>
                                        </li>
                                        

                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>kasbon">
                                        Kasbon v
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Sektor Lain v
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>tsl">
                                                Transaksi Sektor Lain v
                                            </a>
                                        </li> 
                                        <li>
                                            <a href="<?php echo base_url(); ?>kk">
                                                Kelompok Keuangan v
                                            </a>
                                        </li>                              
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        Presensi
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>jenis_presensi_harian">
                                                Jenis Presensi Harian
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>presensi_harian">
                                                Presensi Harian
                                            </a>
                                        </li>        
                                        <li>
                                            <a href="<?php echo base_url(); ?>presensi_mengajar">
                                                Presensi Mengajar
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>presensi_harian/index/1">
                                                Presensi Dosen Piket
                                            </a>
                                        </li> 
                                        <li>
                                            <a href="<?php echo base_url(); ?>presensi_harian/index/2">
                                                Presensi Pegawai
                                            </a>
                                        </li> 
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-table fa-fw"></i>
                                Master
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>pegawai">
                                        Pegawai
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>peran">
                                        Peran
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>jabatan">
                                        Jabatan
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>jarak_rumah" <?php if($p=='jarak_rumah'){ echo $a;}?>>
                                        Jarak Rumah
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo base_url(); ?>masa_abdi">
                                        Masa Abdi 
                                    </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>laporan/load_form">
                                <i class="fa fa-files-o fa-fw"></i>
                                Laporan
                                <span class="fa arrow"></span>
                            </a>
                            
                        </li>
                        