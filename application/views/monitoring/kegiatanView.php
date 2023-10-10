<!-- Main container -->

<header class="header header-inverse mb-0" style="background:rgba(243,243,243,255);">
	<div class="container">
		<div class="header-info">
			<div class="left">
				<br>
				<h2 class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong>Kegiatan</strong> <small class="subtitle" style="color: black;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Cek Kegiatan yang sedang
						Berjalan</small></h2>
			</div>
		</div>

	</div>
</header>
<!--/.header -->

<div class="main-content">

	<div class="container">
		<div class="row">
			<div class="card">

				<!-- Filter -->
				<form class="m-3">
					<?php echo $this->session->flashdata('info_form'); ?>
					<br>
					<div class="card-body">
						<h4> <strong>Filter Kegiatan</strong></h4>
						<div class="form-row"><!-- Searching kegiatan -->
							<div class="form-group col-md-6">
								<label for="filterPeriode">Periode Pelaksanaan</label>
								<select id="filterPeriode" name="filterPeriode" title="Periode Pelaksanaan" multiple data-live-search="true" data-actions-box="true" class="selectpicker form-control" data-provide="selectpicker" data-width="100%">
									<?php
									if (count($periode)) {
										foreach ($periode as $indeks => $item) {
											$selected = ($item['aktif'] == 1) ? "selected" : "";
									?>
											<option value="<?= $item['Tahun'] ?>" <?= $selected ?>><?= $item['Tahun']; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="filterTimKerja">Tim Kerja</label>
								<select id="filterTimKerja" name="filterTimKerja" title="All Tim Kerja" multiple data-live-search="true" data-actions-box="true" class="selectpicker form-control" data-provide="selectpicker" data-width="100%">
									<?php
									if (count($tim_kerja)) {
										foreach ($tim_kerja as $indeks => $item) {
									?>
											<option value="<?= $item['id_zteam'] ?>"><?php echo $item['nama_team']; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group text-right">
							<button id="resetFilter" class="btn btn-secondary btn-sm">Reset</button>
						</div>
					</div>
				</form>

				<!-- END Filter -->
				<div class="media-list">
					<div class="lookup lookup-right m-3">
						<input type="text" id="searchKegiatan" name="searchKegiatan" autocomplete="off" placeholder="Cari Kegiatan">
					</div>
					<!-- List Kegiatan  -->
					<div id="ajaxContent" class="media-list-body b-1 mb-30"></div>
				</div>


				<!-- <footer class="flexbox align-items-center py-20">
                </footer> -->



			</div>

		</div>
	</div>
</div>