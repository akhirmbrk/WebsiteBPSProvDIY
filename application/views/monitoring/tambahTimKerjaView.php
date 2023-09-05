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
              <form class="row" method="post" enctype="multipart/form-data">


                  <div class="col-md-7 col-xl-8">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail Tim Kerja</strong></h4>

                          <div class="card-body">
                              <label class="require">Kode BPS</label>
                              <select nama="kodeBPS" class="form-control" data-provide="selectpicker">
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
                              <label class="require">Jenis Tim Kerja</label>
                              <select class="form-control" data-provide="selectpicker">
                                  <?php
                                    if (count($tim_kerja)) {
                                        foreach ($tim_kerja as $indeks => $item) {  ?>
                                          <option><?php echo $item['nama_tim_kerja']; ?></option>
                                  <?php }
                                    } ?>
                              </select>

                              <hr>
                              <label class="require">Periode</label>
                              <select class="form-control" data-provide="selectpicker">
                                  <?php
                                    if (count($periode)) {
                                        foreach ($periode as $indeks => $item) {  ?>
                                          <option><?php echo $item['Tahun']; ?></option>
                                  <?php }
                                    } ?>
                              </select>
                              <hr>
                              <label id="anggota" class="require">Anggota</label>
                              <input class="form-control" onchange="myFunction()" type="text" id="sample-typeahead">

                          </div>
                          <script>
                              var y = document.getElementById('sample-typeahead')

                              function myFunction() {
                                  var x = []
                                  x = y.value

                                  for (let i = 0; i < x.length; i++) {
                                      const element = x[i];

                                  }
                              }
                          </script>


                          <footer class="card-footer text-right">
                              <a class="btn btn-secondary mr-2" href="#">Cancel</a>
                              <button class="btn btn-primary" type="submit">Submit</button>
                          </footer>


                      </div>
                  </div>

              </form>
          </div>
      </div>