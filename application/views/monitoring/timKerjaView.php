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
                <a class="btn btn-primary btn-float" href="<?= base_url('Monitoring/TimKerja/TambahTimKerja') ?>" title="Tambah Tim Kerja" data-provide="tooltip"><i class="ti-plus"></i></a>
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
                            <label>Jenis Tim Kerja</label>
                            <select name="filterTimKerja" title="Jenis Tim Kerja" multiple data-provide="selectpicker" data-width="100%">
                                <?php
                                if (count($tim_kerja)) {
                                    foreach ($tim_kerja as $indeks => $item) {  ?>
                                        <option value="<?= $item['id_zteam'] ?>"><?php echo $item['nama_team']; ?></option>
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
                                <input type="text" id="searchTimKerja" name="searchTimKerja" autofocus autocomplete="off" placeholder="Cari Tim Kerja">
                            </form>
                        </div>
                        <!-- END Search -->

                        <!-- List Tim Kerja -->
                        <div id="ajaxContent"></div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>