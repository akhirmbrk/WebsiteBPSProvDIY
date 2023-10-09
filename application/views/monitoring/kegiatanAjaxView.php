<div class="accordion accordion-connected" id="accordion-1">
    <?php
    if (count($list_kegiatan)) {
        foreach ($list_kegiatan as $indeks => $item) {  ?>
            <div class="card">
                <h2 id="parent" class="card-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-1-<?= $item['id_kegiatan'] ?>">
                        <strong>
                            <?= $item["judul_kegiatan"]; ?>
                        </strong>
                    </a>
                    <br>

                    <!-- Progress Kegiatan Utama -->
                    <?php
                    if (count($list_sub_kegiatan[$indeks])) {

                        $progres[$indeks] = 0;
                        foreach ($list_sub_kegiatan[$indeks] as $key => $value) {
                            $persenSub[$key] = 0;
                            // var_dump($list_sub_kegiatan[$indeks]);
                            foreach ($kodeKabKota as $kode) {
                                $persenSub[$key] += $value['progres_' . $kode['kode']];
                            }
                            $total[$indeks] = count($list_sub_kegiatan[$indeks]);
                            $progresSub[$key] = number_format($persenSub[$key] / 5, 1);
                            $progres[$indeks] += $progresSub[$key];
                        }
                        $mean[$indeks] = number_format($progres[$indeks] / $total[$indeks], 1);
                    } else {
                        $mean[$indeks] = 0;
                    }

                    ?>
                    <!-- END Progress Kegiatan Utama -->

                    <div class="progress">
                        <div class="progress-bar <?php if ($mean[$indeks] <= 25) {
                                                        echo "bg-danger";
                                                    } elseif ($mean[$indeks] <= 50) {
                                                        echo "bg-warning";
                                                    } elseif ($mean[$indeks] <= 75) {
                                                        echo "bg-info";
                                                    } else {
                                                        echo "bg-success";
                                                    } ?>" role="progressbar" style="width: <?= $mean[$indeks]; ?>%; height: 16px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $mean[$indeks]  ?>%</div>
                    </div>

                    <small class="opacity-65 fw-300">
                        <?= $tim[$indeks]['nama_team'] ?>
                        <span class="divider-dash"></span>
                        BPS Provinsi Daerah Istimewa Yogyakarta
                    </small>
                </h2>
                <?php //var_dump($list_sub_kegiatan[$indeks][1]) 
                ?>
                <div id="collapse-1-<?= $item['id_kegiatan'] ?>" class="collapse">
                    <table class="table table-hover table-separated p-3">
                        <thead>
                            <tr>
                                <th style="width: 80px;">No</th>
                                <th>Nama Kegiatan</th>
                                <th style="width: 200px;">progres</th>
                                <th style="width: 200px;">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($list_sub_kegiatan)) {
                                foreach ($list_sub_kegiatan[$indeks] as $key => $item) {  ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td>
                                            <div class="accordion accordion-connected" id="accordion-2">
                                                <h5 id="parent2">
                                                    <a class="collapsed" data-bs-toggle="collapse" data-parent="#accordion-2" href="#collapse-2-<?= $list_sub_kegiatan[$indeks][$key]['id_kegiatan']  ?>">
                                                        <?= $list_sub_kegiatan[$indeks][$key]['judul_kegiatan'] ?>
                                                    </a>
                                                </h5>
                                                <div id="collapse-2-<?= $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] ?>" class="collapse">
                                                    <table>
                                                        <?php foreach ($kodeKabKota as $value) { ?>
                                                            <tr>
                                                                <td>
                                                                    <a class="" href="<?= base_url('monitoring/Kegiatan/detailKegiatan/') . $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] . "/" . $value['kode'] ?>">
                                                                        <?= $value['namaBPS'] ?>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar  <?php if ($progresSub[$key] <= 25) {
                                                                                echo "bg-danger";
                                                                            } elseif ($progresSub[$key] <= 50) {
                                                                                echo "bg-warning";
                                                                            } elseif ($progresSub[$key] <= 75) {
                                                                                echo "bg-info";
                                                                            } else {
                                                                                echo "bg-success";
                                                                            } ?>" role="progressbar" style="width:<?= $progresSub[$key] ?>%; height: 16px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $progresSub[$key] ?>%</div>
                                            </div>


                                            <div id="collapse-2-<?= $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] ?>" class="collapse">
                                                <table>
                                                    <?php foreach ($kodeKabKota as $value) { ?>
                                                        <tr>
                                                            <td style="width: 200px;">
                                                                <div class="progress">
                                                                    <div class="progress-bar <?php if ($item['progres_' . $value['kode']] <= 25) {
                                                                                                    echo "bg-danger";
                                                                                                } elseif ($item['progres_' . $value['kode']] <= 50) {
                                                                                                    echo "bg-warning";
                                                                                                } elseif ($item['progres_' . $value['kode']] <= 75) {
                                                                                                    echo "bg-info";
                                                                                                } else {
                                                                                                    echo "bg-success";
                                                                                                } ?>" role="progressbar" style="width:<?= $item['progres_' . $value['kode']] ?>%; height: 16px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $item['progres_' . $value['kode']] ?>%</div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($list_sub_kegiatan[$indeks][$key]['time_update'] != null) { ?>
                                                <small><i>update terakhir
                                                        <?= date('d-m-Y', strtotime($list_sub_kegiatan[$indeks][$key]['time_update'])) ?>
                                                    </i></small>
                                            <?php } else echo '<small><i>Belum diupdate</i></small>'; ?>
                                        </td>
                                        <!-- <td>
                                                    <nav class="nav gap-2 fs-16">
                                                        <a class="nav-link hover-primary cat-edit" href="<?= base_url('monitoring/Kegiatan/detailKegiatan/') . $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] ?>" data-provide="tooltip" title="" data-perform="edit" data-target="modal-cat-edit.html" data-original-title="Edit"><i class="ti-eye"></i></a>
                                                        <?php // CEK ROLE USER Untuk DELETE
                                                        $roleRequie = [1, 2];
                                                        if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
                                                            <a class="nav-link hover-danger cat-delete" href="<?= base_url('monitoring/Kegiatan/hapusKegiatan/') . $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] ?>" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="Delete"><i class="ti-trash"></i></a>
                                                        <?php } ?>
                                                    </nav>
                                                </td> -->

                                    </tr>

                            <?php }
                            } ?>

                    </table>

                </div>

            </div>
    <?php }
    } ?>

    <?= $this->pagination->create_links(); ?>
</div>