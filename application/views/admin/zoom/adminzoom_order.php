<main>
    <?php $this->load->view('template/header_content'); ?>
    <!-- Main container -->
    <div class="main-content">
        <div class="card card-body">
            <div class="row">

                <div class="col-12">
                    <?php echo $this->session->flashdata('info_form');  ?>
                    <div class="card-body ">
                        <div class="row">

                            <form class="p-5" method="post" action="<?php echo base_url('Admin/Zoom/Adminbidang/order'); ?>">



                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-4">
                                        <label>Perihal Rapat </label>
                                        <input name="perihal" class="form-control" type="text" value="" autocomplete="off" autofocus required>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-lg-12 col-md-4">
                                        <label>Waktu Mulai</label>
                                        <div class="input-group">

                                        </div>
                                        <div class="input-group">

                                            <input type="text" name="tgl_start" class="form-control" data-provide="datepicker" value="<?php echo $tanggal_now; ?>" autocomplete="off" required>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>



                                            <input type="text" name="time_start" class="form-control" value="07:30" data-provide="clockpicker" autocomplete="off" required>
                                            <span class="input-group-addon"><i class="ti-timer"></i></span>
                                        </div>
                                    </div>




                                </div>


                                <div class="row">

                                    <div class="form-group col-lg-12 col-md-4">
                                        <label>Waktu Selesai</label>
                                        <div class="input-group">

                                        </div>
                                        <div class="input-group">

                                            <input type="text" name="tgl_end" class="form-control" data-provide="datepicker" value="<?php echo $tanggal_now; ?>" required>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>

                                            <input type="text" name="time_end" class="form-control" value="16:00" data-provide="clockpicker" required>
                                            <span class="input-group-addon"><i class="ti-timer"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-4">
                                        <label>Jumlah Peserta </label>
                                        <input type="number" class="form-control" name="jumlah_peserta" placeholder="Max = 100" max="100" autocomplete="off" required>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="keterangan" value="0">
                                <div class="form-group">
                                    <label>Jawaban Permintaan Rapat Daring </label>
                                    <?php echo form_error('reply', '<p class="text-danger">', '</p>'); ?>
                                    <textarea data-provide="summernote" name="reply" class="form-control" data-min-height="250" required> </textarea>
                                </div>

                        </div>

                        <hr>

                        <div class="row">
                            <div class="form-group col-lg-5 col-md-3 mx-auto">
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




    <!--/.main-content -->



    <!-- END Main container -->