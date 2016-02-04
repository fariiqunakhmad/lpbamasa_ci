<style>
.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}
</style>
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
                                        <p>: <?php echo $record->ALAMATP." ".$record->kot_kota->NAMAK;?></p>
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
                                    <!-- the avatar markup -->
                                    <div id="kv-avatar-errors" class="center-block" style="width:800px;display:none"></div>
                                    <form class="text-center" method="post">
                                        <div class="kv-avatar center-block" style="width:200px">
                                            <input id="avatar<?php echo $record->NIP;?>" name="avatar" type="file" class="file-loading"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
<script>
//    $(document).on('ready', function() {
        $("#avatar<?php echo $record->NIP;?>").fileinput({
            uploadUrl: "<?php echo base_url();?>pegawai/upload_photo/<?php echo $record->NIP;?>", // server upload action
    //        uploadAsync: true,
    //        overwriteInitial: false,
            maxFileSize: 10000,
            showClose: false,
            showCaption: false,
            browseLabel: 'Ubah Foto',
    //        browseIcon: '',
    //        elErrorContainer: '#kv-avatar-errors',
    //        msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="<?php echo base_url().$photo;?>" alt="Your Avatar" style="width:160px">',
            //layoutTemplates: {main2: '{preview} {browse}'},
            allowedFileExtensions: ["jpg"]
        });
//    });
    
</script>