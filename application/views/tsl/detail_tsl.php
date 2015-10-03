                                                <div class="col-lg-2">No Trans</div>
                                                <div class="col-lg-4">: <?php echo $trans->IDTSL;?></div>
                                                <div class="col-lg-2">Tanggal</div>
                                                <div class="col-lg-4">: <?php echo $trans->kas->TGLKAS;?></div>
                                                <div class="col-lg-2">Kelompok</div>
                                                <div class="col-lg-4">: <?php echo $trans->kas->kk->NAMAKK; if($trans->kas->DKKAS==1){echo ' Debet';} else{echo ' Kredit';}?></div>
                                                <div class="col-lg-2">Uraian</div>
                                                <div class="col-lg-4">: <?php echo $trans->URAIANTSL;?></div>
                                                <div class="col-lg-2">Petugas</div>
                                                <div class="col-lg-4">: <?php echo $trans->NIP.' '.$trans->pegawai->NAMAP;?></div>
                                                <div class="col-lg-2">Nominal</div>
                                                <div class="col-lg-4">: <?php echo 'Rp '.number_format($trans->kas->NOMINALKAS,2,',','.');?></div>
                                                