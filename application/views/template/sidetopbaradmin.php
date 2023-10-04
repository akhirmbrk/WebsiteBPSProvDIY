<!-- Sidebar -->
<aside class="sidebar sidebar-color-warning sidebar-expand-sm sidebar-icons-boxed " style="background: white; color:#465161;">
    <header class="sidebar-header bg-warning">
        <a class="menu-link" style="color:#465161;" href="<?= base_url('Admin/IndexAdmin') ?>"><img width="40px" src="<?= base_url('');
                                                                                                                        ?>/assets/img/bg/logo_bps.png" alt="...">Halaman Admin</a>
    </header>

    <nav class="sidebar-navigation ">
        <ul class="menu menu-lg menu-bordery">
            <!-- Dashboard Admin  -->
            <li class="menu-item <?php if (isset($dash_admin)) {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" style="color: #465161;" href="<?php echo base_url('Admin/IndexAdmin'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard Admin</span>
                </a>
            </li>
            <!-- END Dashboard Admin  -->

            <!-- ADMIN ZOOM -->
            <?php
            // CEK ROLE USER
            $roleRequie = [1, 3];
            if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
                <li class="menu-item <?php if (isset($admin_permintaan) || isset($admindisetujui) || isset($admindisetujui) || isset($admin_batal) || isset($admin_tambahjadwal)) {
                                            echo 'open active';
                                        } ?>">
                    <a class="menu-link" href="#" style="color: #465161;">
                        <span class="icon fa fa-video-camera"></span>
                        <span class="title">Admin Zoom</span>
                        <span class="arrow"></span>
                    </a>

                    <ul class="menu-submenu bg-light">

                        <li class="menu-item <?php if (isset($admin_permintaan)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('admin/zoom/adminbidang/index'); ?>">
                                <span class="icon fa fa-home" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Permintaan Rapat Daring</span>
                            </a>

                        </li>
                        <li class="menu-item <?php if (isset($admindisetujui)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('admin/zoom/adminbidang/daring_disetujui'); ?>">
                                <span class="icon fa fa-calendar-check-o" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Rapat Daring Disetujui</span>
                            </a>
                        </li>

                        <li class="menu-item <?php if (isset($admin_batal)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('admin/zoom/adminbidang/daring_batal'); ?>">
                                <span class="icon fa fa-calendar-times-o" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Rapat Daring Batal</span>
                            </a>
                        </li>


                        <li class="menu-item <?php if (isset($admin_tambahjadwal)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('admin/zoom/adminbidang/order'); ?>">
                                <span class="icon fa fa-calendar-plus-o" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Tambah Jadwal</span>

                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <!-- END ADMIN ZOOM -->

            <!-- ADMIN RUANGAN -->
            <?php // CEK ROLE USER
            $roleRequie = [1, 4];
            if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
                <li class="menu-item <?php if (isset($adminPermintaanRuangan) || isset($adminPermintaanRuangan) || isset($adminDiSetujuiRuangan) || isset($adminBatalRuangan) || isset($adminTambahJadwalRuangan)) {
                                            echo 'open active';
                                        } ?>">
                    <a class="menu-link" href="#" style="color: #465161;">
                        <span class="icon fa fa-users"></span>
                        <span class="title">Admin Ruangan</span>
                        <span class="arrow"></span>
                    </a>

                    <ul class="menu-submenu bg-light">

                        <li class="menu-item <?php if (isset($adminPermintaanRuangan)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('admin/ruangan/adminruangan/index'); ?>">
                                <span class="icon fa fa-home" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Permintaan Rapat</span>
                            </a>

                        </li>
                        <li class="menu-item <?php if (isset($adminDiSetujuiRuangan)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('admin/ruangan/adminruangan/daring_disetujui'); ?>">
                                <span class="icon fa fa-calendar-check-o" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Rapat Disetujui</span>
                            </a>
                        </li>

                        <li class="menu-item <?php if (isset($adminBatalRuangan)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('admin/ruangan/adminruangan/daring_batal'); ?>">
                                <span class="icon fa fa-calendar-times-o" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Rapat Batal</span>
                            </a>
                        </li>


                        <li class="menu-item <?php if (isset($adminTambahJadwalRuangan)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('admin/ruangan/adminruangan/order'); ?>">
                                <span class="icon fa fa-calendar-plus-o" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Tambah Jadwal</span>

                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <!-- END ADMIN RUANGAN -->

            <!-- ADMIN MONITORING -->
            <?php // CEK ROLE USER
            $roleRequie = [1, 2];
            if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
                <li class="menu-item <?php if (isset($tabUser) || isset($tabUserKabkota)) {
                                            echo 'open active';
                                        } ?>">
                    <a class="menu-link" href="#" style="color: #465161;">
                        <span class="icon fa fa-tv"></span>
                        <span class="title">Admin Monitoring</span>
                        <span class="arrow"></span>
                    </a>

                    <ul class="menu-submenu bg-light">

                        <li class="menu-item <?php if (isset($tabUser)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('Admin/Monitoring/User/index'); ?>">
                                <span class="icon fa fa-building" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Pegawai Provinsi</span>
                            </a>

                        </li>

                        <li class="menu-item <?php if (isset($tabUserKabkota)) {
                                                    echo 'active';
                                                } ?>">
                            <a class="menu-link" href="<?php echo base_url('Admin/Monitoring/User/userKabkota'); ?>">
                                <span class="icon fa fa-building-o" style="color: #465161;"></span>
                                <span class="title" style="color: #465161;">Pegawai Kabupaten/Kota</span>
                            </a>

                        </li>
                    </ul>
                </li>
            <?php } ?>
            <!-- END ADMIN MONITORING -->

            <li class="menu-item">
                <a class="menu-link" style="color: #465161;" href="<?php echo base_url('landingpage'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Landing Page</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link bg-red" style="color: #465161;" href="<?= base_url('sso/lout') ?>" style="bg-color:#fff; color:#e00808;">
                    <span class="icon fa fa-power-off" style="color: red"></span>
                    <span class=" title" style="color: red;">Logout</span>
                </a>
            </li>

            </li>




        </ul>
    </nav>

</aside>
<!-- END Sidebar -->


<!-- Topbar -->
<!-- <header class="topbar bg-dark" style="background: rgb(255,255,255); background: linear-gradient(133deg, rgba(255,255,255,1) 3%, rgba(255,255,255,1) 60%, rgba(247,179,50,1) 70%, rgba(252,78,27,1) 90%);"> -->
<header class="topbar bg-warning">
    <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>
    </div>

    <div class="topbar-right">


        <div class="topbar-divider"></div>

        <ul class="topbar-btns">
            <li class="dropdown">
                <span class="topbar-btn"><img class="avatar" src="<?php echo base_url(); ?>assets/img/avatar/1.jpg" alt="..."></span>
            </li>
            <li class="dropdown d-none d-md-block">
                <span class="topbar-btn"><?= $_SESSION['nama'] ?></span>
            </li>
        </ul>

    </div>
</header>
<!-- END Topbar -->
