<!-- Main container -->
<header class="header header-inverse mb-0" style="background:rgba(243,243,243,255);">
	<div class="container">
		<div class="header-info">
			<div class="left">
				<h2>
					<div class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong>Tim Kerja</strong> <small class="subtitle" style="color: black;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Pengaturan untuk membuat dan
							menyesuaikan tim kerja</small>
					</div>
			</div>
		</div>
		<div class="header-action">
			<div class="buttons">
				<a class="btn btn-primary btn-float" href="<?= base_url('Admin/Monitoring/TimKerja/TambahTimKerja') ?>" title="Tambah Tim Kerja" data-provide="tooltip"><i class="ti-plus"></i></a>
			</div>

		</div>
	</div>
</header>
<!--/.header -->


<div class="main-content">

	<div class="container">
		<?php echo $this->session->flashdata('info_form');  ?>

		<!-- Filter -->
		<div class="row">
			<div class="card">
				<hr>
				<h4><strong>Filter Tim Kerja</strong></h4>

				<form>
					<div class="form-group">
						<label>Periode Pelaksanaan</label>
						<select id="filterPeriode" nama="filterPeriode" title="Periode Pelaksanaan" multiple data-live-search="false" data-actions-box="true" data-provide="selectpicker" data-width="100%">
							<?php
							if (count($periode)) {
								foreach ($periode as $indeks => $item) {
									$selected = ($item['aktif'] == 1) ? "selected" : ""; ?>
									<option value="<?= $item['id_zperiode'] ?>" <?= $selected ?>><?= $item['Tahun']; ?></option>
							<?php }
							} ?>

						</select>
					</div>



					<!-- 
                        <div class="form-group">
                            <label>Jenis Tim Kerja</label>
                            <select id="filterTimKerja" name="filterTimKerja" title="Jenis Tim Kerja" multiple data-provide="selectpicker" data-width="100%">
                                <?php
								if (count($tim_kerja)) {
									foreach ($tim_kerja as $indeks => $item) {  ?>
                                        <option value="<?= $item['id_zteam'] ?>"><?php echo $item['nama_team']; ?></option>
                                <?php }
								} ?>
                            </select>
                        </div> -->

					<hr>

					<div class="text-right">
						<a id="resetFilter" class="btn btn-sm btn-bold btn-secondary mr-1">Reset</a>
					</div>
				</form>
				<!-- END Filter -->

				<hr>


				<!-- Search -->
				<!-- END Search -->
				<div class="media-list media-list-divided media-list-hover" data-provide="selectall">
					<div class="media-list-body bg-white b-1 mb-50">
						<div class="card-body">
							<div class="lookup lookup-right">
								<input type="text" id="searchTimKerja" name="searchTimKerja" autocomplete="off" placeholder="Cari Tim Kerja">
							</div>
						</div>
						<!-- List Tim Kerja -->
						<div id="ajaxContent"></div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>