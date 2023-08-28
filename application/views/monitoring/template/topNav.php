<body class="topbar-unfix">
    <!-- Topbar -->
    <header class="topbar topbar-expand-lg topbar-secondary topbar-inverse">
        <div class="container">
            <div class="topbar-left">
                <span class="topbar-btn topbar-menu-toggler"><i>&#9776;</i></span>

                <div class="topbar-brand">
                    <a class="menu-link" href="<?= base_url('monitoring/index/dashboard') ?>"><img width="40px" src="<?= base_url('');
                                                                                                                        ?>/assets/img/bg/logo_bps.png" alt="...">Monitoring BPS</a>
                </div>

                <div class="topbar-divider d-none d-md-block"></div>

                <nav class="topbar-navigation">
                    <ul class="menu">

                        <li class="menu-item <?php if ($tab === '1') {
                                                    echo 'active';
                                                } else {
                                                    echo '';
                                                }  ?>">
                            <a class="menu-link" href="<?= base_url('monitoring/index/dashboard');
                                                        ?>">
                                <span class="title">Home</span>
                            </a>
                        </li>

                        <li class="menu-item <?php if ($tab === '2') {
                                                    echo 'active';
                                                } else {
                                                    echo '';
                                                }  ?>">
                            <a class="menu-link" href="<?= base_url('monitoring/index/userControl');
                                                        ?>">
                                <span class="title">User</span>
                            </a>
                        </li>

                        <li class="menu-item <?php if ($tab === '3') {
                                                    echo 'active';
                                                } else {
                                                    echo '';
                                                }  ?>">
                            <a class="menu-link" href="<?= base_url('monitoring/index/kegiatan');
                                                        ?>">
                                <span class="title">Kegiatan</span>
                            </a>
                        </li>

                        <li class="menu-item <?php if ($tab === '4') {
                                                    echo 'active';
                                                } else {
                                                    echo '';
                                                }  ?>">
                            <a class="menu-link" href="<?= base_url('monitoring/index/timKerja');
                                                        ?>">
                                <span class="title">Tim Kerja</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>


            <div class="topbar-right">

                <ul class="topbar-btns">
                    <li class="dropdown">
                        <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="<?= base_url('');
                                                                                                    ?>/assets/img/avatar/1.jpg" alt="..."></span>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="ti-user"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('sso/lout') ?>"><i class="ti-power-off"></i>
                                Logout</a>
                        </div>
                    </li>


                    <li>
                        <span class="topbar-btn has-new" data-toggle="quickview" data-target="#qv-notifications"><i class="ti-bell"></i></span>
                    </li>

                </ul>

            </div>
        </div>
    </header>
    <!-- END Topbar -->
    <main class="main-container">