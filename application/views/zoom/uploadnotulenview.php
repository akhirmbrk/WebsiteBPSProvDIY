<!-- Main container -->
<main>
    <div class="main-content">
        <div class="card card-body">

            <div class="row">




                <div class="col-sm-6">
                    <h5> UPLOAD NOTULEN</h5>
                    <hr />

                    <form method="post" id="demo"
                        action="<?php echo base_url("zoom/zoomorder/uploadnotulen/" . $idm); ?>"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label> Notulen Saya: </label>

                        </div>
                        <div class="form-group">
                            <input class="form-control" type="file" name="file">
                            <br />
                            <br />
                        </div>
                        <div class="form-group">
                            <input class="btn btn-block btn-success " type="submit" name="preview" value="upload">
                        </div>

                    </form>




                </div>







            </div>
            <!--/.row -->


        </div>
    </div>
    <!--/.main-content -->



</main>
<!-- END Main container -->