<!-- Main container -->
<main>
    <div class="main-content">
        <div class="card card-body">





            <div class="row">


                <div class="col-12">
                    <?php echo $this->session->flashdata('info_form');  ?>
                    <div class="card-body">
                        <div class="row">



                            <?php if ($lookzoom['idm'] != 0) { ?>


                                <div class="col-md-6">


                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <!-- <label>Perihal Rapat Dalam Jaringan (Daring) </label> -->
                                            <h2><?php echo $lookzoom['perihal']; ?></h2>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-12">
                                            <label>Waktu Mulai</label>
                                            <div class="input-group">

                                            </div>
                                            <div class="input-group">

                                                <input type="text" name="tgl_start" class="form-control" readonly value="<?php echo $lookzoom['tgl_start_tgl']; ?>">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>



                                                <input type="text" name="time_start" class="form-control" value="<?php echo $lookzoom['tgl_start_time']; ?>" readonly>
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                            </div>
                                        </div>




                                    </div>


                                    <div class="row">

                                        <div class="form-group col-md-12">
                                            <label>Waktu Selesai</label>
                                            <div class="input-group">

                                            </div>
                                            <div class="input-group">

                                                <input type="text" name="tgl_end" class="form-control" data-provide="" value="<?php echo $lookzoom['tgl_end_tgl']; ?>" readonly>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>

                                                <input type="text" name="time_end" class="form-control" value="<?php echo $lookzoom['tgl_end_time']; ?>" data-provide="" readonly>
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Jumlah Peserta </label>
                                            <input type="number" class="form-control" name="jumlah_peserta" value="<?php echo $lookzoom['jumlah_peserta']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Keterangan </label>
                                            <input type="text" class="form-control" name="keterangan" value="<?php if ($lookzoom['keterangan'] == 0) {
                                                                                                                    echo 'Online';
                                                                                                                } else {
                                                                                                                    echo 'Offline';
                                                                                                                } ?>" readonly>
                                        </div>
                                    </div>

                                    <?php if ($lookzoom['keterangan'] == 1) {
                                        echo '
                                    
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Tempat </label>
                                            <input type="text" class="form-control" name="ruangan" value=" ';
                                        if ($lookzoom['ruangan'] == 'bima') {
                                            echo 'Ruang Bima';
                                        } else {
                                            echo 'Ruang PST';
                                        }
                                        echo '" readonly>
                                        </div>
                                    </div>
                                    ';
                                    } ?>





                                    <hr>



                                </div>

                                <div class="col-md-6">



                                    <div class="row">

                                        <?php if ($lookzoom['status'] == 1 && $lookzoom['keterangan'] == 0) { ?>
                                            <div class="form-group col-md-12">
                                                <label>Deskripsi Link Zoom </label>
                                                <button name="copiesdi" class="btn btn-primary btn-block">Copy
                                                    Deskripsi</button>
                                                <HR />
                                                <span id="okeee"> <?php echo $lookzoom['reply']; ?> </span>
                                            </div>
                                        <?php } else if ($lookzoom['status'] == 0) { ?>

                                            <div class="form-group col-md-12">
                                                <label>Deskripsi Link Zoom </label>
                                                <button name="-" class="btn btn-danger btn-block">Belum Disetujui</button>
                                                <HR />
                                            </div>


                                        <?php } ?>
                                    </div>

                                </div>


                            <?php } else { ?>



                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <h1> Anda tidak mempunyai akses ini </h1>
                                        </div>
                                    </div>




                                <?php } ?>







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