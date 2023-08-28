<!-- Sidebar -->
<aside class="sidebar sidebar-expand-lg sidebar-icons-boxed sidebar-light">
  <header class="sidebar-header">
    <span class="logo"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo"></span>
  </header>

  <nav class="sidebar-navigation">
    <ul class="menu">

      <li class="menu-item  <?php if (isset($admin_permintaan)) {
                              echo 'active';
                            } ?>">
        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/index'); ?>">
          <span class="icon fa fa-home"></span>
          <span class="title">Permintaan Rapat Daring</span>
        </a>
      </li>

      <li class="menu-item <?php if (isset($admindisetujui)) {
                              echo 'active';
                            } ?>">
        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/daring_disetujui'); ?>">
          <span class="icon fa fa-briefcase"></span>
          <span class="title">Rapat Daring Disetujui</span>
        </a>
      </li>

      <li class="menu-item <?php if (isset($admin_batal)) {
                              echo 'active';
                            } ?>">
        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/daring_batal'); ?>">
          <span class="icon fa fa-briefcase"></span>
          <span class="title">Rapat Daring Batal</span>
        </a>
      </li>


      <li class="menu-item <?php if (isset($admin_tambahjadwal)) {
                              echo 'active';
                            } ?>">
        <a class="menu-link" href="<?php echo base_url('zoom/adminbidang/order'); ?>">
          <span class="icon fa fa-user"></span>
          <span class="title">Tambah Jadwal</span>

        </a>
      </li>

      <li class="menu-item">
        <a class="menu-link" style="bg-color:#fff; color:#e00808;" href="<?php echo base_url('zoom/zoomorder'); ?>">
          <span class="icon fa fa-file-text-o"></span>
          <span class="title">Switch Akun</span>
        </a>
      </li>



    </ul>
  </nav>

</aside>
<!-- END Sidebar -->


<!-- Topbar -->
<header class="topbar">
  <div class="topbar-left">
    <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>


  </div>

  <div class="topbar-right">


    <div class="topbar-divider"></div>

    <ul class="topbar-btns">
      <li class="dropdown">
        <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="<?php echo base_url(); ?>assets/img/avatar/1.jpg" alt="..."></span>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="<?php echo base_url('zoom/sso/lout'); ?>"><i class="ti-power-off"></i>
            Logout</a>
        </div>
      </li>



    </ul>

  </div>
</header>
<!-- END Topbar -->