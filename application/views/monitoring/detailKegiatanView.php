<header class="header header-inverse mb-0" style="background:rgba(243,243,243,255);">
	<div class="container">
		<div class="header-info">
			<div class="left">
				<br>
				<h2 class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;
							text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><?= $detail_kegiatan['judul_kegiatan'] ?>
					<small class="subtitle" style="color: black;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><?= $tim_kerja['nama_team'] ?></small>
				</h2>
			</div>
		</div>
	</div>

	<div class="header-action">
		<?php // CEK ROLE USER
		$roleRequie = [1, 6];
		if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
			<div class="buttons">
				<a class="btn btn-primary btn-float" href="<?= base_url('monitoring/kegiatan/editKegiatan/') . $detail_kegiatan['id_kegiatan'] ?>" title="Update Progres Kegiatan" data-provide="tooltip"><i class="ti-pencil"></i></a>
			</div>
		<?php } ?>

	</div>
	</div>
</header>
<!--/.header -->



	<div class="main-content">
		
		<div class="container">

			<? //= var_dump($detail_kegiatan) 
			?>
			<div class="card shadow-1">

				<div class="card-body" style="text-align: center;">
					<h2 class="header-title "><strong>Progress Kegiatan</strong></h2>
					<br>
					<!-- <div data-provide="easypie" data-size="200" data-line-width="10" data-percent="<?= $detail_kegiatan['progres_kegiatan'] ?>%" data-color="<?php if ($detail_kegiatan['progres_kegiatan']  <= 25) {
																																										echo "#f96868";
																																									} elseif ($detail_kegiatan['progres_kegiatan']  <= 50) {
																																										echo "#f2a654";
																																									} elseif ($detail_kegiatan['progres_kegiatan']  <= 75) {
																																										echo "#48b0f7";
																																									} else {
																																										echo "#46be8a";
																																									} ?>" data-scale-color="transparent">

						<span class="easypie-data lead" style="font-size:26px">
							<?= $detail_kegiatan['progres_kegiatan']  ?>%
						</span>
					</div> -->

				</div>
				<br>
				<?php if ($detail_kegiatan['time_update'] == null || $detail_kegiatan['last_user_update'] == null) { ?>
					<small class="ml-3"><i>Belum diupdate</i></small>
				<?php } else { ?>
					<small class="ml-3"><i><?= $detail_kegiatan['time_update'] . '<span class="divider-dash"></span>' . $detail_kegiatan['last_user_update'] ?></i></small>
				<?php } ?>
			</div>
			<div class="card shadow-1">
				<div class="card-body">
					<h5>Detail Progres Kegiatan</h5>
					<?= $detail_kegiatan['deskripsi_kegiatan'] ?>
				</div>
			</div>
		</div>

	</div>


<!-- <div class="card shadow-1">
            <div class="card-body">
                Deskripsi Kegiatan bisa di hide
            </div>

        </div> -->



</div>
</div>
