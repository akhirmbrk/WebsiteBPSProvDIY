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
              <form class="row" action="<?= base_url('') ?>Monitoring/TimKerja/addTimUser" method="post" enctype="multipart/form-data">


                  <div class="col-md-7 col-xl-8">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail Tim Kerja</strong></h4>

                          <div class="card-body">
                              <label class="">Nama Tim</label>
                              <label name="labelTimKerja" class="form-control"><?= $namaTim ?></label>
                              <input type="hidden" id="timKerja" name="timKerja" value="<?= $idTim ?>" required>


                              <hr>
                              <label class="">Periode</label>
                              <label name="labelPeriode" class="form-control"><?= $periodeTim['Tahun'] ?> </label>
                              <hr>
                              <div><small>Yang pertama merupakan ketua tim</small></div>
                              <label class="require">Anggota</label>
                              <input autocomplete="off" class="form-control" onchange="myFunction()" type="text" id="sample-typeahead" name="sample-typeahead" required>
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
                                  <a class="btn btn-secondary mr-2" href="<?= base_url("Monitoring/TimKerja/detailTimKerja/") . $idTim . "/" . $periodeTim['id_zperiode'] ?>">Cancel</a>
                                  <button class="btn btn-primary" type="submit">Submit</button>
                              </footer>


                          </div>
                      </div>

              </form>
          </div>
      </div>