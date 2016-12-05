                        <?php
                            $p=$this->uri->segment(1);
                            $a='class="active"';
                        ?>
<!--                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                             /input-group 
                        </li>-->
                        <li>
                            <a href="<?php echo base_url(); ?>">
                                <i class="fa fa-dashboard fa-fw"></i> 
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>">
                                <i class="fa fa-shopping-cart fa-fw"></i> 
                                Transaksi
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>pembayaran_biaya_kuliah">
                                        Pembayaran Biaya Kuliah
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>pendaftaran_wisuda">
                                        Pendaftaran Wisuda
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>pendaftaran_bmh">
                                        Pendaftaran BMH
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>penggajian">
                                        Penggajian
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>kasbon">
                                        Kasbon
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>tsl">
                                        Transaksi Sektor Lain
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>">
                                <i class="fa fa-files-o fa-fw"></i> 
                                Pendukung Transaksi
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="">
                                        Biaya Kuliah
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
<!--                                        <li>
                                            <a href="<?php echo base_url(); ?>pembayaran_biaya_kuliah">
                                                Pembayaran Biaya Kuliah
                                            </a>
                                        </li>-->
                                        <li>
                                            <a href="<?php echo base_url(); ?>biaya_kuliah">
                                                Biaya Kuliah Angkatan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>kewajiban_biaya_kuliah">
                                                Kewajiban Biaya Kuliah
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>kbk">
                                                Komponen Biaya Kuliah
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        Wisuda
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
<!--                                        <li>
                                            <a href="<?php echo base_url(); ?>pendaftaran_wisuda">
                                                Pendaftaran Wisuda
                                            </a>
                                        </li> -->
                                        <li>
                                            <a href="<?php echo base_url(); ?>wisuda">
                                                Kegiatan Wisuda
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        Bimbingan Manasik Haji
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
<!--                                        <li>
                                            <a href="<?php echo base_url(); ?>pendaftaran_bmh">
                                                Pendaftaran BMH
                                            </a>
                                        </li>-->
                                        <li>
                                            <a href="<?php echo base_url(); ?>bmh">
                                                Kegiatan Bimbingan Manasik Haji
                                            </a>
                                        </li>        
                                        <li>
                                            <a href="<?php echo base_url(); ?>peserta_bmh">
                                                Peserta BMH
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        Penggajian
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
<!--                                        <li>
                                            <a href="<?php echo base_url(); ?>penggajian">
                                                Penggajian
                                            </a>
                                        </li>-->
                                        <li>
                                            <a href="<?php echo base_url(); ?>kg">
                                                Komponen Gaji
                                            </a>
                                        </li>        
                                        <li>
                                            <a href="<?php echo base_url(); ?>komponen_gaji_pegawai">
                                                Komponen Gaji Pegawai
                                            </a>
                                        </li>
                                    </ul>
                                </li>
<!--                                <li>
                                    <a href="<?php echo base_url(); ?>kasbon">
                                        Kasbon
                                    </a>
                                </li>-->
                                <li>
                                    <a href="">
                                        Sektor Lain
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-third-level">
<!--                                        <li>
                                            <a href="<?php echo base_url(); ?>tsl">
                                                Transaksi Sektor Lain
                                            </a>
                                        </li> -->
                                        <li>
                                            <a href="<?php echo base_url(); ?>kk">
                                                Kelompok Keuangan
                                            </a>
                                        </li>                              
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-calendar-o fa-fw"></i>
                                Presensi
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>hari_kerja">
                                        Hari Kerja
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>jenis_presensi_harian">
                                        Jenis Presensi Harian
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Presensi Harian<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url(); ?>presensi_harian/index/1">Presensi Dosen Piket</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>presensi_harian/index/2">Presensi Pegawai</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>presensi_mengajar">
                                        Presensi Mengajar
                                    </a>
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
                                    <a href="<?php echo base_url(); ?>peran_pegawai">
                                        Peran Pegawai
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
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>kas">
                                <i class="fa fa-book fa-fw"></i>
                                Kas
                            </a> 
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>kas/load_form_laporan">
                                <i class="fa fa-files-o fa-fw"></i>
                                Laporan
<!--                                <span class="fa arrow"></span>-->
                            </a>
<!--                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>kas/load_form_laporan">
                                        Kas
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>kasbon/load_form_laporan">
                                        Kasbon x
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>pembayaran_biaya_kuliah/load_form_laporan">
                                        Pembayaran Biaya Kuliah x
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>pendaftaran_wisuda/load_form_laporan">
                                        Pendaftaran Wisuda x
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo base_url(); ?>pendaftaran_bmh/load_form_laporan">
                                        Pendaftaran BMH x
                                    </a>
                                </li>
                            </ul>-->
                        </li>
                        