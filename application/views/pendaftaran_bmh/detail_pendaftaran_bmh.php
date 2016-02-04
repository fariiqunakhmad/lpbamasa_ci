                                                <div class="col-lg-2">No Trans</div>
                                                <div class="col-lg-4">: <?php echo $trans->IDDAFTARBMH;?></div>
                                                <div class="col-lg-2">Tanggal</div>
                                                <div class="col-lg-4">: <?php echo $trans->kas->TGLKAS;?></div>
                                                <div class="col-lg-2">Peserta</div>
                                                <div class="col-lg-4">: <?php echo $trans->IDPBMH.' '.$trans->peserta_bmh->NAMAPBMH; ?></div>
                                                <div class="col-lg-2">BMH</div>
                                                <div class="col-lg-4">: <?php echo $trans->bmh->TAHUNBMH.$trans->bmh->PERIODEBMH.', '.$trans->bmh->TGLMULAIBMH.' s/d '.$trans->bmh->TGLAKHIRBMH;?></div>
                                                <div class="col-lg-2">Petugas</div>
                                                <div class="col-lg-4">: <?php echo $trans->NIP.' '.$trans->pegawai->NAMAP;?></div>
                                                <div class="col-lg-2">Nominal</div>
                                                <div class="col-lg-4">: <?php echo 'Rp '.number_format($trans->kas->NOMINALKAS,2,',','.');?></div>
                                                