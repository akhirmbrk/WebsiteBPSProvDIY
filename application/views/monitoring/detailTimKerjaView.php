  <header class="header header-inverse mb-0" style="background:rgba(243,243,243,255);">
  	<div class="container">
  		<div class="header-info">
  			<div class="left">
  				<br>
  				<h2 class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Anggota Tim Kerja <small class="subtitle"></small></h2>
  			</div>
  		</div>
  	</div>
  </header><!--/.header -->


  <div class="main-content">

  	<div class="container">
  		<div class="row">

  			<div class="col-md-8 col-xl-9">
  				<?php
					// var_dump($member[0]);
					if (count($member)) {
						foreach ($member as $indeks => $item) {  ?>
  						<div class="card shadow-1">
  							<header class="card-header bg-lightest">
  								<div class="card-title flexbox">
  									<img class="avatar" src="<?= base_url('') ?>/assets/img/avatar/1.jpg" alt="...">
  									<div>
  										<h5 class="mb-0"><?= $item['nama_peg'] ?>
  											<small class="sidetitle fs-11"><?= $item['nip_lama'] ?></small>
  										</h5>
  										<small class=""><?php if ($item['id_user'] == $item['id_ketuatim']) {
																echo 'Ketua Tim';
															} else {
																echo 'Anggota';
															} ?></small>
  									</div>
  								</div>
  							</header>

  							<div class="card-body">
  								<p></p>
  							</div>

  						</div>
  					<?php }
					} else { ?>
  					<div class="card shadow-1">
  						<h4 class="m-3">
  							Admin Belum menambahkan anggota Tim
  						</h4>
  					</div>
  				<?php } ?>



  				<br>
  				<br>


  			</div>


  			<div class="col-md-4 col-xl-3">

  			</div>


  		</div>
  	</div>
  </div>