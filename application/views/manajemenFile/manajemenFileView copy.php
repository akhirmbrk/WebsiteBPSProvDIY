<!-- Main container -->
<header class="header header-inverse">
	<div class="container">
		<div class="header-info">
			<div class="left">
				<br>
				<h2 class="header-title"><strong>File Tim Kerja</strong> <small class="subtitle">Silakan Pilih Dokumen yang Ingin Dilihat atau Diunduh</h2>
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

				<div class="accordion accordion-flush" id="accordionFlushExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
								Tambah Kegiatan
							</button>
						</h2>
						<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body">
								<!-- Isi Accordion -->

								<form class="card-body">
									<div class="form-group">
										<label>Periode</label>
										<select title="Periode" multiple data-provide="selectpicker" data-width="100%">
											<option>2023</option>
											<option>2022</option>
											<option>2021</option>
										</select>
									</div>


									<div class="form-group">
										<label>Tim Kerja</label>
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

									<label>Nama Kegiatan</label>
									<input type="text" class="form-control" id="input-required" fdprocessedid="wa148z">


									<hr>

									<div class="text-right">
										<button class="btn btn-sm btn-bold btn-primary" type="submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>


				</div>
			</div>



			<!-- END Filter -->

			<div class="col-md-8 col-xl-9">

				<div class="media-list media-list-divided media-list-hover" data-provide="selectall">
					<div class="media-list-body bg-white b-1">
						<div class="card-body">
							<form class="lookup lookup-right">
								<input type="text" name="s" placeholder="Cari Kegiatan">
							</form>
						</div>
						<!-- Accordion Mulai -->

						<div class="card">

							<div class="row">
								<div class="col">
									<h4 class="card-title" style="font-size: large;"><strong>ST 2023</strong></h4>
								</div>
								<div class="col">

								</div>
								<div class="col">

								</div>
								<div class="col">
									<button class="btn btn-float btn-sm btn-primary" fdprocessedid="d1yj1q" data-provide="tooltip" title="" data-toggle="modal" data-target="#modal-subkegiatan" data-original-title="Tambah Kegiatan"><i class="fa fa-plus"></i><label></label></button>
								</div>

							</div>
							<!-- <h4 class="card-title"><strong>Row actions</strong></h4> -->
							<div class="accordion" id="accordionPanelsStayOpenExample">
								<div class="accordion-item">
									<h2 class="accordion-header" id="panelsStayOpen-headingOne">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
											Pencacahan
										</button>
									</h2>
									<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
										<div class="accordion-body">
											<div class="table-responsive" style="text-align: left;">
												<table class="table">
													<thead class="table-light">
														<tr>
															<th scope="col">#</th>
															<th scope="col" style="text-align: center;">Nama Dokumen</th>
															<th scope="col" style="text-align: center;">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td class="text-right table-actions">
																<nav class="nav gap-2 fs-16 justify-content-center">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye" style="text-decoration: none;"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td class="text-right table-actions">
																<nav class="nav gap-2 fs-16 justify-content-center">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>cok</td>
															<td class="text-right table-actions">
																<nav class="nav gap-2 fs-16 justify-content-center">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
													</tbody>
												</table>
												<button class="btn btn-label btn-info" fdprocessedid="zguoq" data-toggle="modal" data-target="#modal-sqduh"><label><i class="fa fa-plus"></i></label> Tambah Dokumen</button>

											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
											Pengolahan
										</button>
									</h2>
									<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
										<div class="accordion-body">
											<div class="table-responsive">
												<table class="table">
													<thead class="table-light">
														<tr>
															<th scope="col">#</th>
															<th scope="col">Nama Dokumen</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>cok</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
													</tbody>
												</table>
												<button class="btn btn-label btn-info" fdprocessedid="zguoq"><label><i class="fa fa-plus"></i></label> Tambah Dokumen</button>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="panelsStayOpen-headingThree">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
											Publikasi
										</button>
									</h2>
									<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
										<div class="accordion-body">
											<div class="table-responsive">
												<table class="table">
													<thead class="table-light">
														<tr>
															<th scope="col">#</th>
															<th scope="col">Nama Dokumen</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>cok</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
													</tbody>
												</table>
												<button class="btn btn-label btn-info" fdprocessedid="zguoq"><label><i class="fa fa-plus"></i></label> Tambah Dokumen</button>
											</div>
										</div>
									</div>
								</div>
							</div>


							<!-- Sampe Sini -->

						</div>

						<div class="card">

							<div class="row">
								<div class="col">
									<h4 class="card-title" style="font-size: large;"><strong>ST 2023</strong></h4>
								</div>
								<div class="col">

								</div>
								<div class="col">

								</div>
								<div class="col">
									<button class="btn btn-float btn-sm btn-primary" fdprocessedid="d1yj1q" data-provide="tooltip" title="" data-toggle="modal" data-target="#modal-subkegiatan" data-original-title="Tambah Kegiatan"><i class="fa fa-plus"></i><label></label></button>
								</div>

							</div>
							<!-- <h4 class="card-title"><strong>Row actions</strong></h4> -->
							<div class="accordion" id="accordionPanelsStayOpenExample">
								<div class="accordion-item">
									<h2 class="accordion-header" id="panelsStayOpen-headingOne">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
											Pencacahan
										</button>
									</h2>
									<div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
										<div class="accordion-body">
											<div class="table-responsive" style="text-align: left;">
												<table class="table">
													<thead class="table-light">
														<tr>
															<th scope="col">#</th>
															<th scope="col" style="text-align: center;">Nama Dokumen</th>
															<th scope="col" style="text-align: center;">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td class="text-right table-actions">
																<nav class="nav gap-2 fs-16 justify-content-center">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td class="text-right table-actions">
																<nav class="nav gap-2 fs-16 justify-content-center">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>cok</td>
															<td class="text-right table-actions">
																<nav class="nav gap-2 fs-16 justify-content-center">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
													</tbody>
												</table>
												<button class="btn btn-label btn-info" fdprocessedid="zguoq" data-toggle="modal" data-target="#modal-sqduh"><label><i class="fa fa-plus"></i></label> Tambah Dokumen</button>

											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
											Pengolahan
										</button>
									</h2>
									<div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
										<div class="accordion-body">
											<div class="table-responsive">
												<table class="table">
													<thead class="table-light">
														<tr>
															<th scope="col">#</th>
															<th scope="col">Nama Dokumen</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>cok</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
													</tbody>
												</table>
												<button class="btn btn-label btn-info" fdprocessedid="zguoq"><label><i class="fa fa-plus"></i></label> Tambah Dokumen</button>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="panelsStayOpen-headingThree">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
											Publikasi
										</button>
									</h2>
									<div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
										<div class="accordion-body">
											<div class="table-responsive">
												<table class="table">
													<thead class="table-light">
														<tr>
															<th scope="col">#</th>
															<th scope="col">Nama Dokumen</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>cok</td>
															<td>
																<nav class="nav gap-2 fs-16">
																	<a class="nav-link hover-secondary cat-delete" href="#" data-provide="tooltip" title="" data-perform="delete" data-target="#" data-original-title="View"><i class="fa fa-eye"></i></a>
																	<a class="nav-link hover-success" href="#" data-provide="tooltip" title="" data-target="#" data-original-title="Download"><i class="fa fa-download"></i></a>
																</nav>
															</td>
													</tbody>
												</table>
												<button class="btn btn-label btn-info" fdprocessedid="zguoq"><label><i class="fa fa-plus"></i></label> Tambah Dokumen</button>
											</div>
										</div>
									</div>
								</div>
							</div>


							<!-- Sampe Sini -->

						</div>


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
<!-- modal  -->
<div class="modal fade modal-top" id="modal-sqduh" tabindex="-1" role="dialog" aria-labelledby="modal-sqduh-label" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-sqduh-label">Tambah Dokumen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<!-- <label for="input-placeholder">Nama Dokumen</label> -->
					<input type="text" class="form-control" placeholder="Nama Dokumen" id="input-placeholder" fdprocessedid="74vtj7">
				</div>
				<div class="input-group file-group">
					<input type="text" class="form-control file-value" placeholder="Choose file..." readonly>
					<input type="file" multiple>
					<span class="input-group-append">
						<button class="btn btn-light file-browser" type="button"><i class="fa fa-upload"></i></button>
					</span>

				</div>
				<small class="form-text"><i>Dokumen harus dalam format .pdf</i></small>
				<br>
				<button class="btn btn-label btn-primary" fdprocessedid="n94e2j"><label><i class="ti-check"></i></label> Submit</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modal-top" id="modal-subkegiatan" tabindex="-1" role="dialog" aria-labelledby="modal-sqduh-label" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-sqduh-label">Tambah Sub-Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<!-- <label for="input-placeholder">Nama Dokumen</label> -->
					<input type="text" class="form-control" value="Kegiatan" disabled="" fdprocessedid="q5py2">
				</div>

				<div class="form-group">
					<label class="require" for="input-required">Nama Sub-Kegiatan</label>
					<input type="text" class="form-control" id="input-required" fdprocessedid="aqnmfw">
				</div>
				<!-- <div class="input-group file-group">
					<input type="text" class="form-control file-value" placeholder="Choose file..." readonly>
					<input type="file" multiple>
					<span class="input-group-append">
						<button class="btn btn-light file-browser" type="button"><i class="fa fa-upload"></i></button>
					</span>

				</div> -->

				<br>
				<button class="btn btn-label btn-primary" fdprocessedid="n94e2j"><label><i class="ti-check"></i></label> Submit</button>
			</div>
		</div>
	</div>
</div>
