<!-- Main container -->
<main>

  <header class="header header- bg-img" style="background-image: url(<?= base_url() ?>assets/img/gallery/1.jpg)">
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


                <!-- Jika harus menampilkan halaman baru pake ini -->
                <?php if ($editzoom['idm'] != 0) { ?>


                  <form class="" method="post" action="<?php echo base_url('zoom/zoomorder/editzoom/' . $idm); ?>">



                    <div class="row">
                      <div class="form-group col-md-4">
                        <label>Perihal Rapat Dalam Jaringan (Daring) </label>
                        <input name="perihal" class="form-control" type="text" value="<?php echo $editzoom['perihal']; ?>" required>
                      </div>
                    </div>
                    <div class="row">

                      <div class="form-group col-md-4">
                        <label>Waktu Mulai</label>
                        <div class="input-group">

                        </div>
                        <div class="input-group">

                          <input type="text" name="tgl_start" class="form-control" data-provide="datepicker" value="<?php echo $editzoom['tgl_start_tgl']; ?>" required>
                          <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </span>



                          <input type="text" name="time_start" class="form-control" value="<?php echo $editzoom['tgl_start_time']; ?>" data-provide="clockpicker" required>
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

                          <input type="text" name="tgl_end" class="form-control" data-provide="datepicker" value="<?php echo $editzoom['tgl_end_tgl']; ?>" required>
                          <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </span>

                          <input type="text" name="time_end" class="form-control" value="<?php echo $editzoom['tgl_end_time']; ?>" data-provide="clockpicker" required>
                          <span class="input-group-addon"><i class="ti-timer"></i></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-4">
                        <label>Jumlah Peserta </label>
                        <input type="number" class="form-control" name="jumlah_peserta" placeholder="Max = 100" max="100" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label class="require">Keterangan</label>
                        <select onchange="showRuangan()" id="keterangan" class="form-control" data-provide="selectpicker">
                          <option value="0">Online</option>
                          <option value="1">Offline</option>
                        </select>
                      </div>
                    </div>

                    <div id="ruangRapat" class="row" style="display: none;">
                      <div class="form-group col-md-4">
                        <label class="require">Ruangan</label>
                        <select class="form-control" data-provide="selectpicker">
                          <option value="bima">Ruang Bima</option>
                          <option value="pst">Ruang PST</option>
                        </select>
                      </div>
                    </div>


                    <hr>

                    <div class="row">
                      <div class="form-group col-md-3">
                        <button class="btn btn-primary btn-block">Simpan Perubahan</button>
                      </div>
                    </div>



                  </form>


                <?php } else { ?>




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


      </div>
      <!--/.row -->






    </div>
  </div>
  <!--/.main-content -->

  <script>
    function showRuangan() {
      var ruang = document.getElementById("ruangRapat");
      var ket = document.getElementById("keterangan");
      console.log(ket.value);
      if (ket.value == 0) {
        ruang.style.display = "none";
      } else {
        ruang.style.display = "block";
      }
    }
  </script>


</main>
<!-- END Main container -->