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

    <!-- Styles -->
    <link href="<?= base_url(''); ?>assets/css/core.min.css" rel="stylesheet">
    <link href="<?= base_url(''); ?>assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url(''); ?>assets/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url(''); ?>assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?= base_url(''); ?>assets/img/apple-touch-icon.png">
    <link rel="icon" href="<?= base_url(''); ?>assets/img/logojoglo.png">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/landing.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/global.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Markazi Text:wght@600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" />
</head>
