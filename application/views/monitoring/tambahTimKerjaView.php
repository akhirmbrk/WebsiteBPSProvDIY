  <!-- Main container -->
  <main class="main-container">


      <header class="header header-inverse">
          <div class="container">
              <div class="header-info">
                  <div class="left">
                      <br>
                      <h2 class="header-title"><strong>Buat Tim Kerja</strong><small class="subtitle">Isikan form
                              berikut sesuai dengan kebutuhan tim kerja yang ingin dibuat.</small></h2>
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
              <?php echo $this->session->flashdata('info_form');  ?>

              <form class="row" action="<?= base_url('') ?>Monitoring/TimKerja/createTimUser" method="post" enctype="multipart/form-data">


                  <div class="col-md-7 col-xl-12">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail Tim Kerja</strong></h4>

                          <div class="card-body">
                              <label name="labelTimKerja" class="require">Jenis Tim Kerja</label>
                              <select name="timKerja" id="timKerja" class="form-control" data-provide="selectpicker">
                                  <?php
                                    if (count($tim_kerja)) {
                                        foreach ($tim_kerja as $indeks => $item) {  ?>
                                          <option value="<?= $item['nama_team'] ?>">
                                              <?php echo $item['nama_team']; ?>
                                          </option>
                                  <?php }
                                    } ?>
                              </select>


                              <hr>
                              <label name="labelPeriode" class="require">Periode</label>
                              <select name="periode" id="periode" class="form-control" data-provide="selectpicker">
                                  <?php
                                    if (count($periode)) {
                                        foreach ($periode as $indeks => $item) {  ?>
                                          <option value="<?= $item['id_zperiode'] ?>">
                                              <?php echo $item['Tahun']; ?>
                                          </option>
                                  <?php }
                                    } ?>
                              </select>

                              <footer class="card-footer text-right">
                                  <a class="btn btn-secondary mr-2" href="<?= base_url("monitoring/index/timKerja") ?>">Cancel</a>
                                  <button class="btn btn-primary" type="submit">Submit</button>
                              </footer>


                          </div>
                      </div>

              </form>
          </div>
      </div>