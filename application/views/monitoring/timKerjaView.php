<!-- Main container -->
<header class="header header-inverse">
    <div class="container">
        <div class="header-info">
            <div class="left">
                <br>
                <h2 class="header-title"><strong>Tim Kerja</strong> <small class="subtitle">Pengaturan untuk membuat dan
                        menyesuaikan tim kerja</small></h2>
            </div>
        </div>
        <div class="header-action">
            <div class="buttons">
                <a class="btn btn-primary btn-float" href="<?= base_url('monitoring/index/tambahTimKerja') ?>" title="Tambah Tim Kerja" data-provide="tooltip"><i class="ti-plus"></i></a>
            </div>

        </div>
    </div>
</header>
<!--/.header -->

<div class="main-content">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-xl-3 d-none d-md-block">

                <!-- Filter -->
                <div class="card shadow-1">
                    <h5 class="card-title"><strong>Filter Tim Kerja</strong></h5>

                    <form class="card-body">
                        <div class="form-group">
                            <label>Periode Pelaksanaan</label>
                            <select nama="filterPeriode" title="Periode Pelaksanaan" multiple data-provide="selectpicker" data-width="100%">
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
                            <select name="filterBPS" title="BPS" multiple data-provide="selectpicker" data-width="100%">
                                <?php
                                if (count($bps)) {
                                    foreach ($bps as $indeks => $item) {  ?>
                                        <option value="<?= $item['kodeBPS'] ?>"><?php echo "(" . $item['kodeBPS'] . ") " . $item['namaBPS']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>



                        <div class="form-group">
                            <label>Jenis Tim Kerja</label>
                            <select name="filterTimKerja" title="Jenis Tim Kerja" multiple data-provide="selectpicker" data-width="100%">
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
                        <!-- Search -->
                        <div class="card-body">
                            <form class="lookup lookup-right">
                                <input type="text" name="s" placeholder="Cari Tim Kerja">
                            </form>
                        </div>
                        <!-- END Search -->

                        <!-- List Tim Kerja -->
                        <?php
                        // var_dump($teams);
                        if (count($teams)) {
                            foreach ($teams as $indeks => $item) {  ?>
                                <div class="media align-items-center">
                                    <span class="badge badge-dot badge-success" title="On Hold" data-provide="tooltip"></span>

                                    <img class="avatar" src="<?= base_url('');
                                                                ?>/assets/img/avatar/3.jpg" alt="...">

                                    <a class="media-body text-truncate" href="<?= base_url('monitoring/index/detailTimKerja') . "/" . $item['id_team'] . "/" . $item['kodeBPS'] . "/" . $item['Id_Periode'] ?>">
                                        <h5 class="fs-15"><?= $item['nama_tim_kerja'] ?></h5>
                                        <small class="opacity-65 fw-300">
                                            <?= $item['namaBPS'] . " - " . $item['Tahun'] ?>
                                        </small>

                                        <nav class="nav gap-2 fs-16">
                                            <a class="nav-link hover-danger cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="Delete"><i class="ti-trash"></i></a>
                                        </nav>


                                    </a>

                                </div>
                        <?php  }
                        } ?>

                        <!-- END List Tim Kerja -->


                    </div>


                    <footer class="flexbox align-items-center py-20">
                        <span class="flex-grow text-right text-lighter pr-2">1-20 of 367</span>
                        <nav>
                            <a class="btn btn-sm btn-square disabled" href="#"><i class="ti-angle-left"></i></a>
                            <a class="btn btn-sm btn-square" href="#"><i class="ti-angle-right"></i></a>
                        </nav>
                    </footer>

                </div>

            </div>

        </div>
    </div>
</div>