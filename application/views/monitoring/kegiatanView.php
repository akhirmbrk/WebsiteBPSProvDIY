<!-- Main container -->
<header class="header header-inverse" style="background-image: url(<?= base_url('assets/img/bg/bluehead.png') ?>);">
    <div class="container">
        <div class="header-info">
            <div class="left">
                <br>
                <div class="header-title" style="font-size: 55px; color: #9597a5;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong>Kegiatan</strong> <small class="subtitle" style="color: black;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Cek Kegiatan yang sedang
                        Berjalan</small></div>
            </div>
        </div>

        <div class="header-action">
            <div class="buttons">
                <a class="btn btn-primary btn-float" href="<?= base_url('monitoring/kegiatan/tambahKegiatan') ?>" title="Tambah Kegiatan" data-provide="tooltip"><i class="ti-plus"></i></a>
            </div>

        </div>
    </div>
</header>
<!--/.header -->


<div class="main-content">
    <div class="container">
        <?php echo $this->session->flashdata('info_form');  ?>
        <div class="row">

            <div class="col-md-4 col-xl-3 d-none d-md-block">

                <!-- Filter -->
                <div class="card shadow-1">
                    <h5 class="card-title"><strong>Filter Kegiatan</strong></h5>

                    <form action="<?= base_url('monitoring/kegiatan/filterKegiatan') ?>" method="post" class="card-body">
                        <div class="form-group">
                            <label>Periode Pelaksanaan</label>
                            <select name="filterPeriode" title="Periode Pelaksanaan" data-provide="selectpicker" data-width="100%">
                                <?php
                                if (count($periode)) {
                                    foreach ($periode as $indeks => $item) {  ?>
                                        <option value="<?= $item['id_zperiode'] ?>"><?= $item['Tahun']; ?></option>
                                <?php }
                                } ?>

                            </select>
                        </div>



                        <!-- <div class="form-group">
                            <label>Tim Kerja</label>
                            <select name="filterTimKerja" title="All Tim Kerja" data-provide="selectpicker" data-width="100%">
                                <?php
                                if (count($tim_kerja)) {
                                    foreach ($tim_kerja as $indeks => $item) {  ?>
                                        <option value="<?= $item['id_zteam'] ?>"><?php echo $item['nama_team']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div> -->

                        <hr>

                        <div class="text-right">
                            <a class="btn btn-sm btn-bold btn-secondary mr-1" href="#">Reset</a>
                            <button class="btn btn-sm btn-bold btn-primary" type="submit">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Filter -->

            <div class="col-md-8 col-xl-9">
                <div class="media-list media-list-divided media-list-hover" data-provide="selectall">
                    <div class="media-list-body bg-white b-1">

                        <!-- Searching kegiatan -->
                        <div class="card-body">
                            <form class="lookup lookup-right">
                                <input type="text" id="searchKegiatan" name="searchKegiatan" autofocus autocomplete="off" placeholder="Cari Kegiatan">
                            </form>
                        </div>
                        <!-- end Searching kegiatan -->

                        <!-- List Kegiatan  -->
                        <div id="ajaxContent"></div>

                    </div>
                </div>


                <!-- <footer class="flexbox align-items-center py-20">
                </footer> -->

            </div>

        </div>

    </div>
</div>
