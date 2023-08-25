<!-- Main container -->
<main>

	<header class="header header- bg-img" style="background-image: url(<?= base_url() ?>assets/img/gallery/1.jpg)">
		<div class="header-info">
			<div class="left">
				<h1 class="header-title">Notulen Rapat Daring Saya</h1>
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
					<div class="card card-bordered card-hover-shadow">


						<div class="card-body">
							<?php echo $this->session->flashdata('info_form');  ?>

							<table id="mp_tabel" class="table table-hover table-bordered table-responsive" data-provide="datatables" cellspacing="0">
								<thead>
									<tr>
										<th width="5%" class="fw-600" style="vertical-align:middle;">No </th>
										<th width="20%" class="fw-600" style="vertical-align:middle;">Perihal Zoom</th>
										<th width="15%" class="fw-600" style="vertical-align:middle;">Jadwal Mulai</th>
										<th width="15%" class="fw-600" style="vertical-align:middle;">Jadwal Selesai</th>
										<th width="15%" colspan="2" class="fw-600" style="vertical-align:middle;">Notulen</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$nomor = 1;
									if (count($list_order) > 0) {
										// if (count($list_order)) {
										foreach ($list_order as $indeks => $list) {  ?>
											<tr>
												<td><?php echo $nomor; ?></td>
												<td><?php echo $list['perihal']; ?></td>
												<td><?php echo $list['jadwal_awal']; ?></td>
												<td><?php echo $list['jadwal_akhir']; ?></td>






												<?php if ($list['notulen'] == NULL) { ?>
													<td>
														<span class="badge badge-warning">Belum Upload</span>
													</td>
													<td>
														<a name="d_edit_bagi_pegawai" class="btn btn-square btn-outline btn-xs btn-dark" href="<?php echo base_url('index.php/zoomorder/uploadnotulenview/' . $list['idm']); ?>" data-provide="tooltip" data-placement="top" title="Upload Notulen"><i class="ti-upload"></i></a>
													</td>


												<?php } else {  ?>

													<td>
														<span class="badge badge-success">Sudah Upload</span>
													</td>
													<td>
														<a name="d_edit_bagi_pegawai" class="btn btn-square btn-outline btn-xs btn-dark" href="<?php echo base_url('notulen/' . $list['notulen'] . '.pdf'); ?>" data-provide="tooltip" data-placement="top" title="Download Notulen"><i class="ti-download"></i></a>
													</td>

												<?php }  ?>

											</tr>
										<?php
											$nomor++;
										}
									} else { ?>
										<tr>
											<td><?php echo $nomor; ?></td>
											<td>tidak ada data</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>

									<?php } ?>
								</tbody>
							</table>
						</div>


					</div>
				</div>



			</div><!--/.row -->


		</div>
	</div><!--/.main-content -->



</main>
<!-- END Main container -->