<!-- Main container -->
<main>

    <header class="header header- bg-img" style="background-image: url<?= base_url() ?>assets/img/gallery/1.jpg)">
        <div class="header-info">
            <div class="left">
                <h1 class="header-title">Permintaan Rapat Daring</h1>
            </div>

            <div class="right flex-middle">

            </div>
        </div>

        <div class="header-action">
            <div class="flexbox align-items-center gap-items-4">

            </div>

            <nav class="nav">

            </nav>
        </div>
    </header>

    <div class="main-content">
        <div class="card card-body">





            <div class="row">


                <div class="col-12">
                    <?php echo $this->session->flashdata('info_form');  ?>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <form class="" method="post"
                                    action="<?php echo base_url('zoom/adminbidang/order/'); ?>">



                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Perihal Rapat Dalam Jaringan (Daring) </label>
                                            <input name="perihal" class="form-control" type="text" value="" required>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <label>Waktu Mulai</label>
                                            <div class="input-group">

                                            </div>
                                            <div class="input-group">

                                                <input type="text" name="tgl_start" class="form-control"
                                                    data-provide="datepicker" value="<?php echo $tanggal_now; ?>"
                                                    required>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>



                                                <input type="text" name="time_start" class="form-control" value="07:30"
                                                    data-provide="clockpicker" required>
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                            </div>
                                        </div>




                                    </div>


                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <label>Waktu Selesai</label>
                                            <div class="input-group">

                                            </div>
                                            <div class="input-group">

                                                <input type="text" name="tgl_end" class="form-control"
                                                    data-provide="datepicker" value="<?php echo $tanggal_now; ?>"
                                                    required>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>

                                                <input type="text" name="time_end" class="form-control" value="16:00"
                                                    data-provide="clockpicker" required>
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>Jumlah Peserta </label>
                                            <input type="number" class="form-control" name="jumlah_peserta"
                                                placeholder="Max = 100" max="100" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Jawaban Permintaan Rapat Daring </label>
                                        <?php echo form_error('reply', '<p class="text-danger">', '</p>'); ?>
                                        <textarea data-provide="summernote" name="reply" class="form-control"
                                            data-min-height="250" required> </textarea>
                                    </div>






                                    <hr>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary btn-block">Simpan Perubahan</button>
                                        </div>
                                    </div>



                                </form>
                            </div>

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