<main>

	<div class="main-content">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">

					<ul class="nav nav-tabs">

						<?php foreach ($daftartahun as $indeks => $tahun) { ?>


							<li class="nav-item">
								<!-- buat kek gini di landing page -->
								<a class="nav-link  <?php echo $tahun['status']; ?>" href="<?php echo base_url('manajemenfile/manajemenfile/index') . '/' . $tahun['id_zperiode']; ?>">TAHUN <?php echo $tahun['Tahun']; ?></a>

								<!-- 'id_zperiode' dan 'Tahun' itu disesuaikan dengan nama tabel -->
							</li>

						<?php } ?>
					</ul>




					<div class="row">
						<?php

						if (count($daftarteam)) {
							foreach ($daftarteam as $team) {

						?>
								<div class="col-lg-4 text-center">
									<div class="card">
										<div class="card-body">
											<figure class="teaser teaser-steve" style="display: flex; flex-direction: row;">
												<img src="<?= base_url() ?>assets/bps/polos.png" alt="Steve image hover effect">
												<figcaption>
													<h2 class="card-title"><span class="text-primary"><?php echo $team['nama_team']; ?></span></h2>
													<p>
														<a name="detail_team" href="<?php echo base_url('manajemenfile/manajemenfile/myrapatupload/' . $team['id_zteam']); ?>" data-provide="tooltip" data-placement="bottom" title="Lihat Detail">Lihat Detail</a>
													</p>
												</figcaption>

											</figure>
										</div>
									</div>
								</div>
							<?php
							}
						} else {
							?>
							<div class="card">
								<div class="card-body">
									<h1 style="color: black;">TIDAK ADA DATA</h1>
								<?php
							}
								?>
								</div>
							</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<script>
		$(document).ready(function() {
			//

			// Tambahkan event listener klik pada baris tabel
			$('#mp_tabel tbody tr').click(function() {
				$(this).toggleClass('selected');
			});
		});
	</script>

	</div>
</main>
