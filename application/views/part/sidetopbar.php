<!-- Sidebar -->
<aside class="sidebar sidebar-expand-lg sidebar-iconic">
  <header class="sidebar-header">
    <span class="logo"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo"></span>
  </header>

  <nav class="sidebar-navigation">
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
          <span class="title">Daring</span>
        </a>
      </li>



      <li class="menu-item <?php if (isset($myorder)) {
                              echo 'active';
                            } ?>">
        <a class="menu-link" href="<?php echo base_url('zoom/zoomorder/myorder'); ?>">
          <span class="icon fa fa-calendar"></span>
          <span class="title">Daftar </span>

        </a>
      </li>

      <li class="menu-item <?php if (isset($myorderupload)) {
                              echo 'active';
                            } ?>">
        <a class="menu-link" href="<?php echo base_url('zoom/zoomorder/myorderupload'); ?>">
          <span class="icon fa fa-upload"></span>
          <span class="title">Upload Memo</span>
        </a>
      </li>

      <li class="menu-item">
        <a class="menu-link" href="<?php echo base_url('sso/lout'); ?>">
          <span class="icon fa fa-power-off" style="color:yellow"></span>
          <span class="title" style="color:yellow">Keluar</span>
        </a>
      </li>

      <?php

      if (count($defadata)) {
      ?>


        <?php if ($defadata['admin_zoom'] == 1) { ?>

          <li class="menu-item">
            <a class="menu-link" href="<?php echo base_url('zoom/adminbidang'); ?>">
              <span class="icon fa fa-file-text-o"></span>
              <span class="title">Admin</span>
            </a>
          </li>

        <?php } ?>

        <?php if ($defadata['admin_pst'] == 1) { ?>

          <li class="menu-item">
            <a class="menu-link" href="<?php echo base_url('zoom/adminbidang'); ?>">
              <span class="icon fa fa-file-text-o"></span>
              <span class="title">PST</span>
            </a>
          </li>

        <?php } ?>


      <?php } ?>



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
          <a class="dropdown-item" href="<?php echo base_url('sso/lout'); ?>"><i class="ti-power-off"></i> Logout</a>
        </div>
      </li>



    </ul>

  </div>
</header>
<!-- END Topbar -->