<!-- Main container -->
<header class="header header-inverse">
    <div class="container">
        <div class="header-info">
            <div class="left">
                <br>
                <h2 class="header-title"><strong>Kegiatan</strong> <small class="subtitle">Cek Kegiatan yang sedang
                        Berjalan</small></h2>
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


                        <div class="form-group">
                            <label>BPS</label>
                            <select name="filterBPS" title="All BPS" data-provide="selectpicker" data-width="100%">
                                <?php
                                if (count($bps)) {
                                    foreach ($bps as $indeks => $item) {  ?>
                                        <option value="<?= $item['kodeBPS'] ?>"><?php echo "(" . $item['kodeBPS'] . ") " . $item['namaBPS']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Tim Kerja</label>
                            <select name="filterTimKerja" title="All Tim Kerja" data-provide="selectpicker" data-width="100%">
                                <?php
                                if (count($tim_kerja)) {
                                    foreach ($tim_kerja as $indeks => $item) {  ?>
                                        <option value="<?= $item['id_team'] ?>"><?php echo $item['nama_tim_kerja']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>

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