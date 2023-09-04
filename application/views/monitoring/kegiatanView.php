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
        <div class="row">

            <div class="col-md-4 col-xl-3 d-none d-md-block">

                <!-- Filter -->
                <div class="card shadow-1">
                    <h5 class="card-title"><strong>Filter Kegiatan</strong></h5>

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
                            <select nama="filterBPS" title="All BPS" multiple data-provide="selectpicker" data-width="100%">
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
                            <select nama="filterTimKerja" title="All Tim Kerja" multiple data-provide="selectpicker" data-width="100%">
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
                                <input type="text" name="s" placeholder="Cari Kegiatan">
                            </form>
                        </div>
                        <!-- end Searching kegiatan -->

                        <?php
                        if (count($list_kegiatan)) {
                            foreach ($list_kegiatan as $indeks => $item) {  ?>
                                <div class="media align-items-center">
                                    <span class="badge badge-dot badge-success" title="On Hold" data-provide="tooltip"></span>

                                    <img class="rounded" width="40px" src="<?= base_url('');
                                                                            ?>/assets/img/bg/logo_bps.png" alt="...">

                                    <a class="media-body text-truncate" href="<?php echo (base_url('monitoring/Kegiatan/detailKegiatan/') . $item['id_kegiatan']) ?> ">
                                        <h5 class="fs-15"><?= $item["judul_kegiatan"]; ?></h5>
                                        <div class="progress">
                                            <div class="progress-bar <?php if ($item['progres_kegiatan'] <= 25) {
                                                                            echo "bg-danger";
                                                                        } elseif ($item['progres_kegiatan'] <= 50) {
                                                                            echo "bg-warning";
                                                                        } elseif ($item['progres_kegiatan'] <= 75) {
                                                                            echo "bg-info";
                                                                        } else {
                                                                            echo "bg-success";
                                                                        } ?>" role="progressbar" style="width: <?= $item['progres_kegiatan'] ?>%; height: 16px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $item['progres_kegiatan'] ?>%</div>
                                        </div>

                                        <small class="opacity-65 fw-300">
                                            <?= $tim[$indeks]['nama_tim_kerja'] ?>
                                            <span class="divider-dash"></span>
                                            BPS Provinsi Daerah Istimewa Yogyakarta
                                        </small>
                                        <td>
                                            <nav class="nav gap-2 fs-16">
                                                <a class="nav-link hover-primary cat-edit" href="<?= base_url('monitoring/Kegiatan/editKegiatan/') . $item['id_kegiatan'] ?>" data-provide="tooltip" title="" data-perform="edit" data-target="modal-cat-edit.html" data-original-title="Edit"><i class="ti-pencil"></i></a>
                                                <a class="nav-link hover-danger cat-delete" href="<?= base_url('monitoring/Kegiatan/editKegiatan/') . $item['id_kegiatan'] ?>" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="Delete"><i class="ti-trash"></i></a>
                                            </nav>
                                        </td>
                                </div>
                        <?php }
                        } ?>

                        </a>

                    </div>
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