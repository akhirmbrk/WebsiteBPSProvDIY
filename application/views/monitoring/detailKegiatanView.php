<header class="header header-inverse">
    <div class="container">
        <div class="header-info">
            <div class="left">
                <br>
                <h2 class="header-title"><?= $detail_kegiatan['judul_kegiatan'] ?>
                    <small class="subtitle"><?= $tim_kerja['nama_team'] ?></small>
                </h2>
            </div>
        </div>

        <div class="header-action">
            <div class="buttons">
                <a class="btn btn-primary btn-float" href="<?= base_url('monitoring/kegiatan/editKegiatan/') . $detail_kegiatan['id_kegiatan'] ?>" title="Update Progres Kegiatan" data-provide="tooltip"><i class="ti-pencil"></i></a>
            </div>

        </div>
    </div>
</header>
<!--/.header -->





<div class="main-content">
    <div class="container">

        <? //= var_dump($detail_kegiatan) 
        ?>
        <div class="card shadow-1">

            <div class="card-body" style="text-align: center;">
                <h2 class="header-title "><strong>Progress Kegiatan</strong></h2>
                <br>
                <div data-provide="easypie" data-size="200" data-line-width="10" data-percent="<?= $detail_kegiatan['progres_kegiatan'] ?>%" data-color="<?php if ($detail_kegiatan['progres_kegiatan']  <= 25) {
                                                                                                                                                                echo "#f96868";
                                                                                                                                                            } elseif ($detail_kegiatan['progres_kegiatan']  <= 50) {
                                                                                                                                                                echo "#f2a654";
                                                                                                                                                            } elseif ($detail_kegiatan['progres_kegiatan']  <= 75) {
                                                                                                                                                                echo "#48b0f7";
                                                                                                                                                            } else {
                                                                                                                                                                echo "#46be8a";
                                                                                                                                                            } ?>" data-scale-color="transparent">

                    <span class="easypie-data lead" style="font-size:26px">
                        <?= $detail_kegiatan['progres_kegiatan']  ?>%
                        <!-- <small class="text-uppercase">opened</small> -->
                    </span>
                </div>


            </div>
            <br>
        </div>
        <div class="card shadow-1">
            <div class="card-body">
                <h5>Detail Progres Kegiatan</h5>
                <?= $detail_kegiatan['deskripsi_kegiatan'] ?>
            </div>
        </div>
    </div>

</div>

<!-- <div class="card shadow-1">
            <div class="card-body">
                Deskripsi Kegiatan bisa di hide
            </div>

        </div> -->



</div>
</div>