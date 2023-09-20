  <header class="header header-inverse" style="background-image: url(<?= base_url('assets/img/bg/bluehead.png') ?>);">
      <div class="container">
          <div class="header-info">
              <div class="left">
                  <br>
                  <div class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Anggota Tim Kerja <h5 class="subtitle"></h5></div>
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



  <div class="bubbles">
	<span style="--i:11;"></span>
	<span style="--i:12;"></span>
	<span style="--i:24;"></span>
	<span style="--i:10;"></span>
	<span style="--i:14;"></span>
	<span style="--i:23;"></span>
	<span style="--i:18;"></span>
	<span style="--i:16;"></span>
	<span style="--i:19;"></span>
	<span style="--i:20;"></span>
	<span style="--i:22;"></span>
	<span style="--i:25;"></span>
	<span style="--i:18;"></span>
	<span style="--i:21;"></span>
	<span style="--i:15;"></span>
	<span style="--i:13;"></span>
	<span style="--i:26;"></span>
	<span style="--i:17;"></span>
	<span style="--i:13;"></span>
	<span style="--i:28;"></span>
	<span style="--i:11;"></span>
	<span style="--i:12;"></span>
	<span style="--i:24;"></span>
	<span style="--i:10;"></span>
	<span style="--i:14;"></span>
	<span style="--i:23;"></span>
	<span style="--i:18;"></span>
	<span style="--i:16;"></span>
	<span style="--i:19;"></span>
	<span style="--i:20;"></span>
	<span style="--i:22;"></span>
	<span style="--i:25;"></span>
	<span style="--i:18;"></span>
	<span style="--i:21;"></span>
	<span style="--i:15;"></span>
	<span style="--i:13;"></span>
	<span style="--i:26;"></span>
	<span style="--i:17;"></span>
	<span style="--i:13;"></span>
	<span style="--i:28;"></span>
</div>

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
