<!-- Main container -->
<header class="header header-inverse" style="background-image: url(<?= base_url('assets/img/bg/bluehead.png') ?>);">
    <div class="container">
        <div class="header-info">
            <div class="left">
                <br>
                <div class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong>Tim Kerja</strong> <small class="subtitle" style="color: black;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Pengaturan untuk membuat dan
                        menyesuaikan tim kerja</small>
                </div>
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
<div class="bubbles">
    <span style="--i:11;"></span>
    <span style="--i:12;"></span>
    <span style="--i:24;"></span>
    <span style="--i:10;"></span>
    <span style="--i:14;"></span>
    <span style="--i:23;"></span>
    <span style="--i:18;"></span>
    <span style="--i:16;"></span>
    <span style="--i:19;"></span>
    <span style="--i:20;"></span>
    <span style="--i:22;"></span>
    <span style="--i:25;"></span>
    <span style="--i:18;"></span>
    <span style="--i:21;"></span>
    <span style="--i:15;"></span>
    <span style="--i:13;"></span>
    <span style="--i:26;"></span>
    <span style="--i:17;"></span>
    <span style="--i:13;"></span>
    <span style="--i:28;"></span>
    <span style="--i:11;"></span>
    <span style="--i:12;"></span>
    <span style="--i:24;"></span>
    <span style="--i:10;"></span>
    <span style="--i:14;"></span>
    <span style="--i:23;"></span>
    <span style="--i:18;"></span>
    <span style="--i:16;"></span>
    <span style="--i:19;"></span>
    <span style="--i:20;"></span>
    <span style="--i:22;"></span>
    <span style="--i:25;"></span>
    <span style="--i:18;"></span>
    <span style="--i:21;"></span>
    <span style="--i:15;"></span>
    <span style="--i:13;"></span>
    <span style="--i:26;"></span>
    <span style="--i:17;"></span>
    <span style="--i:13;"></span>
    <span style="--i:28;"></span>
</div>

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
                            <select id="filterPeriode" nama="filterPeriode" title="Periode Pelaksanaan" data-provide="selectpicker" data-width="100%">
                                <?php
                                if (count($periode)) {
                                    foreach ($periode as $indeks => $item) {
                                        $selected = ($item['aktif'] == 1) ? "selected" : ""; ?>
                                        <option value="<?= $item['id_zperiode'] ?>" <?= $selected ?>><?= $item['Tahun']; ?></option>
                                <?php }
                                } ?>

                            </select>
                        </div>



                        <!-- 
                        <div class="form-group">
                            <label>Jenis Tim Kerja</label>
                            <select id="filterTimKerja" name="filterTimKerja" title="Jenis Tim Kerja" multiple data-provide="selectpicker" data-width="100%">
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
                            <a id="resetFilter" class="btn btn-sm btn-bold btn-secondary mr-1">Reset</a>
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
                                <input type="text" id="searchTimKerja" name="searchTimKerja" autocomplete="off" placeholder="Cari Tim Kerja">
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