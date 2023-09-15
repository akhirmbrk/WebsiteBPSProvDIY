<body class="topbar-unfix">
    <!-- Topbar -->
    <header class="topbar topbar-expand-lg topbar-inverse" style="background-color: sm">
        <div class="topbar-left">
            <span class="topbar-btn topbar-menu-toggler"><i>&#9776;</i></span>

            <div class="topbar-brand">
                <?php if ($tipe == 1) { ?>
                    <a class="menu-link" href="<?= base_url('Monitoring/Index/dashboard') ?>"><img width="40px" src="<?= base_url('');
                                                                                                                        ?>/assets/img/bg/logo_bps.png" alt="...">Monitoring BPS</a>
                <?php } elseif ($tipe == 2) { ?>
                    <a class="menu-link" href="<?= base_url('Zoom/Zoomorder/') ?>"><img width="40px" src="<?= base_url('');
                                                                                                            ?>/assets/img/bg/logo_bps.png" alt="...">Zoom Order BPS</a>
                <?php } elseif ($tipe == 3) { ?>
                    <a class="menu-link" href="<?= base_url('Manajemenfile/Manajemenfile/') ?>"><img width="40px" src="<?= base_url('');
                                                                                                                        ?>/assets/img/bg/logo_bps.png" alt="...">Manajemen File BPS</a>
                <?php } else { ?>
                    <a class="menu-link" style="text-decoration:none" href="<?= base_url('Landingpage') ?>"><img width="40px" src="<?= base_url('');
                                                                                                                                    ?>/assets/img/bg/logo_bps.png" alt="...">Integrasi BPS</a>
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
                            <a class="menu-link" href="<?= base_url('Monitoring/Index/dashboard');
                                                        ?>">
                                <span class="icon fa fa-home"></span>
                                <span class="title">Home</span>
                            </a>
                        </li>

                        <?php if (($_SESSION['user_role'] == 1) || ($_SESSION['user_role'] == 2) || ($_SESSION['user_role'] == 3)) { ?>
                            <li class="menu-item <?php if ($tab === '2') {
                                                        echo 'active';
                                                    } else {
                                                        echo '';
                                                    }  ?>">
                                <a class="menu-link" href="<?= base_url('Monitoring/User');
                                                            ?>">
                                    <span class="icon fa fa-user-secret"></span>
                                    <span class="title">User</span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="menu-item <?php if ($tab === '3') {
                                                    echo 'active';
                                                } else {
                                                    echo '';
                                                }  ?>">
                            <a class="menu-link" href="<?= base_url('Monitoring/Kegiatan');
                                                        ?>">
                                <span class="icon fa fa-list-alt"></span>
                                <span class="title">Kegiatan</span>
                            </a>
                        </li>

                        <li class="menu-item <?php if ($tab === '4') {
                                                    echo 'active';
                                                } else {
                                                    echo '';
                                                }  ?>">
                            <a class="menu-link" href="<?= base_url('Monitoring/TimKerja');
                                                        ?>">
                                <span class="icon fa fa-users"></span>
                                <span class="title">Tim Kerja</span>
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
                            <a class="menu-link" href="<?php echo base_url('zoom/zoomorder/index'); ?>">
                                <span class="icon fa fa-home"></span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-item <?php if (isset($ordered)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('zoom/zoomorder/order'); ?>">
                                <span class="icon fa fa-plus"></span>
                                <span class="title">Rapat</span>
                            </a>
                        </li>



                        <li class="menu-item <?php if (isset($myorder)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('zoom/zoomorder/myorder'); ?>">
                                <span class="icon fa fa-calendar"></span>
                                <span class="title">Daftar Rapat</span>

                            </a>
                        </li>

                        <li class="menu-item <?php if (isset($myorderupload)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('zoom/zoomorder/myorderupload'); ?>">
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
                            <a class="menu-link" href="<?php echo base_url('manajemenfile/manajemenfile/index'); ?>">
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
                    <span class="topbar-btn"><?= $_SESSION['nama'] ?></span>
                    <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="<?= base_url('');
                                                                                                ?>/assets/img/avatar/1.jpg" alt="..."></span>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- <a class="dropdown-item" href="<?= base_url('Monitoring/Index/profil') ?>"><i class="ti-user"></i> Profile</a> -->
                        <!-- <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a> -->


                        <?php if ($tipe == 2 && count($defadata)) { ?>

                            <?php if ($defadata['admin_zoom'] == 1) { ?>

                                <!-- <li class="menu-item"> -->
                                <a class="dropdown-item" href="<?php echo base_url('Zoom/Adminbidang'); ?>">
                                    <span class="icon fa fa-file-text-o"></span>
                                    <span class="title">Admin</span>
                                </a>
                                <!-- </li> -->

                            <?php } ?>

                            <?php if ($defadata['admin_pst'] == 0) { ?>

                                <!-- <li class="menu-item"> -->
                                <a class="dropdown-item" href="<?php echo base_url('Zoom/Adminbidang'); ?>">
                                    <span class="icon fa fa-file-text-o"></span>
                                    <span class="title">PST</span>
                                </a>
                                <!-- </li> -->

                            <?php } ?>


                        <?php } ?>
                        <?php if ($tipe != 'landing') { ?>
                            <a class="dropdown-item" href="<?= base_url('landingpage') ?>"><i class="ti-back-left"></i>
                                Landing Page</a>
                        <?php } ?>
                        <a class="dropdown-item" href="<?= base_url('sso/lout') ?>"><i class="ti-power-off"></i>
                            Logout</a>

                    </div>
                </li>


                <!-- Notifikasi -->
                <!-- <li>
                    <span class="topbar-btn has-new" data-toggle="quickview" data-target="#qv-notifications"><i class="ti-bell"></i></span>
                </li> -->

            </ul>

        </div>
    </header>
    <!-- END Topbar -->
    <main class="main-container">