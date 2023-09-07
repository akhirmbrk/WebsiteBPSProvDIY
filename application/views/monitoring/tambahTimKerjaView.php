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
              <form class="row" action="<?= base_url('') ?>monitoring/index/addTimUser" method="post" enctype="multipart/form-data">


                  <div class="col-md-7 col-xl-8">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail Tim Kerja</strong></h4>

                          <div class="card-body">
                              <label name="labelKodeBPS" class="require">Kode BPS</label>
                              <select name="kodeBPS" id="kodeBPS" class="form-control" data-provide="selectpicker">
                                  <?php
                                    if (count($bps)) {
                                        foreach ($bps as $indeks => $item) {  ?>
                                          <option value="<?= $item['kodeBPS'] ?>">
                                              <?php echo "(" . $item['kodeBPS'] . ") " . substr($item['namaBPS'], 4); ?>
                                          </option>
                                  <?php }
                                    } ?>
                              </select>
                              <hr>
                              <label name="labelTimKerja" class="require">Jenis Tim Kerja</label>
                              <select name="timKerja" id="timKerja" class="form-control" data-provide="selectpicker">
                                  <?php
                                    if (count($tim_kerja)) {
                                        foreach ($tim_kerja as $indeks => $item) {  ?>
                                          <option value="<?= $item['id_team'] ?>">
                                              <?php echo $item['nama_tim_kerja']; ?>
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
                              <hr>
                              <div><small>Yang pertama merupakan ketua tim</small></div>
                              <label class="require">Anggota</label>
                              <input class="form-control" onchange="myFunction()" type="text" id="sample-typeahead" name="sample-typeahead" required>
                              <input type="hidden" id="anggota" name="anggota" required>
                              <script>
                                  // Array dengan delimiter koma
                                  function myFunction() {

                                      //   var arrayDenganKoma = document.getElementById('sample-typeahead').value;

                                      //   // Mengganti delimiter dari koma ke semikolon
                                      //   var arrayDenganSemicolon = arrayDenganKoma;

                                      //   document.getElementById('anggota').value = arrayDenganSemicolon;
                                      //   console.log(arrayDenganSemicolon);
                                      //   console.log(document.getElementById('anggota'))
                                      console.log($('#sample-typeahead').val())
                                  }
                              </script>


                              <footer class="card-footer text-right">
                                  <a class="btn btn-secondary mr-2" href="<?= base_url("monitoring/index/timKerja") ?>">Cancel</a>
                                  <button class="btn btn-primary" type="submit">Submit</button>
                              </footer>


                          </div>
                      </div>

              </form>
          </div>
      </div>