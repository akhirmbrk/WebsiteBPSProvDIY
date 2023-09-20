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

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Krona+One" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/vendor/material-icons/css/material-icons.css" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/vendor/prism/prism.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Styles -->
	<link href="<?= base_url(''); ?>assets/css/core.min.css" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/css/app.min.css" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/css/style.min.css" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/css/style.css" rel="stylesheet">
	<link href="<?= base_url(''); ?>assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="<?= base_url(''); ?>assets/img/apple-touch-icon.png">
	<link rel="icon" href="<?= base_url(''); ?>assets/img/bg/logo_bps.png">

	<!-- salju -->
	<style>

	</style>

	<!-- end salju -->


	<!-- Open Graph Tags
    <meta property="og:title" content="The Admin Template of 2018!">
    <meta property="og:description" content="TheAdmin is a responsive, professional, and multipurpose admin template powered with Bootstrap 4.">
    <meta property="og:image" content="http://thetheme.io/theadmin/assets/img/og-img.jpg">
    <meta property="og:url" content="http://thetheme.io/theadmin/">
    <meta name="twitter:card" content="summary_large_image"> -->
</head>