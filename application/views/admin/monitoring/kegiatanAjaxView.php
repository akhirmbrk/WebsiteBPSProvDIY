<div class="accordion accordion-connected" id="accordion-1">
    <?php
    if (count($list_kegiatan)) {
        foreach ($list_kegiatan as $indeks => $item) {  ?>
            <div class="card">

                <h4 id="parent" class=" card-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-1-<?= $item['id_kegiatan']; ?>">
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
                            foreach ($kodeKabKota as $i => $kode) {
                                // var_dump($progres_kegiatan[$i][0]);
                                // $persenSub[$key] += $value['progres_' . $kode['kode']];
                                $progresKabKota[$i] = $progres_kegiatan[$indeks][$key][$i]['persen_progres'];
                                $persenSub[$key] += $progresKabKota[$i];
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
                    <div class="row">
                        <div class="col-xl-11">
                            <span class="progress">
                                <div class="progress-bar <?php if ($mean[$indeks] <= 25) {
                                                                echo "bg-danger";
                                                            } elseif ($mean[$indeks] <= 50) {
                                                                echo "bg-warning";
                                                            } elseif ($mean[$indeks] <= 75) {
                                                                echo "bg-info";
                                                            } else {
                                                                echo "bg-success";
                                                            } ?>" role="progressbar" style="width: <?= $mean[$indeks]; ?>%; height: 16px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $mean[$indeks]  ?>%</div>
                            </span>
                        </div>
                        <div class="col-xl-1">
                            <nav class="nav gap-2 fs-16">
                                <span class="nav-link hover-danger cat-delete" onclick="$('#btnDelete').attr('href','<?= base_url('Admin/Monitoring/Kegiatan/hapusKegiatan/') . $item['id_kegiatan'] ?>')" data-placement="top" title="Hapus kegiatan" data-toggle="modal" data-target="#modal-hapus-kegiatan"><i class="ti-trash"></i></span>
                            </nav>
                        </div>
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
                    <?php // CEK ROLE USER
                    $roleRequie = [1, 2];
                    if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
                        <div class="button m-5 text-right">
                            <a class="btn btn-primary btn-float" href="<?= base_url('Admin/Monitoring/kegiatan/tambahSubKegiatan/') . $item['id_kegiatan'] ?>" title="Tambah Sub Kegiatan" data-provide="tooltip"><i class="ti-plus"></i></a>
                        </div>
                    <?php } ?>
                    <!-- End Tambah SOP -->

                    <table class="table table-separated table-hover p-3">
                        <thead>
                            <tr>
                                <th style="width: 80px;">No</th>
                                <th>Nama Kegiatan</th>
                                <th style="width: 400px;">progres</th>
                                <!-- <th style="width: 200px;">status</th> -->
                                <th style="width: 80px;">Action</th>
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
                                                        <?php
                                                        foreach ($kodeKabKota as $i => $value) { ?>
                                                            <tr>
                                                                <td>
                                                                    <?php if ($_SESSION['kodeKabKota'] == '00') { ?>
                                                                        <a class="" href="<?= base_url('Admin/Monitoring/Kegiatan/detailKegiatan/') . $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] . "/" . $value['kode'] ?>">
                                                                            <?= $value['namaBPS'] ?>
                                                                        </a>
                                                                        <?php } else {
                                                                        if ($_SESSION['kodeKabKota'] == $value['kode']) { ?>
                                                                            <a class="" href="<?= base_url('monitoring/Kegiatan/detailKegiatan/') . $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] . "/" . $value['kode'] ?>">
                                                                                <?= $value['namaBPS'] ?>
                                                                            </a>
                                                                        <?php } else { ?>
                                                                            <span class="text-muted"><?= $value['namaBPS'] ?></span>
                                                                    <?php }
                                                                    } ?>
                                                                </td>
                                                                <td style="width: 200px;" colspan="3">
                                                                    <div class="progress">
                                                                        <div class="progress-bar <?php if ($progres_kegiatan[$indeks][$key][$i]['persen_progres'] <= 25) {
                                                                                                        echo "bg-danger";
                                                                                                    } elseif ($progres_kegiatan[$indeks][$key][$i]['persen_progres'] <= 50) {
                                                                                                        echo "bg-warning";
                                                                                                    } elseif ($progres_kegiatan[$indeks][$key][$i]['persen_progres'] <= 75) {
                                                                                                        echo "bg-info";
                                                                                                    } else {
                                                                                                        echo "bg-success";
                                                                                                    } ?>" role="progressbar" style="width:<?= $progres_kegiatan[$indeks][$key][$i]['persen_progres'] ?>%; height: 16px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $progres_kegiatan[$indeks][$key][$i]['persen_progres'] ?>%</div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <?php if ($progres_kegiatan[$indeks][$key][$i]['last_time_update'] != null) { ?>
                                                                        <small><i>update terakhir
                                                                                <?= date('d-m-Y', strtotime($progres_kegiatan[$indeks][$key][$i]['last_time_update'])) ?>
                                                                            </i></small>
                                                                    <?php } else echo '<small><i>Belum diupdate</i></small>'; ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
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



                                        </td>

                                        <td>
                                            <nav class="nav fs-16">
                                                <!-- <a class="nav-link hover-primary cat-edit" href="<?= base_url('Admin/Monitoring/Kegiatan/detailKegiatan/') . $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] ?>" data-provide="tooltip" title="" data-perform="edit" data-target="modal-cat-edit.html" data-original-title="Edit"><i class="ti-eye"></i></a> -->
                                                <?php // CEK ROLE USER Untuk DELETE
                                                $roleRequie = [1, 2];
                                                if (count(array_intersect($roleRequie, $_SESSION['user_role'])) > 0) { ?>
                                                    <a class="nav-link hover-danger cat-delete" onclick="$('#btnDelete1').attr('href','<?= base_url('Admin/Monitoring/Kegiatan/hapusSubKegiatan/') . $list_sub_kegiatan[$indeks][$key]['id_kegiatan'] ?>')" data-placement="top" title="Hapus Subkegiatan" data-toggle="modal" data-target="#modal-hapus"><i class="ti-trash"></i></a>
                                                <?php } ?>
                                            </nav>
                                        </td>
                                    </tr>

                            <?php }
                            } ?>
                        </tbody>
                    </table>

                </div>
            </div>



            <!-- modal  kegiatan-->
            <div class="modal fade modal-center" id="modal-hapus-kegiatan" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-kegiatan-label" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-hapus-kegiatan-label">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">Apakah Anda yakin untuk menghapus sub-kegiatan ini?</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                            <a id="btnDelete" href="" class="btn btn-danger">Ya</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal  subkegiatan-->
            <?php
            if (count($list_sub_kegiatan)) {
                foreach ($list_sub_kegiatan[$indeks] as $key => $item) { ?>
                    <div class="modal fade modal-center" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-label" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-hapus-label">Konfirmasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">Apakah Anda yakin untuk menghapus sub-kegiatan ini?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                    <a id="btnDelete1" href="" class="btn btn-danger">Ya</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
    <?php }
    } ?>
</div> <?= $this->pagination->create_links(); ?>