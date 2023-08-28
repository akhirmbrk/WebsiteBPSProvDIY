<header class="header header-inverse">
    <div class="container">
        <div class="header-info">
            <div class="left">
                <br>
                <h2 class="header-title">Judul Kegiatan <small class="subtitle">In General</small></h2>
            </div>
        </div>
    </div>
</header>
<!--/.header -->





<div class="main-content">
    <div class="container">


        <div class="card shadow-1">
            <header class="card-header bg-lightest">
                <div class="card-title flexbox">
                    <img class="img-fluid" src="<?= base_url('assets/theme/src') ?>/assets/img/bg/bg_bps.png" alt="">
                </div>
            </header>


            <div class="card-body" style="text-align: center;">
                <h2 class="header-title "><strong>Progress Kegiatan</strong></h2>
                <br>
                <div data-provide="easypie" data-size="200" data-line-width="10" data-percent="<?= $progress ?>%" data-color="<?php if ($progress <= 25) {
                                                                                                                                    echo "#f96868";
                                                                                                                                } elseif ($progress <= 50) {
                                                                                                                                    echo "#f2a654";
                                                                                                                                } elseif ($progress <= 75) {
                                                                                                                                    echo "#48b0f7";
                                                                                                                                } else {
                                                                                                                                    echo "#46be8a";
                                                                                                                                } ?>" data-scale-color="transparent">

                    <span class="easypie-data lead" style="font-size:26px">
                        <?= $progress ?>%
                        <!-- <small class="text-uppercase">opened</small> -->
                    </span>
                </div>


            </div>
            <br>
        </div>
        <div class="card shadow-1">
            <div class="card-body">
                <h5>Detail Progres Kegiatan</h5>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque optio beatae dolorem unde magnam praesentium exercitationem nam suscipit veniam error sapiente modi quidem molestias nesciunt, molestiae consequatur culpa, quas ipsum..
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