<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>/assets/css/owl.carousel.min.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url()?>/assets/css/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>/assets/css/style.css" />
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/global.css"/>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Markazi Text:wght@600&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap"
    />
    <title>Landing</title>
  </head>
  <body>

    <!-- <div class="judul">MENU UTAMA</div> -->
    <!-- <img class="fileImg" src="img/fileLogo.png">
    <img class="monitoringImg" src="img/monitoringLogo.png">
    <img class="rapatImg" src="img/rapatLogo.png">
    <img class="suratImg" src="img/suratLogo.png"> -->

  <section id="slider" class="pt-5">
    <div class="container">
      <div class="judul pt-2" >MENU UTAMA </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
     

        <div class="slider">
          <div class="owl-carousel" >
            <div class="slider-card">
              <a class="d-flex justify-content-center align-center mb-4"  href = "<?= base_url() ?>/manajemenFile/manajemenfile">
                <img class="fileImg" src="<?= base_url('') ?>/assets/img/fileLogo.png" alt="" />
						</a>
            </div>
            <div class="slider-card">
              <a class="d-flex justify-content-center align-center mb-4" href = "<?= base_url() ?>/monitoring/index/dashboard">
                <img class="monitoringImg" src="<?= base_url('') ?>/assets/img/monitoringLogo.png" alt="" >
							</a>
            </div>
            <div class="slider-card">
              <a class="d-flex justify-content-center align-center mb-4" href = "<?= base_url() ?>/zoom/zoomorder">
                <img class="rapatImg" src="<?= base_url('') ?>/assets/img/rapatLogo.png" alt="" />
							</a>
            </div>
            <div class="slider-card">
              <div class="d-flex justify-content-center align-center mb-4">
                <img class="suratImg" src="<?= base_url('') ?>/assets/img/suratLogo.png" alt="" >
              </div>
            </div>
          </div>
       </div>
    </div>
  </section>












    <!-- ManajemenFile

    <div class="fileCard">
      <div class="fileBox">
        <b class="fileFont">MANAJEMEN FILE</b>
        <img class="fileIcon" alt="" src="./public/image-11@2x.png" />
      </div>
    </div>

    PenomoranSurat

    <div class="suratCard">
      <div class="suratBox">
        <img class="suratIcon" alt="" src="./public/image-6@2x.png" />
        <b class="suratFont">PENOMORAN SURAT</b>
      </div>
    </div>

    ManajemenRapat

        <div class="rapatCard">
          <div class="rapatBox">
            <img class="rapatIcon" alt="" src="./public/image-9@2x.png">
            <b class="rapatFont">MANAJEMEN RAPAT</b>
          </div>
        </div>


        Monitoring

        <div class="monitoringCard">
          <div class="monitoringBox">
            <img class="monitoringIcon" alt="" src="./public/image-5@2x.png" />
            <b class="monitoringFont">MONITORING</b>
          </div>
        </div> -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?= base_url()?>/assets/js/carousel.landing.js"></script>
    <script src="<?= base_url()?>/assets/js/owl.carousel.min.js"></script>
		<script src="<?= base_url()?>/assets/js/owl.carousel.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>

</html>
