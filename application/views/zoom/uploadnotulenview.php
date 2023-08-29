<!-- Main container -->
<main>

    <header class="header header-inverse">
        <div class="header-info">
            <div class="left">
                <h1 class="header-title"><strong>Notulen Rapat Daring Saya</strong></h1>
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




                <div class="col-sm-6">
                    <h5> FORM UPDATE KAMUS PEKERJAAN</h5>
                    <hr />

                    <form method="post" id="demo"
                        action="<?php echo base_url("zoom/zoomorder/uploadnotulen/" . $idm); ?>"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label> Penilai Pekerjaan: </label>

                        </div>
                        <div class="form-group">
                            <input type="file" name="file">
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