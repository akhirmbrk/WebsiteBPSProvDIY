<!-- List User Table -->

<!-- <h6 class="ml-4" style="color :#33cabb;"><em>Hasil Pencarian : <?= $result_user; ?></em></h6> -->

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
                        <a class="nav-link hover-danger cat-delete" href="<?= base_url('monitoring/Kegiatan/hapusKegiatan/') . $item['id_kegiatan'] ?>" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="Delete"><i class="ti-trash"></i></a>
                    </nav>
                </td>
        </div>
<?php }
} ?>

</a>

<?= $this->pagination->create_links(); ?>