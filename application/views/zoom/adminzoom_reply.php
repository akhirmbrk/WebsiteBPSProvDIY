    <!-- Main container -->
    <main>



        <div class="main-content">
            <div class="card card-body">

                <h2 class="d-fiestletter">Permintaan Rapat Daring </h2>

                <div class="row">



                    <div class="col-12">
                        <div class="card card-bordered card-hover-shadow">

                            <?php echo $this->session->flashdata('info_form');  ?>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <form class="" method="post" action="<?php echo base_url('zoom/adminbidang/replyzoom/' . $idm); ?>">

                                            <div class="form-group">
                                                <label>Jawaban Permintaan Rapat Daring </label>
                                                <?php echo form_error('reply', '<p class="text-danger">', '</p>'); ?>
                                                <textarea data-provide="summernote" name="reply" class="form-control" data-min-height="250" required></textarea>
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



                </div>
                <!--/.row -->


            </div>
        </div>
        <!--/.main-content -->



    </main>
    <!-- END Main container -->