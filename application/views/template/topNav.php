<body class="topbar-unfix">

	<?php if ($tipe == 1) { ?>
		<header class="topbar topbar-expand-lg  topbar-inverse " style="background:rgba(43,87,154,255)">
		<?php } elseif ($tipe == 2) { ?>
			<header class="topbar topbar-expand-lg  topbar-inverse " style="background:rgba(43,87,154,255)">
			<?php } elseif ($tipe == 3) { ?>
				<header class="topbar topbar-expand-lg  topbar-inverse " style="background:rgba(43,87,154,255)">
				<?php } elseif ($tipe == 'Landing') { ?>
					<header class="topbar topbar-expand-lg  topbar-inverse" style="background: rgb(255,255,255); background: linear-gradient(133deg, rgba(255,255,255,1) 3%, rgba(255,255,255,1) 60%, rgba(0,150,222,1) 70%, rgba(104,186,42,1) 80%, rgba(236,138,20,1) 90%);">
					<?php } ?>

					<div class="topbar-left">
						<?php if ($tipe == 1 || $tipe == 2 || $tipe == 3) { ?>
							<span class="topbar-btn topbar-menu-toggler"><i style="color: whitesmoke">&#9776;</i></span>
						<?php } else { ?>
						<?php } ?>

						<div class="topbar-brand">
							<?php if ($tipe == 1) { ?>
								<a class="menu-link" style="color:whitesmoke;" href="<?= base_url('Monitoring/Index/dashboard') ?>"><img width="40px" src="<?= base_url('');
																																							?>/assets/img/bg/logo_bps.png" alt="...">Monitoring BPS</a>
							<?php } elseif ($tipe == 2) { ?>

								<a class="menu-link" style="color:whitesmoke;" href="<?= base_url('Zoom/Zoomorder/') ?>"><img width="40px" src="<?= base_url('');
																																				?>/assets/img/bg/logo_bps.png" alt="...">Manajemen Rapat</a>
							<?php } elseif ($tipe == 3) { ?>
								<a class="menu-link" style="color:whitesmoke;" href="<?= base_url('Manajemenfile/Manajemenfile/') ?>"><img width="40px" src="<?= base_url('');
																																								?>/assets/img/bg/logo_bps.png" alt="...">Manajemen File BPS</a>
							<?php } else { ?>
								<a class="menu-link" style="text-decoration:none" href="<?= base_url('Landingpage') ?>"><img width="75px" src="<?= base_url('');
																																				?>/assets/img/logojoglo.png" alt="...">Integrasi BPS</a>
							<?php } ?>
						</div>

						<div class="topbar-divider d-none d-md-block"></div>

						<?php if ($tipe == 1) { ?>
							<nav class="topbar-navigation">
								<ul class="menu">

									<li class="menu-item <?php if ($tab === '1') {
																echo 'active';
															} else {
																echo '';
															}  ?>">
										<a class="menu-link" style="color: whitesmoke;" href="<?= base_url('Monitoring/Index/dashboard');
																								?>">
											<span class="icon fa fa-home"></span>
											<span class="title">Home</span>
										</a>
									</li>

									<li class="menu-item <?php if ($tab === '3') {
																echo 'active';
															} else {
																echo '';
															}  ?>">
										<a class="menu-link" style="color: whitesmoke;" href="<?= base_url('Monitoring/Kegiatan');
																								?>">
											<span class="icon fa fa-list-alt"></span>
											<span class="title">Kegiatan</span>
										</a>
									</li>

								</ul>
							</nav>
						<?php } elseif ($tipe == 2) { ?>
							<nav class="topbar-navigation">
								<ul class="menu">

									<li class="menu-item  <?php if (isset($dash)) {
																echo 'active';
															} ?>">
										<a class="menu-link" style="color: whitesmoke;" style="color: whitesmoke;" href="<?php echo base_url('zoom/zoomorder/index'); ?>">
											<span class="icon fa fa-home"></span>
											<span class="title">Dashboard</span>
										</a>
									</li>

									<li class="menu-item <?php if (isset($ordered)) {
																echo 'active';
															} ?>">
										<a class="menu-link" style="color: whitesmoke;" href="<?php echo base_url('zoom/zoomorder/order'); ?>">
											<span class="icon fa fa-plus"></span>
											<span class="title">Rapat</span>
										</a>
									</li>



									<li class="menu-item <?php if (isset($myorder)) {
																echo 'active';
															} ?>">
										<a class="menu-link" style="color: whitesmoke;" href="<?php echo base_url('zoom/zoomorder/myorder'); ?>">
											<span class="icon fa fa-calendar"></span>
											<span class="title">Daftar Rapat</span>

										</a>
									</li>

									<li class="menu-item <?php if (isset($myorderupload)) {
																echo 'active';
															} ?>">
										<a class="menu-link" style="color: whitesmoke;" href="<?php echo base_url('zoom/zoomorder/myorderupload'); ?>">
											<span class="icon fa fa-upload"></span>
											<span class="title">Upload Notula</span>
										</a>
									</li>
								</ul>
							</nav>

						<?php } elseif ($tipe == 3) { ?>
							<nav class="topbar-navigation">
								<ul class="menu">

									<li class="menu-item  <?php if (isset($dash)) {
																echo 'active';
															} ?>">
										<a class="menu-link" style="color: whitesmoke;" href="<?php echo base_url('manajemenfile/manajemenfile/index'); ?>">
											<span class="icon fa fa-home"></span>
											<span class="title">Dashboard</span>
										</a>
									</li>
								</ul>
							</nav>
						<?php } ?>
					</div>


					<div class="topbar-right">

						<ul class="topbar-btns">
							<li class="dropdown">
								<span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="<?= base_url('');
																											?>/assets/img/avatar/1.jpg" alt="..."></span>
								<div class="dropdown-menu dropdown-menu-right">
									<!-- <a class="dropdown-item" href="<?= base_url('Monitoring/Index/profil') ?>"><i class="ti-user"></i> Profile</a> -->
									<!-- <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a> -->
									<?php if ($tipe != 'Landing') { ?>
										<a class="dropdown-item" href="<?= base_url('landingpage') ?>"><i class="ti-back-left"></i>
											Landing Page</a>
									<?php } ?>
									<a class="dropdown-item" href="<?= base_url('sso/lout') ?>"><i class="ti-power-off"></i>
										Logout</a>

								</div>
							</li>
							<li class="dropdown d-none d-md-block">
								<span class="topbar-btn" style="color:whitesmoke;"><?= $_SESSION['nama'] ?></span>
							</li>




						</ul>

					</div>
					</header>
					<!-- END Topbar -->
					<main class="main-container">
