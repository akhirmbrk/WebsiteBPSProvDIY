  <header class="header header-inverse">
      <div class="container">
          <div class="header-info">
              <div class="left">
                  <br>
                  <h2 class="header-title">Anggota Tim Kerja <small class="subtitle"></small></h2>
              </div>
          </div>

          <div class="header-action">
              <?php if (!count($member)) { ?>
                  <div class="buttons">
                      <a class="btn btn-primary btn-float" href="<?= base_url('Monitoring/TimKerja/tambahAnggotaTimKerja/') . $idTim ?>" title="Tambah Anggota" data-provide="tooltip"><i class="ti-plus"></i></a>
                  </div>
              <?php } ?>

          </div>
      </div>
  </header><!--/.header -->





  <div class="main-content">
      <div class="container">
          <div class="row">

              <div class="col-md-8 col-xl-9">
                  <?php
                    // var_dump($member[0]);
                    if (count($member)) {
                        foreach ($member as $indeks => $item) {  ?>
                          <div class="card shadow-1">
                              <header class="card-header bg-lightest">
                                  <div class="card-title flexbox">
                                      <img class="avatar" src="<?= base_url('') ?>/assets/img/avatar/1.jpg" alt="...">
                                      <div>
                                          <h5 class="mb-0"><?= $item['namaU'] ?>
                                              <small class="sidetitle fs-11"><?= $item['nip'] ?></small>
                                          </h5>
                                          <small class=""><?php if ($item['id_user'] == $item['id_ketuatim']) {
                                                                echo 'Ketua Tim';
                                                            } else {
                                                                echo 'Anggota';
                                                            } ?></small>
                                      </div>
                                  </div>
                              </header>

                              <div class="card-body">
                                  <p></p>
                              </div>

                          </div>
                  <?php }
                    } ?>



                  <br>
                  <br>


              </div>


              <div class="col-md-4 col-xl-3">


              </div>


          </div>
      </div>
  </div>