  <!-- Main container -->
  <main class="main-container">


      <header class="header header-inverse" style="background-image: url(<?= base_url('assets/img/bg/bluehead.png') ?>);">
          <div class="container">
              <div class="header-info">
                  <div class="left">
                      <br>
                      <div class="header-title" style="font-size: 55px; color: #9597a5;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong>Tambah Kegiatan Baru</strong><small class="subtitle" style="color: black;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Isikan form
                              berikut sesuai dengan detail kegiatan.</small></div>
                  </div>
              </div>

              <div class="header-action">
                  <nav class="nav">
                  </nav>
              </div>
          </div>
      </header>
      <!--/.header -->





      <div class="main-content">
          <div class="container">
              <?php echo $this->session->flashdata('info_form');  ?>
              <form action="<?php echo base_url('Monitoring/Kegiatan/addKegiatan'); ?>" class="row" method="post" enctype="multipart/form-data">
                  <div class="col-md-7 col-xl-8">
                      <div class="card shadow-1">
                          <h4 class="card-title"><strong>Detail</strong> Kegiatan</h4>

                          <div class="card-body">

                              <div class="row">
                                  <div class="form-group col-md-6">
                                      <label class="require">Tim Kerja</label>
                                      <select required id="timKerja" name="timKerja" title="All Tim Kerja" data-provide="selectpicker" data-width="100%">
                                          <?php
                                            if (count($tim_kerja)) {
                                                foreach ($tim_kerja as $indeks => $item) {  ?>
                                                  <option value="<?= $item['id_zteam'] ?>"><?php echo $item['nama_team']; ?></option>
                                          <?php }
                                            } ?>
                                      </select>
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label class="require">Judul Kegiatan</label>
                                      <input class="form-control" type="text" name="judulKegiatan" autofocus autocomplete="off" required>
                                  </div>
                              </div>


                              <hr>
                              <label class="require">Waktu Kegiatan</label>
                              <div class="input-group" data-provide="datepicker">
                                  <input type="text" class="form-control" name="tglStart" placeholder="Tanggal Mulai" value="<?php echo $tanggal_now; ?>" autocomplete="off" required>
                                  <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </span>

                                  <input type="text" class="form-control" name="tglEnd" placeholder="Tanggal Selesai" value="<?php echo $tanggal_now; ?>" autocomplete="off" required>
                                  <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </span>
                              </div>





                          </div>


                          <footer class="card-footer text-right">
                              <a class="btn btn-secondary mr-2" href="<?= base_url('Monitoring/Kegiatan') ?>">Cancel</a>
                              <button class="btn btn-primary" type="submit">Submit</button>
                          </footer>


                      </div>
                  </div>
              </form>
          </div>
      </div>
