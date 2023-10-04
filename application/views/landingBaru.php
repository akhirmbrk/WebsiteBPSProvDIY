<?php
$this->load->view('template/topnav');
?>

<body>
	<section id="up"></section>
	<section id="down"></section>
	<section id="left"></section>
	<section id="right"></section>
</body>

<div class="row no-margin">
	<div id="slider" class="col-12">
		<br>
		<?php echo $this->session->flashdata('info_form');  ?>
		<div class="container mx-auto text-center">


			<br>
			<span class="fs-50 fw-900">MENU UTAMA</span>
			<br>
			<br>
			<!-- <div class="flexbox flex-justified">
				<span>
					<div class="slider-card">
						<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>/ManajemenFile/Manajemenfile">
							<img class="fileImg" src="<?= base_url('') ?>/assets/img/fileLogo.png" alt="" />
						</a>
					</div>
				</span>
				<span>
					<div class="slider-card">
						<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>/Monitoring/Index/dashboard">
							<img class="monitoringImg" src="<?= base_url('') ?>/assets/img/monitoringLogo.png" alt="">
						</a>
					</div>
				</span>
				<span>
					<div class="slider-card">
						<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>/Zoom/zoomorder">
							<img class="rapatImg" src="<?= base_url('') ?>/assets/img/rapatLogo.png" alt="" />
						</a>
					</div>
				</span>
				<span>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-center mb-4">
							<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url('/admin/zoom/adminbidang') ?>">
								<img class="adminImg" src="<?= base_url('') ?>/assets/img/logoAdmin.png" alt="">
							</a>
						</div>
				</span>
			</div> -->
			<!-- <div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="slider-card">
							<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>/ManajemenFile/Manajemenfile">
								<img class="fileImg" src="<?= base_url('') ?>/assets/img/fileLogo.png" alt="" />
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="slider-card">
							<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>/ManajemenFile/Manajemenfile">
								<img class="fileImg" src="<?= base_url('') ?>/assets/img/fileLogo.png" alt="" />
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="slider-card">
							<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>/ManajemenFile/Manajemenfile">
								<img class="fileImg" src="<?= base_url('') ?>/assets/img/fileLogo.png" alt="" />
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="slider-card">
							<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>/ManajemenFile/Manajemenfile">
								<img class="fileImg" src="<?= base_url('') ?>/assets/img/fileLogo.png" alt="" />
							</a>
						</div>
					</div>
				</div>
			</div> -->
			<div class="container">
				<div class="row d-flex flex-row align-items-center">
					<div class="col-md-6 col-sm-20">
						<div class="slider-card">
							<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>ManajemenFile/Manajemenfile">
								<img class="fileImg" src="<?= base_url('') ?>/assets/img/fileLogo.png" alt="" />
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-20">
						<div class="slider-card">
							<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>Monitoring/Index/dashboard">
								<img class="monitoringImg" src="<?= base_url('') ?>/assets/img/monitoringLogo.png" alt="">
							</a>
						</div>
					</div>
				</div>
				<div class="row d-flex justify-content-center align-items-center">
					<?php
					// CEK ROLE USER
					$roleRequie = [1, 2, 3, 4];
					if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
						<div class="col-md-6 col-sm-12">
						<?php } else { ?>
							<div class="col-md-12 col-sm-12">
							<?php } ?>
							<div class="slider-card">
								<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>Zoom/zoomorder">
									<img class="rapatImg" src="<?= base_url('') ?>/assets/img/rapatLogo.png" alt="" />
								</a>
							</div>
							</div>
							<?php
							// CEK ROLE USER
							if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
								<div class="col-md-6 col-sm-12">
									<div class="slider-card">
										<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url('/Admin/IndexAdmin') ?>">
											<img class="adminImg" src="<?= base_url('') ?>/assets/img/logoAdmin.png" alt="">
										</a>
									</div>
								</div>
							<?php } ?>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>



</body>

</html>
