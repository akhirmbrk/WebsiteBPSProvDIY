  <!-- Preloader -->
  <!-- END Topbar -->



  <!-- Main container -->


  <main>



    <div class="main-content">
      <div class="row justify-content-center"></div>
      <!--
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          | Carousel Indicator color
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          !-->
      <div class="col-lg-12">

        <div class="card-body">

          <div class="carousel slide" id="carousel-8" data-ride="carousel">

            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?= base_url('') ?>/assets/bps/1.png" alt="" />

              </div>

              <div class="carousel-item">
                <img src="<?= base_url('') ?>/assets/bps/2.png" alt="" />

              </div>

              <div class="carousel-item">
                <img src="<?= base_url('') ?>/assets/bps/3.png" alt="" />

              </div>
            </div>

            <ol class="carousel-indicators carousel-indicators-outside carousel-indicators-primary">
              <li data-target="#carousel-8" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-8" data-slide-to="1"></li>
              <li data-target="#carousel-8" data-slide-to="2"></li>
            </ol>
          </div>

        </div>



        <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Kira
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->

        <div class="row justify-content-center">

          <!-- Zoom -->
          <a href="<?= base_url() ?>zoom/zoomorder" class="col-6">
            <div class="card">
              <div class="card-body d-flex flex-column align-items-center">
                <div class="media-grid media-grid-hover">
                  <div class="media flex-column align-items-center">
                    <code class="w-100 text-center" style="font-family: Verdana, sans-serif; font-size: 20px">ZOOM ORDER</code><br>
                    <img src="<?= base_url() ?>assets/bps/rapat.png" style="margin-top: 10px;">
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- Manajemen File -->
          <a href="<?= base_url() ?>manajemenFile/manajemenfile" class="col-6">
            <div class="card">
              <div class="card-body d-flex flex-column align-items-center">
                <div class="media-grid media-grid-hover">
                  <div class="media flex-column align-items-center">
                    <code class="w-100 text-center" style="font-family: Verdana, sans-serif; font-size: 20px">MANAJEMEN FILE</code><br>
                    <img src="<?= base_url() ?>assets/bps/surat.png" style="margin-top: 10px;" alt="Gambar" />
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- Monitoring -->
          <a href="<?= base_url() ?>monitoring/index/dashboard" class="col-6">
            <div class="card">
              <div class="card-body d-flex flex-column align-items-center">
                <div class="media-grid media-grid-hover">
                  <div class="media flex-column align-items-center">
                    <code class="w-100 text-center" style="font-family: Verdana, sans-serif; font-size: 20px">MONITORING KEGIATAN</code><br>
                    <img src="<?= base_url() ?>assets/bps/monitoring.png" style="margin-top: 10px;" alt="Gambar" />
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- Ruangan rapat ofline -->
          <a href="<?= base_url() ?>rapatOffline/index" class="col-6">
            <div class="card">
              <div class="card-body d-flex flex-column align-items-center">
                <div class="media-grid media-grid-hover">
                  <div class="media flex-column align-items-center">
                    <code class="w-100 text-center" style="font-family: Verdana, sans-serif; font-size: 20px">RAPAT OFFLINE</code><br>
                    <img src="<?= base_url() ?>assets/bps/rapat.png" style="margin-top: 10px;" alt="Gambar" />
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>




      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <script>
        $(document).ready(function() {
          $('#carousel-8').carousel();
        });
      </script>




  </main>