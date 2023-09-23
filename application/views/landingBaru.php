<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive admin dashboard and web application ui kit.">
	<meta name="keywords" content="dashboard, index, main">

	<title><?php echo $title;
			if ($tipe == 1) {
				echo ' &mdash; Monitoring BPS';
			} elseif ($tipe == 2) {
				echo ' &mdash; Zoom Order';
			} else {
				echo ' &mdash; Landing Page';
			} ?></title>
	<!-- Bootstrap CSS -->
	<!-- Styles -->
	<link href="<?= base_url(''); ?>assets/css/core.min.css" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/css/app.min.css" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/css/style.min.css" rel="stylesheet">
	<!-- <link href="<?= base_url(''); ?>assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet"> -->


	<!-- Favicons -->
	<link rel="apple-touch-icon" href="<?= base_url(''); ?>assets/img/apple-touch-icon.png">
	<link rel="icon" href="<?= base_url(''); ?>assets/img/bg/logo_bps.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/owl.theme.default.min.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/style.css" /> -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/landing.css" />
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/global.css" />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Markazi Text:wght@600&display=swap" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" />
</head>

<?php
$this->load->view('template/topnav');
?>

<div class="row no-margin">
	<div id="slider" class="col-12">
		<br>
		<?php echo $this->session->flashdata('info_form');  ?>
		<div class="container mx-auto text-center">


			<span class="fs-50 fw-900" style="font-family: var(--font-markazi-text)">MENU UTAMA</span>
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
					<div class="col-md-6 col-sm-12">
						<div class="slider-card">
							<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url() ?>Zoom/zoomorder">
								<img class="rapatImg" src="<?= base_url('') ?>/assets/img/rapatLogo.png" alt="" />
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="slider-card">
						<a class="d-flex justify-content-center align-center mb-4" href="<?= base_url('/admin/zoom/adminbidang') ?>">
								<img class="adminImg" src="<?= base_url('') ?>/assets/img/logoAdmin.png" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>







<!-- Optional JavaScript; choose one of the two! -->
<script src="<?= base_url(''); ?>assets/js/core.min.js" data-provide="typeahead"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- <script src="<?= base_url() ?>/assets/js/carousel.landing.js"></script>
<script src="<?= base_url() ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/assets/js/owl.carousel.js"></script> -->
<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>





</body>