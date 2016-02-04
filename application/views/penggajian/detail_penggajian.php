                                                <div class="col-lg-2">No Trans</div>
                                                <div class="col-lg-4">: <?php echo $trans->IDGAJI;?></div>
                                                <div class="col-lg-2">Tanggal</div>
                                                <div class="col-lg-4">: <?php echo $trans->kas1->TGLKAS;?></div>
                                                <div class="col-lg-2">Periode</div>
                                                <div class="col-lg-4">: <?php echo $trans->BULANGAJI;?></div>
                                                <div class="col-lg-2">Petugas</div>
                                                <div class="col-lg-4">: <?php echo $trans->NIP.' '.$trans->pegawai->NAMAP;?></div>
                                                <div class="col-lg-2">Status</div>
                                                <div class="col-lg-4">:
                                                    <?php
                                                    if($trans->STATR==0){
                                                        if(isset($trans->kas1->NIP)){
                                                            echo 'Sah, Terverifikasi';
                                                        } else{
                                                            echo 'Sah, Belum Terverifikasi';
                                                        }
                                                    } else{
                                                        if(isset($trans->kas1->NIP) && $trans->kas1->STATR==1){
                                                            echo 'Batal, Terverifikasi';
                                                        }else{
                                                            echo 'Batal, Belum Terverifikasi';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <?php if(isset($trans->kas1->NIP)){?>
                                                <div class="col-lg-2">Wadir</div>
                                                <div class="col-lg-4">: <?php echo $trans->kas1->NIP.' '.$trans->kas1->pegawai->NAMAP;?></div>
                                                <?php } else {echo '<div class="col-lg-6">&emsp;</div>';}?>

