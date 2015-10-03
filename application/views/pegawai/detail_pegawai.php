            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url().$this->uri->slash_segment(1); ?>">Kembali ke Daftar Pegawai</a> |
                    <a href="<?php echo base_url().$this->uri->slash_segment(1)."load_form/".$record->NIP; ?>">Update</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="col-lg-4">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: <?php echo $record->NIP;?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: <?php echo $record->NAMAP;?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Tempat/Tanggal Lahir</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: <?php echo $record->kota->NAMAK.", ".$record->TGLLP;?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: 
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
                                    <div class="col-lg-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: <?php echo $record->ALAMATP." ".$record->kota->NAMAK;?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Telp/HP</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: <?php echo $record->TLPP;?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Kewarganegaraan</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: 
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
                                    <div class="col-lg-4">
                                        <label>Status Perkawinan</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: 
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
                                    <div class="col-lg-4">
                                        <label>Tanggal Masuk</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: <?php echo $record->TGLMASUKP;?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Golongan Jarak Rumah</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: <?php echo $record->IDJR;?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Jenis Pegawai</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: 
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
                                    <div class="col-lg-4">
                                        <label>Jenjang Pendidikan</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: <?php echo $record->jenjang_pendidikan->NAMAJP;?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>: <?php echo $record->jabatan->NAMAJAB;?></p>
                                    </div> 
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <center>
                                            <img class="img-thumbnail" src="<?php echo base_url(); ?>assets/images/pegawai/<?php echo $record->NIP;?>.jpg" width="120px" height="160px">
                                        </center>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Form Pembaruan Foto
                                        </div>
                                        <div class="panel-body">
                                            <form action="<?php echo base_url().'pegawai/update_photo/'.$record->NIP; ?>" enctype="multipart/form-data">
                                                <input class="form-control" type="file" accept=".jpg" name="userfile">
                                                <input type="submit" value="Perbarui Foto" />
                                            </form>
                                        </div>
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