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
                                        <th width="5%" class="fw-600" style="vertical-align:middle; text-align:center;">No </th>
                                        <th width="20%" class="fw-600" style="vertical-align:middle; text-align:center;">Perihal Zoom</th>
                                        <th width="15%" class="fw-600" style="vertical-align:middle; text-align:center;">Jadwal Mulai</th>
                                        <th width="15%" class="fw-600" style="vertical-align:middle; text-align:center;">Jadwal Selesai</th>
                                        <th width="15%" class="fw-600" style="vertical-align:middle; text-align:center;">Notulen</th>
                                        <th width="8%" class="fw-600" style="vertical-align:middle; text-align:center;"> Download File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    if (count($list_order)) {
                                        foreach ($list_order as $indeks => $list) {  ?>
                                            <tr>
                                                <td style="vertical-align:middle; text-align:center;"><?php echo $nomor; ?></td>
                                                <td style="vertical-align:middle; "><?php echo $list['perihal']; ?></td>
                                                <td style="vertical-align:middle; text-align:center;"><?php echo $list['jadwal_awal']; ?></td>
                                                <td style="vertical-align:middle; text-align:center;"><?php echo $list['jadwal_akhir']; ?></td>
                                                <?php if ($list['notulen'] == NULL) { ?>
                                                    <td style="text-align: center;">
                                                        <span class="badge badge-warning">Belum Upload</span>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a name="d_edit_bagi_pegawai" class="nav-link hover-info cat-info" href="<?php echo base_url('zoom/zoomorder/uploadnotulenview/' . $list['idm']); ?>" data-provide="tooltip" data-placement="top" title="Upload Notulen"><i class="fa fa-upload"></i></a>
                                                    </td>


                                                <?php } else {  ?>

                                                    <td style="text-align: center;">
                                                        <span class="badge badge-success">Sudah Upload</span>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a name="d_edit_bagi_pegawai" class="nav-link hover-success cat-info" href="<?php echo base_url('notulen/' . $list['notulen'] . '.pdf'); ?>" data-provide="tooltip" data-placement="top" title="Download Notulen"><i class="fa fa-download"></i></a>
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