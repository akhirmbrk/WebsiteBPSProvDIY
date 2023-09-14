  <!-- Preloader -->
  <!-- END Topbar -->



  <!-- Main container -->


  <main>



    <div class="main-content">

      <!-- <div class="col-lg-12"> -->



      <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Kira
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->

      <div class="row justify-content-center ">

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
    <!-- </div> -->




  </main>






  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#carousel-8').carousel();
    });
  </script>
  <script src="<?= base_url('');
                ?>assets/js/app.min.js"></script>
  <script src="<?= base_url('');
                ?>assets/js/script.min.js"></script>
  <script src="<?= base_url('');
                ?>assets/vendor/i8-icon/jquery-i8-icon.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  <script>
    <?php
    if (isset($tabUser)) {
      $this->load->view('monitoring/livesearch/userSearch');
    } elseif (isset($tabKegiatan)) {
      $this->load->view('monitoring/livesearch/kegiatanSearch');
    } elseif (isset($tabTim)) {
      $this->load->view('monitoring/livesearch/timSearch');
    }
    ?>
    app.ready(function() {
      //
      //
      var userapp = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace(['ida', 'nip', 'namaU']),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: {
          url: '<?= base_url('') ?>/assets/data/json/fix.json',
          filter: function(list) {
            return $.map(list, function(user) {
              return {
                ida: user.ida,
                nip: user.nip,
                namaU: user.namaU.replace(/,/g, ' ')
              };
            });
          }
        }
      });

      userapp.initialize();

      $('#sample-typeahead').tagsinput({
        typeaheadjs: {
          name: 'userapp',
          displayKey: function(item) {
            return item.namaU + ' - ' + item.nip;
          },
          valueKey: 'namaU',
          source: userapp.ttAdapter()
        }
      });



    });
  </script>



  </body>