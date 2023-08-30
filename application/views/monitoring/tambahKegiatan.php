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
              <form action="<?php echo base_url('monitoring/Kegiatan/tambahKegiatan'); ?>" class="row" method="post" enctype="multipart/form-data">
                  <div class="col-md-7 col-xl-8">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail</strong> Kegiatan</h4>

                          <div class="card-body">

                              <div class="row">
                                  <div class="form-group col-md-6">
                                      <label class="require">Tim Kerja</label>
                                      <select name="id_tim_kerja" class="form-control" data-provide="selectpicker">
                                          <option value="1">Analisis Statistik dan Penjaminan Kualitas</option>
                                          <option value="2">Neraca Regional</option>
                                          <option value="3">Statistik Sosial</option>
                                          <option value="4">Statistik Distribusi</option>
                                          <option value="5">Statistik Produksi</option>
                                          <option value="6">Sensus Pertanian & Statistik Perikanan, Pertanian dan Kehutanan (SP2K)
                                          </option>
                                          <option value="7">Pengolahan dan TIK</option>
                                          <option value="8">Diseminasi Statistik</option>
                                          <option value="9">Pembinaan dan Pelaksanaan Statistik Sektoral</option>
                                          <option value="1">Perencanaan dan Administrasi Keuangan</option>
                                          <option value="1">Manajemen SDM dan Hukum</option>
                                          <option value="1">Fasilitasi Operasional Perkantoran</option>
                                          <option value="1">SAKIP</option>
                                          <option value="1">Humas & Unit Kerja Pimpinan</option>
                                          <option value="1">Zona Integritas dan Reformasi Birokrasi</option>
                                          <option value="1">Kolaborasi Mengawal Perubahan</option>
                                      </select>
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label class="require">Judul Kegiatan</label>
                                      <input class="form-control" type="text" name="judul_kegiatan">
                                  </div>
                              </div>

                              <hr>
                              <label class="require">Waktu Kegiatan</label>
                              <div class="input-group" data-provide="datepicker">
                                  <input type="text" class="form-control" name="tgl_start" placeholder="Tanggal Mulai">
                                  <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </span>
                                  <!-- </div>
                              <label class="require">Tanggal Selesai</label>
                              <div class="input-group" data-provide="datepicker"> -->
                                  <input type="text" class="form-control" name="tgl_end" placeholder="Tanggal Selesai">
                                  <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </span>
                              </div>

                              <hr>

                              <div class="form-group">
                                  <label class="require">Deskripsi Kegiatan</label>
                                  <textarea data-provide="summernote" data-toolbar="slim" data-min-height="220" name="deskripsi_kegiatan"></textarea>
                              </div>


                          </div>


                          <footer class="card-footer text-right">
                              <a class="btn btn-secondary mr-2" href="<?= base_url('monitoring/index/kegiatan') ?>">Cancel</a>
                              <button class="btn btn-primary" type="submit" href="<?= base_url('monitoring/index/kegiatan') ?>">Submit</button>
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