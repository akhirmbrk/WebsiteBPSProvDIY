<!-- Main container -->
<header class="header header-inverse">
  <div class="container">
    <div class="header-info">
      <div class="left">
        <br>
        <h2 class="header-title"><strong>Tim Kerja Saya</strong> <small class="subtitle">Lorem Ipsum</h2>
      </div>

      <!-- <div class="header-action">
            <div class="buttons">
                <a class="btn btn-primary btn-float" href="<?= base_url('monitoring/index/tambahKegiatan') ?>" title="Tambah Kegiatan" data-provide="tooltip"><i class="ti-plus"></i></a>
            </div>

        </div> -->
    </div>
</header>
<!--/.header -->


<div class="main-content">
  <div class="container">
    <div class="row">

      <div class="col-md-4 col-xl-3 d-none d-md-block">
        <!-- <div class="card shadow-1">
                    <ul class="nav nav-lg nav-pills flex-column">
                        <li class="nav-item active">
                            <i class="fa fa-comments"></i>
                            <a class="nav-link" href="#">All</a>
                            <span class="badge badge-pill badge-secondary">4</span>
                        </li>

                        <li class="nav-item">
                            <i class="fa fa-user"></i>
                            <a class="nav-link" href="#">Assigned to me</a>
                        </li>

                        <li class="nav-item">
                            <i class="fa fa-star"></i>
                            <a class="nav-link" href="#">Starred</a>
                        </li>
                    </ul>
                </div> -->

        <!-- Filter  -->
        <div class="card shadow-1">
          <h5 class="card-title"><strong>Filter Kegiatan</strong></h5>

          <form class="card-body">
            <div class="form-group">
              <label>Periode Tim Kerja</label>
              <select title="Periode" multiple data-provide="selectpicker" data-width="100%">
                <option>2023</option>
                <option>2022</option>
                <option>2021</option>
              </select>
            </div>


            <div class="form-group">
              <label>Tim Kerja Terdaftar</label>
              <select title="All Tim Kerja" multiple data-provide="selectpicker" data-width="100%">
                <option>Analisis Statistik dan Penjaminan Kualitas</option>
                <option>Neraca Regional</option>
                <option>Statistik Sosial</option>
                <option>Statistik Distribusi</option>
                <option>Statistik Produksi</option>
                <option>Sensus Pertanian & Statistik Perikanan, Pertanian dan Kehutanan (SP2K)</option>
                <option>Pengolahan dan TIK</option>
                <option>Diseminasi Statistik</option>
                <option>Pembinaan dan Pelaksanaan Statistik Sektoral</option>
                <option>Perencanaan dan Administrasi Keuangan</option>
                <option>Manajemen SDM dan Hukum</option>
                <option>Fasilitasi Operasional Perkantoran</option>
                <option>SAKIP</option>
                <option>Humas & Unit Kerja Pimpinan</option>
                <option>Zona Integritas dan Reformasi Birokrasi</option>
                <option>Kolaborasi Mengawal Perubahan</option>
              </select>
            </div>

            <hr>

            <div class="text-right">
              <a class="btn btn-sm btn-bold btn-secondary mr-1" href="#">Reset</a>
              <button class="btn btn-sm btn-bold btn-primary" type="submit">Apply</button>
            </div>
          </form>
        </div>
      </div>
      <!-- END Filter -->

      