  <!-- Main container -->
  <main class="main-container">


  	<header class="header header-inverse mb-0" style="background:rgba(243,243,243,255)">
  		<!-- <div class="container"> -->
  		<div class="header-info">
  			<div class="left">
  				<br>
  				<h2 class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;
text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">
  					<strong>Tambah Anggota Tim Kerja</strong>
  					<small class="subtitle" style="color: black;
text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Isikan form
  						berikut sesuai dengan kebutuhan tim kerja yang ingin dibuat.
  					</small>
  				</h2>
  			</div>
  		</div>

  		<div class="header-action">
  			<nav class="nav">

  			</nav>
  		</div>
  		<!-- </div> -->
  	</header>
  	<!--/.header -->
  	<div class="main-content">

  		<div class="container">
  			<?php if (count($anggota)) {
					$edit = 1;
					echo "EDIT";
				} else {
					$edit = 0;
				} ?>
  			<form class="row" action="<?= base_url('') ?>Admin/Monitoring/TimKerja/addTimUser/<?= $edit ?>" method="post" enctype="multipart/form-data">


  			<div class="col-md-8 col-xl-12">
  				<div class="card shadow-1">
  					<h4 class="card-title"><strong>Detail Tim Kerja</strong></h4>

  						<div class="card-body">
  							<label class="">Nama Tim</label>
  							<label name="labelTimKerja" class="form-control"><?= $tim['nama_team'] ?></label>
  							<input type="hidden" id="timKerja" name="timKerja" value="<?= $idTim ?>" required>


  							<hr>
  							<label class="">Periode</label>
  							<label name="labelPeriode" class="form-control"><?= $periodeTim['Tahun'] ?> </label>
  							<hr>
  							<div><small>Yang pertama merupakan ketua tim</small></div>
  							<label class="require">Anggota</label>
  							<?php
								// var_dump($anggota);
								$value = [];
								if (count($anggota)) {
									foreach ($anggota as $i => $member) {
										// echo $member['id_user'] . "-" . $member['nama_peg'] . "<br>";
										$value[$i] = str_replace(',', ' ', $member['nama_peg']);
									}
									// var_dump($value);
									// die;
								} ?>
  							<input autocomplete="off" class="form-control" value="<?php foreach ($value as $value) {
																						echo $value . ",";
																					} ?>" onchange="myFunction()" type="text" id="sample-typeahead" name="sample-typeahead" required>
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
  							<a class="btn btn-secondary mr-2" href="<?= base_url("Admin/Monitoring/TimKerja/detailTimKerja/") . $idTim . "/" . $periodeTim['id_zperiode'] ?>">Cancel</a>
  							<button class="btn btn-primary" type="submit">Submit</button>
  						</footer>


  					</div>
  				</div>

  		</form>
  		<!-- </div> -->
  	</div>