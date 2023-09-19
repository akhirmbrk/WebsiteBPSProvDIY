  <!-- Main container -->
  <main class="main-container">


      <header class="header header-inverse">
          <div class="container">
              <div class="header-info">
                  <div class="left">
                      <br>
                      <h2 class="header-title"><strong>Tambah Sub Kegiatan Baru</strong><small class="subtitle">Isikan form
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

              <div class="col-md-7 col-xl-8">
                  <?php echo $this->session->flashdata('info_form');  ?>
                  <form action="<?php echo base_url('Monitoring/Kegiatan/addSubKegiatan'); ?>" class="row" method="post" enctype="multipart/form-data">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail Kegiatan</strong></h4>
                          <!-- tambahkan input tipe hidden -->
                          <input type="hidden" name="id_parent_kegiatan" value="<?= $id_parent ?>">
                          <div class="card-body">
                              <div class="row">
                                  <div class="form-group col-md-6">
                                      <label class="require">Tim Kerja</label>
                                      <input class="form-control" type="text" id="timKerja" name="timKerja" value="<?= $tim_kerja['id_zteam'] ?>" autofocus autocomplete="off" hidden>
                                      <input class="form-control" type="text" id="timKerja1" name="timKerja1" value="<?= $tim_kerja['nama_team'] ?>" autocomplete="off" readonly>
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label class="require">Judul Kegiatan</label>
                                      <input class="form-control" type="text" name="judulKegiatan" autofocus autocomplete="off" required>
                                  </div>
                              </div>

                              <hr>
                              <label class="require">Waktu Kegiatan</label>
                              <div class="input-group" data-provide="datepicker">
                                  <input type="text" class="form-control" name="tglStart" placeholder="Tanggal Mulai" value="<?php echo $tanggal_now; ?>" autocomplete="off" required>
                                  <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </span>

                                  <input type="text" class="form-control" name="tglEnd" placeholder="Tanggal Selesai" value="<?php echo $tanggal_now; ?>" autocomplete="off" required>
                                  <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </span>
                              </div>



                          </div>


                          <footer class="card-footer text-right">
                              <a class="btn btn-secondary mr-2" href="<?= base_url('Monitoring/Kegiatan') ?>">Cancel</a>
                              <button class="btn btn-primary" type="submit">Submit</button>
                          </footer>


                      </div>
                  </form>
              </div>
          </div>
      </div>