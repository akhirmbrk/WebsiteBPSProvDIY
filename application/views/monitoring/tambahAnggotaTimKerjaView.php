  <!-- Main container -->
  <main class="main-container">


      <header class="header header-inverse" style="background-image: url(<?= base_url('assets/img/bg/bluehead.png') ?>);">
          <div class="container">
              <div class="header-info">
                  <div class="left">
                      <br>
                      <div class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong>Buat Tim Kerja</strong><small class="subtitle" style="color: black;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Isikan form
                              berikut sesuai dengan kebutuhan tim kerja yang ingin dibuat.</small></div>
                  </div>
              </div>

              <div class="header-action">
                  <nav class="nav">

                  </nav>
              </div>
          </div>
      </header>
      <!--/.header -->

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
