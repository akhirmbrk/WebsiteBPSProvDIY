<!-- Main container -->
<header class="header header-inverse">
    <div class="container">
        <div class="header-info">
            <div class="left">
                <br>
                <h2 class="header-title"><strong>Tim Kerja Saya</strong> <small class="subtitle">Lorem Ipsum
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


            <div class="col-md-8 col-xl-9">

                <div class="media-list media-list-divided media-list-hover" data-provide="selectall">
                    <div class="media-list-body bg-white b-1">
                        <div class="card-body">
                            <form class="lookup lookup-right">
                                <input type="text" name="s" placeholder="Cari Kegiatan">
                            </form>
                        </div>

					<li class="menu-item">	
                        <div class="media align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"></label>
                            </div>


                            <span class="badge badge-dot badge-success" title="On Hold" data-provide="tooltip"></span>

                            <img class="rounded" width="40px" src="<?= base_url('');
                                                                    ?>/assets/img/bg/logo_bps.png" alt="...">
						
						
						<a class = "menu-link open" href = "#">	
							<a class="media-body text-truncate" href="#">
								<h5 class="fs-15">Regsosek</h5>
							</a>
							<ul class = "menu-submenu">
								<li class = "menu-item">
									<span class = "title">Batching</span>
								</li>
							</ul>
						</a>

                        </div>
					</li>

					<li class = "menu-item">

                        <div class="media align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"></label>
                            </div>

                            <label class="toggler fs-16 ml-20">
                                <input type="checkbox" data-perform="toggle-star" data-target="#">
                                <i class="fa fa-star"></i>
                            </label>

                            <span class="badge badge-dot badge-success" title="On Hold" data-provide="tooltip"></span>

                            <img class="rounded" width="40px" src="<?= base_url('');
                                                                    ?>/assets/img/bg/logo_bps.png" alt="...">

                           

                    </div>

				</li>
            </div>


                <footer class="flexbox align-items-center py-20">
                    <span class="flex-grow text-right text-lighter pr-2">1-20 of 367</span>
                    <nav>
                        <a class="btn btn-sm btn-square disabled" href="#"><i class="ti-angle-left"></i></a>
                        <a class="btn btn-sm btn-square" href="#"><i class="ti-angle-right"></i></a>
                    </nav>
                </footer>

            </div>

        </div>

    </div>
</div>
</div>
