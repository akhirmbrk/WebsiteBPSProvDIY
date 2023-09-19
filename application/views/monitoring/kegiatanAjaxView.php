    <div class="card">
        <?php
        if (count($list_kegiatan)) {
            foreach ($list_kegiatan as $indeks => $item) {  ?>
                <div class="accordion accordion-connected" id="accordion-1">
                    <div class="card">
                        <h4 id="parent" class=" card-title">
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
                                    $total[$indeks] = count($list_sub_kegiatan[$indeks]);
                                    $progres[$indeks] += (int)$list_sub_kegiatan[$indeks][$key]['progres_kegiatan'];
                                    // var_dump($value);
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
                        </h4>
                        <?php //var_dump($list_sub_kegiatan[$indeks][1]) 
                        ?>
                        <div id="collapse-1-<?= $item['id_kegiatan'] ?>" class="collapse">
                            <!-- tambah SOP -->
                            <div class="buttons">
                                <a class="btn btn-primary btn-float" href="<?= base_url('monitoring/kegiatan/tambahSubKegiatan/') . $item['id_kegiatan'] ?>" title="Tambah Sub Kegiatan" data-provide="tooltip"><i class="ti-plus"></i></a>
                                <!-- End Tambah SOP -->
                                <table class="table table-separated table-hover p-3">
                                    <thead>
                                        <tr>
                                            <th style="width: 80px;">No</th>
                                            <th>Nama Kegiatan</th>
                                            <th style="width: 200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (count($list_sub_kegiatan)) {
                                            foreach ($list_sub_kegiatan[$indeks] as $key => $item) {  ?>
                                                <tr>
                                                    <th scope="row"><?= $key + 1 ?></th>
                                                    <td>
                                                        <?= $list_sub_kegiatan[$indeks][$key]['judul_kegiatan'] ?>
                                                    </td>
                                                    <td>
                                                        <nav class="nav gap-2 fs-16">
                                                            <a class="nav-link hover-primary cat-edit" href="<?= base_url('monitoring/Kegiatan/detailKegiatan/') . $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] ?>" data-provide="tooltip" title="" data-perform="edit" data-target="modal-cat-edit.html" data-original-title="Edit"><i class="ti-eye"></i></a>
                                                            <a class="nav-link hover-danger cat-delete" href="<?= base_url('monitoring/Kegiatan/hapusKegiatan/') . $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] ?>" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="Delete"><i class="ti-trash"></i></a>
                                                        </nav>
                                                    </td>

                                                </tr>

                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
        <?= $this->pagination->create_links(); ?>
    </div>