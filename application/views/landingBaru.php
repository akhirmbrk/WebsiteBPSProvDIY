<?php
$this->load->view('template/topnav');
?>


<div class="wrapper">
	<span></span>
	<span></span>
	<span></span>
	<span></span>
	<span></span>
	<span></span>
	<span></span>
	<span></span>
	<span></span>
	<span></span>
</div>

<div class="row no-margin">

	<div id="slider" class="col-12">
		<br>
		<?php echo $this->session->flashdata('info_form'); ?>
		<div class="container mx-auto text-center">


			<span class="fs-50 fw-900">MENU UTAMA</span>
			<br>
			<br>

			<div class="container">
				<div class="row d-flex flex-row align-items-center">
					<div class="col-md-6 col-sm-20">
						<div class="slider-card">
							<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>Monitoring/Index/dashboard">
								<img class="monitoringImg" src="<?= base_url('') ?>/assets/img/monitoringLogo.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-20">
						<?php
						// var_dump($_SESSION);
						// die;
						// CEK ROLE USER
						$roleRequie = [1, 2, 3, 4];
						if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
							<div class="slider-card">
								<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>ManajemenFile/Manajemenfile">
									<img class="fileImg" src="<?= base_url('') ?>/assets/img/fileLogo.png" alt="" />
								</a>
							</div>
						<?php } else { ?>
							<img class="fileImg" src="<?= base_url('') ?>/assets/img/fileLogo.png" alt="" style="filter: grayscale(70%) brightness(70%);" />
						<?php } ?>
					</div>
				</div>
				<div class="row d-flex justify-content-center align-items-center">
					<?php
					// var_dump($_SESSION);
					// die;
					// CEK ROLE USER
					$roleRequie = [1, 2, 3, 4];
					if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
						<div class="col-md-6 col-sm-12">
						<?php } else { ?>
							<div class="col-md-12 col-sm-12">
							<?php } ?>
							<!-- CEK ROLE USER -->
							<?php $roleRequie = [1, 2, 3, 4];
							if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
								<div class="slider-card">
									<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url('Zoom/zoomorder') ?>">
										<img class="rapatImg" src="<?= base_url('') ?>/assets/img/rapatLogo.png" alt="" />
									</a>
								</div>
							<?php } else { ?>
								<img src="<?= base_url('') ?>/assets/img/rapatLogo.png" alt="" style="filter: grayscale(70%) brightness(70%);" />
							<?php } ?>
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