  <!-- Main container -->
  <main class="main-container">


      <header class="header header-inverse">
          <div class="container">
              <div class="header-info">
                  <div class="left">
                      <br>
                      <h2 class="header-title"><strong><?= $detail_kegiatan['judul_kegiatan'] ?></strong>
                          <small class="subtitle"><?= $tim_kerja['nama_tim_kerja'] ?></small>
                      </h2>
                  </div>
              </div>

              <div class="header-action">
                  <nav class="nav">

                  </nav>
              </div>
          </div>
      </header>
      <!--/.header -->





      <div class="main-content">
          <div class="container">
              <form action="<?php echo (base_url('monitoring/Kegiatan/updateKegiatan/') . $detail_kegiatan['id_kegiatan']); ?>" class="row" method="post" enctype="multipart/form-data">


                  <div class="col-md-7 col-xl-8">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail</strong> Kegiatan</h4>

                          <div class="card-body">

                              <div class="row">
                                  <div class="form-group col-md-6">
                                      <label class="require">Tim Kerja</label>
                                      <input type="text" class="form-control" value="Tim Kerja" disabled>
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label class="require">Judul Kegiatan</label>
                                      <input type="text" class="form-control" value="<?= $detail_kegiatan['judul_kegiatan'] ?>" disabled>
                                  </div>
                              </div>

                              <hr>
                              <label class="require">Tanggal Mulai</label>
                              <input type="text" value="<?= $detail_kegiatan['tgl_start'] ?>" class="form-control" value="Tanggal Mulai" disabled>
                              <br>
                              <label class="require">Tanggal Selesai</label>
                              <input type="text" value="<?= $detail_kegiatan['tgl_start'] ?>" class="form-control" value="Tanggal Selesai" disabled>

                              <hr>

                              <label class="require">Progress</label>

                              <div data-provide="slider" name="progresKegiatan" data-value=" <?= $detail_kegiatan['progres_kegiatan'] ?>" data-target="next"></div>
                              <input style="width: 25px;" type="number" name="progresKegiatan" value="" class="form-control-plaintext" readonly>


                              <hr>

                              <div class="form-group">
                                  <label class="require">Deskripsi Kegiatan</label>
                                  <textarea data-provide="summernote" data-toolbar="slim" data-min-height="220" name="deskripsiKegiatan">
                                    <?= $detail_kegiatan['deskripsi_kegiatan'] ?>
                                </textarea>
                              </div>
                          </div>


                          <footer class="card-footer text-right">
                              <a class="btn btn-secondary mr-2" href="<?= base_url('Monitoring/Kegiatan') ?>">Cancel</a>
                              <button class="btn btn-primary" type="submit">Update</button>
                          </footer>


                      </div>
                  </div>


                  <!-- <div class="col-md-5 col-xl-4">
        <div class="card shadow-1">
          <h5 class="card-title">Attachments</h5>

          <div class="card-body">
            <div class="input-group file-group">
              <input type="text" class="form-control file-value" placeholder="Choose file..." readonly>
              <input type="file" multiple>
              <span class="input-group-append">
                <button class="btn btn-light file-browser" type="button"><i class="fa fa-upload"></i></button>
              </span>
            </div>
          </div>
        </div>
      </div> -->


              </form>
          </div>
      </div>