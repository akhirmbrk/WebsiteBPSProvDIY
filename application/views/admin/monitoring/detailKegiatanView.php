<main>
	<header class="header header-inverse mb-0" style="background:rgba(243,243,243,255);">
		<div class="container">
			<div class="header-info">
				<div class="left">
					<br>
					<h2 class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;
							text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><?= $progres_kegiatan['judul_kegiatan'] ?>
						<small class="subtitle" style="color: black;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><?= $tim_kerja['nama_team'] ?></small>
					</h2>
				</div>
			</div>
		</div>

		<div class="header-action">
			<?php // CEK ROLE USER
			$roleRequie = [1, 2];
			if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
				<div class="buttons">
					<a class="btn btn-primary btn-float" href="<?= base_url('admin/monitoring/kegiatan/editKegiatan/') . $progres_kegiatan['id_kegiatan'] . "/" . $kodeKabKota ?>" title="Update Progres Kegiatan" data-provide="tooltip"><i class="ti-pencil"></i></a>
				</div>
			<?php } ?>

		</div>
	</header>
	<!--/.header -->



	<div class="main-content">

		<div class="container">

			<? //= var_dump($progres_kegiatan) 
			?>
			<div class="card shadow-1">

				<div class="card-body" style="text-align: center;">
					<h2 class="header-title "><strong>Progress Kegiatan</strong></h2>
					<br>
					<div data-provide="easypie" data-size="200" data-line-width="10" data-percent="<?= $progres_kegiatan['persen_progres'] ?>%" data-color="<?php if ($progres_kegiatan['progres_' . $kodeKabKota]  <= 25) {
																																								echo "#f96868";
																																							} elseif ($progres_kegiatan['progres_' . $kodeKabKota]  <= 50) {
																																								echo "#f2a654";
																																							} elseif ($progres_kegiatan['progres_' . $kodeKabKota]  <= 75) {
																																								echo "#48b0f7";
																																							} else {
																																								echo "#46be8a";
																																							} ?>" data-scale-color="transparent">

						<span class="easypie-data lead" style="font-size:26px">
							<?= $progres_kegiatan['persen_progres']  ?>%
						</span>
					</div>

				</div>
				<br>
				<?php if ($progres_kegiatan['last_time_update'] == null || $progres_kegiatan['last_user_update'] == null) { ?>
					<small class="ml-3"><i>Belum diupdate</i></small>
				<?php } else { ?>
					<small class="ml-3"><i><?= $progres_kegiatan['last_time_update'] . '<span class="divider-dash"></span>' . $progres_kegiatan['last_user_update'] ?></i></small>
				<?php } ?>
			</div>
			<div class="card shadow-1">
				<div class="card-body">
					<h5>Detail Progres Kegiatan</h5>
					<?= $progres_kegiatan['deskripsi_progres'] ?>
				</div>
			</div>
		</div>

	</div>


	<!-- <div class="card shadow-1">
            <div class="card-body">
                Deskripsi Kegiatan bisa di hide
            </div>

        </div> -->