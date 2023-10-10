<!-- Main container -->
<main>
    <div class="main-content">
        <div class="card card-body">

            <div class="row">

                <div class="col-12">
                    <div class="card card-bordered card-hover-shadow">


                        <div class="card-body">
                            <?php echo $this->session->flashdata('info_form');  ?>

                            <table id="mp_tabel" class="table table-hover table-bordered table-responsive" data-provide="datatables" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%" class="fw-600" style="vertical-align:middle;text-align: center;">No </th>
                                        <th width="20%" class="fw-600" style="vertical-align:middle;text-align: center;">Perihal Rapat</th>
                                        <th width="15%" class="fw-600" style="vertical-align:middle;text-align: center;">Jadwal Mulai</th>
                                        <th width="15%" class="fw-600" style="vertical-align:middle;text-align: center;">Jadwal Selesai </th>
                                        <th width="15%" class="fw-600" style="vertical-align:middle;text-align: center;">Keterangan</th>
                                        <th width="15%" class="fw-600" style="vertical-align:middle;text-align: center;">Status</th>
                                        <th width="8%" class="fw-600" style="vertical-align:middle;text-align: center;">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    if (count($list_order)) {
                                        foreach ($list_order as $indeks => $list) {  ?>
                                            <tr>
                                                <td style="vertical-align:middle;text-align: center;"><?php echo $nomor; ?></td>
                                                <td style=" vertical-align:middle;"><?php echo $list['perihal']; ?></td>
                                                <td style="vertical-align:middle;"><?php echo $list['jadwal_awal']; ?></td>
                                                <td style="vertical-align:middle;"><?php echo $list['jadwal_akhir']; ?></td>
                                                <td style=" vertical-align:middle;text-align: center;"><?php if ($list['keterangan'] == 0) {
                                                                                                            echo "Online";
                                                                                                        } else {
                                                                                                            echo "Offline";
                                                                                                        }; ?></td>

                                                <?php if ($list['status'] == 0) { ?>
                                                    <td style=" text-align: center;">
                                                        <span class="badge badge-warning">Belum Disetujui</span>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a name="d_edit_bagi_pegawai" class="nav-link hover-primary cat-info" href="<?php echo base_url('zoom/zoomorder/editzoom/' . $list['idm']); ?>" data-provide="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    </td>

                                                <?php } else if ($list['status'] == 1) {  ?>

                                                    <td style="text-align: center;">
                                                        <span class="badge badge-success"> Disetujui</span>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a name="d_edit_bagi_pegawai" class="nav-link hover-info cat-info" href="<?php echo base_url('zoom/zoomorder/lookzoom/' . $list['idm']); ?>" data-provide="tooltip" data-placement="top" title="Lihat Detail Rapat Daring"><i class="fa fa-eye"></i></a>
                                                    </td>



                                                <?php } else if ($list['status'] == 2) {  ?>

                                                    <td style="text-align: center;">
                                                        <span class="badge badge-danger">Batal/Tidak Disetujui</span>
                                                    </td>
                                                    <td>

                                                    </td>

                                                <?php }  ?>

                                            </tr>
                                        <?php
                                            $nomor++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td>tidak ada data</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>



            </div>
            <!--/.row -->


        </div>
    </div>
    <!--/.main-content -->



</main>
<!-- END Main container -->