            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>">Kembali ke Daftar Pegawai</a>
                    <a href="<?php echo base_url().$this->uri->slash_segment(1)."load_form/".$record->NIP; ?>">Update</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <p class="form-control-static"><?php echo $record->NIP;?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <p class="form-control-static"><?php echo $record->NAMAP;?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat/Tanggal Lahir</label>
                                        <p class="form-control-static"><?php echo $record->kota->NAMAK.", ".$record->TGLLP;?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <p class="form-control-static">
                                            <?php 
                                            switch ($record->JKP) {
                                                case 1:
                                                    echo 'Pria';
                                                    break;
                                                case 2:
                                                    echo 'Wanita';
                                                    break;
                                                default:
                                                    break;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <p class="form-control-static"><?php echo $record->ALAMATP." ".$record->kota->NAMAK;?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Telp/HP</label>
                                        <p class="form-control-static"><?php echo $record->TLPP;?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Kewarganegaraan</label>
                                        <p class="form-control-static">
                                            <?php 
                                            switch ($record->KWNP) {
                                                case 1:
                                                    echo 'WNI';
                                                    break;
                                                case 2:
                                                    echo 'WNA';
                                                    break;
                                                default:
                                                    break;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Perkawinan</label>
                                        <p class="form-control-static">
                                            <?php 
                                            switch ($record->STATP) {
                                                case 0:
                                                    echo 'Lajang';
                                                    break;
                                                case 1:
                                                    echo 'Menikah';
                                                    break;
                                                default:
                                                    break;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Masuk</label>
                                        <p class="form-control-static"><?php echo $record->THMASUKP;?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Golongan Jarak Rumah</label>
                                        <p class="form-control-static"><?php echo $record->IDJR;?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Pegawai</label>
                                        <p class="form-control-static">
                                            <?php 
                                            switch ($record->JENISP) {
                                                case 1:
                                                    echo 'Dosen';
                                                    break;
                                                case 2:
                                                    echo 'Non Dosen';
                                                    break;
                                                default:
                                                    break;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenjang Pendidikan</label>
                                        <p class="form-control-static"><?php echo $record->jenjang_pendidikan->NAMAJP;?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <p class="form-control-static"><?php echo $record->jabatan->NAMAJAB;?></p>
                                    </div> 
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