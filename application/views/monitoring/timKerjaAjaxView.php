<?php
// var_dump($teams);
if (count($teams)) {
    foreach ($teams as $indeks => $item) {  ?>
        <div class="media align-items-center">
            <span class="badge badge-dot badge-success" title="On Hold" data-provide="tooltip"></span>

            <img class="avatar" src="<?= base_url('');
                                        ?>/assets/img/avatar/3.jpg" alt="...">

            <a class="media-body text-truncate" href="<?= base_url('Monitoring/TimKerja/detailTimKerja') . "/" . $item['id_team'] . "/" . $item['kodeBPS'] . "/" . $item['Id_Periode'] ?>">
                <h5 class="fs-15"><?= $item['nama_tim_kerja'] ?></h5>
                <small class="opacity-65 fw-300">
                    <?= $item['namaBPS'] . " &mdash; " . $item['Tahun'] ?>
                </small>

                <nav class="nav gap-2 fs-16">
                    <a class="nav-link hover-danger cat-delete" href="<?= base_url('Monitoring/TimKerja/hapusKegiatan') . "/" . $item['id_team'] . "/" . $item['kodeBPS'] . "/" . $item['Id_Periode']  ?>" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="Delete"><i class="ti-trash"></i></a>
                </nav>


            </a>

        </div>
<?php  }
} ?>

<!-- END List Tim Kerja -->
</div>
<?= $this->pagination->create_links(); ?>