                                                <div class="col-lg-2">No Trans</div>
                                                <div class="col-lg-4">: <?php echo $trans->IDPW;?></div>
                                                <div class="col-lg-2">Tanggal</div>
                                                <div class="col-lg-4">: <?php echo $trans->kas->TGLKAS;?></div>
                                                <div class="col-lg-2">Mahasiswa</div>
                                                <div class="col-lg-4">: <?php echo $trans->NIM.' '.$trans->mahasiswa->NAMAM; ?></div>
                                                <div class="col-lg-2">Wisuda</div>
                                                <div class="col-lg-4">: <?php echo $trans->wisuda->PERIODEW.', '.$trans->wisuda->TGLW.' di '.$trans->wisuda->TEMPATW;?></div>
                                                <div class="col-lg-2">Petugas</div>
                                                <div class="col-lg-4">: <?php echo $trans->NIP.' '.$trans->pegawai->NAMAP;?></div>
                                                <div class="col-lg-2">Nominal</div>
                                                <div class="col-lg-4">: <?php echo 'Rp '.number_format($trans->kas->NOMINALKAS,2,',','.');?></div>
                                                