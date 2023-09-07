  <!-- Main container -->
  <main class="main-container">


      <header class="header header-inverse">
          <div class="container">
              <div class="header-info">
                  <div class="left">
                      <br>
                      <h2 class="header-title"><strong>Tambah Kegiatan Baru</strong><small class="subtitle">Isikan form
                              berikut sesuai dengan detail kegiatan.</small></h2>
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
              <form action="<?php echo base_url('monitoring/Kegiatan/addKegiatan'); ?>" class="row" method="post" enctype="multipart/form-data">
                  <div class="col-md-7 col-xl-8">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail</strong> Kegiatan</h4>

                          <div class="card-body">

                              <div class="row">
                                  <div class="form-group col-md-6">
                                      <label class="require">Tim Kerja</label>
                                      <select required id="timKerja" name="timKerja" title="All Tim Kerja" multiple data-provide="selectpicker" data-width="100%">
                                          <?php
                                            if (count($tim_kerja)) {
                                                foreach ($tim_kerja as $indeks => $item) {  ?>
                                                  <option value="<?= $item['id_team'] ?>"><?php echo $item['nama_tim_kerja']; ?></option>
                                          <?php }
                                            } ?>
                                      </select>
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label class="require">Judul Kegiatan</label>
                                      <input class="form-control" type="text" name="judulKegiatan" required>
                                  </div>
                              </div>

                              <hr>
                              <label class="require">Waktu Kegiatan</label>
                              <div class="input-group" data-provide="datepicker">
                                  <input type="text" class="form-control" name="tglStart" placeholder="Tanggal Mulai" value="<?php echo $tanggal_now; ?>" required>
                                  <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </span>

                                  <input type="text" class="form-control" name="tglEnd" placeholder="Tanggal Selesai" value="<?php echo $tanggal_now; ?>" required>
                                  <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </span>
                              </div>



                          </div>


                          <footer class="card-footer text-right">
                              <a class="btn btn-secondary mr-2" href="<?= base_url('monitoring/kegiatan') ?>">Cancel</a>
                              <button class="btn btn-primary" type="submit">Submit</button>
                          </footer>


                      </div>
                  </div>


                  <!-- <div class=" col-md-5 col-xl-4">
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