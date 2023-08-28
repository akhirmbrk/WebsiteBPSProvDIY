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
              <form class="row" method="post" enctype="multipart/form-data">


                  <div class="col-md-7 col-xl-8">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail</strong> Kegiatan</h4>

                          <div class="card-body">

                              <div class="row">
                                  <div class="form-group col-md-6">
                                      <label class="require">Tim Kerja</label>
                                      <select class="form-control" data-provide="selectpicker">
                                          <option>Analisis Statistik dan Penjaminan Kualitas</option>
                                          <option>Neraca Regional</option>
                                          <option>Statistik Sosial</option>
                                          <option>Statistik Distribusi</option>
                                          <option>Statistik Produksi</option>
                                          <option>Sensus Pertanian & Statistik Perikanan, Pertanian dan Kehutanan (SP2K)
                                          </option>
                                          <option>Pengolahan dan TIK</option>
                                          <option>Diseminasi Statistik</option>
                                          <option>Pembinaan dan Pelaksanaan Statistik Sektoral</option>
                                          <option>Perencanaan dan Administrasi Keuangan</option>
                                          <option>Manajemen SDM dan Hukum</option>
                                          <option>Fasilitasi Operasional Perkantoran</option>
                                          <option>SAKIP</option>
                                          <option>Humas & Unit Kerja Pimpinan</option>
                                          <option>Zona Integritas dan Reformasi Birokrasi</option>
                                          <option>Kolaborasi Mengawal Perubahan</option>
                                      </select>
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label class="require">Judul Kegiatan</label>
                                      <input class="form-control" type="text" name="title">
                                  </div>
                              </div>

                              <hr>
                              <label class="require">Tanggal Mulai</label>
                              <div class="input-group" data-provide="datepicker">

                                  <div class="input-group-prepend">

                                      <!-- <span class="input-group-text">Mulai</span> -->
                                  </div>

                                  <input type="text" class="form-control">
                              </div>
                              <label class="require">Tanggal Selesai</label>
                              <div class="input-group" data-provide="datepicker">

                                  <div class="input-group-prepend">

                                      <!-- <span class="input-group-text">Mulai</span> -->
                                  </div>
                                  <input type="text" class="form-control">
                              </div>

                              <hr>

                              <div class="form-group">
                                  <label class="require">Deskripsi Kegiatan</label>
                                  <textarea data-provide="summernote" data-toolbar="slim" data-min-height="220"></textarea>
                              </div>


                          </div>


                          <footer class="card-footer text-right">
                              <a class="btn btn-secondary mr-2" href="<?= base_url('index/kegiatan') ?>">Cancel</a>
                              <button class="btn btn-primary" type="submit" href="<?= base_url('index/kegiatan') ?>">Submit</button>
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