<!-- Sidebar -->
<aside class="sidebar sidebar-expand-sm sidebar-icons-boxed " style="background: #465161;">
    <header class="sidebar-header " style="background: #465161;">
        <span class="logo"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo"></span>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu menu-xl">


            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-video-camera"></span>
                    <span class="title">Admin Zoom</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">

                    <li class="menu-item <?php if (isset($admin_permintaan)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('admin/zoom/adminbidang/index'); ?>">
                            <span class="icon fa fa-home"></span>
                            <span class="title">Permintaan Rapat Daring</span>
                        </a>

                    </li>
                    <li class="menu-item <?php if (isset($admindisetujui)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('admin/zoom/adminbidang/daring_disetujui'); ?>">
                            <span class="icon fa fa-calendar-check-o"></span>
                            <span class="title">Rapat Daring Disetujui</span>
                        </a>
                    </li>

                    <li class="menu-item <?php if (isset($admin_batal)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('admin/zoom/adminbidang/daring_batal'); ?>">
                            <span class="icon fa fa-calendar-times-o"></span>
                            <span class="title">Rapat Daring Batal</span>
                        </a>
                    </li>


                    <li class="menu-item <?php if (isset($admin_tambahjadwal)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('admin/zoom/adminbidang/order'); ?>">
                            <span class="icon fa fa-calendar-plus-o"></span>
                            <span class="title">Tambah Jadwal</span>

                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-users"></span>
                    <span class="title">Admin Ruangan</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">

                    <li class="menu-item <?php if (isset($admin_permintaan)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/index'); ?>">
                            <span class="icon fa fa-home"></span>
                            <span class="title">Permintaan Rapat</span>
                        </a>

                    </li>
                    <li class="menu-item <?php if (isset($admindisetujui)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/daring_disetujui'); ?>">
                            <span class="icon fa fa-calendar-check-o"></span>
                            <span class="title">Rapat Disetujui</span>
                        </a>
                    </li>

                    <li class="menu-item <?php if (isset($admin_batal)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/daring_batal'); ?>">
                            <span class="icon fa fa-calendar-times-o"></span>
                            <span class="title">Rapat Batal</span>
                        </a>
                    </li>


                    <li class="menu-item <?php if (isset($admin_tambahjadwal)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/order'); ?>">
                            <span class="icon fa fa-calendar-plus-o"></span>
                            <span class="title">Tambah Jadwal</span>

                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-tv"></span>
                    <span class="title">Admin Monitoring</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">

                    <li class="menu-item <?php if (isset($admin_permintaan)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/index'); ?>">
                            <span class="icon fa fa-home"></span>
                            <span class="title">Permintaan Rapat</span>
                        </a>

                    </li>
                    <li class="menu-item <?php if (isset($admindisetujui)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/daring_disetujui'); ?>">
                            <span class="icon fa fa-calendar-check-o"></span>
                            <span class="title">Rapat Disetujui</span>
                        </a>
                    </li>

                    <li class="menu-item <?php if (isset($admin_batal)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/daring_batal'); ?>">
                            <span class="icon fa fa-calendar-times-o"></span>
                            <span class="title">Rapat Batal</span>
                        </a>
                    </li>


                    <li class="menu-item <?php if (isset($admin_tambahjadwal)) {
                                                echo 'active';
                                            } ?>">
                        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/order'); ?>">
                            <span class="icon fa fa-calendar-plus-o"></span>
                            <span class="title">Tambah Jadwal</span>

                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?php echo base_url('zoom/zoomorder'); ?>">
                    <span class="icon fa fa-reply"></span>
                    <span class="title">Back</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?php echo base_url('landingpage'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Landing Page</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?= base_url('sso/lout') ?>" style="bg-color:#fff; color:#e00808;">
                    <span class="icon fa fa-power-off"></span>
                    <span class="title">Logout</span>
                </a>
            </li>

            </li>




        </ul>
    </nav>

</aside>
<!-- END Sidebar -->


<!-- Topbar -->
<header class="topbar bg-dark">
    <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>


    </div>

    <div class="topbar-right">


        <div class="topbar-divider"></div>

        <ul class="topbar-btns">
            <li class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="<?php echo base_url(); ?>assets/img/avatar/1.jpg" alt="..."></span>
                <!-- <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item" href="<?php echo base_url('sso/lout'); ?>"><i class="ti-power-off"></i>
                         Logout</a>

                 </div> -->
            </li>



        </ul>

    </div>
</header>
<!-- END Topbar -->