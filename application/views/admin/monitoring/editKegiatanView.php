<!-- Main container -->
<main class="main-container">


	<header class="header header-inverse mb-0" style="background:rgba(243,243,243,255);">
		<div class=" container">
			<div class="header-info">
				<div class="left">
					<br>
					<h2 class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong><?= $progres_kegiatan['judul_kegiatan'] ?></strong>
						<small class="subtitle" style="color: black;

text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><?= $tim_kerja['nama_team'] ?></small>
					</h2>
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
			<form action="<?php echo (base_url('Admin/Monitoring/Kegiatan/updateKegiatan/') . $progres_kegiatan['id_kegiatan']) . "/" . $kodeKabKota ?>" class="row" method="post" enctype="multipart/form-data">


				<div class="col-md-8 col-xl-12">
					<div class="card shadow-1">
						<h4 class="card-title"><strong>Detail</strong> Kegiatan</h4>

						<div class="card-body">

							<div class="row">
								<div class="form-group col-md-6">
									<label class="require">Tim Kerja</label>
									<input type="text" class="form-control" value="Tim Kerja" disabled>
								</div>

								<div class="form-group col-md-6">
									<label class="require">Judul Kegiatan</label>
									<input type="text" class="form-control" value="<?= $progres_kegiatan['judul_kegiatan'] ?>" disabled>
								</div>
							</div>

							<hr>
							<label class="require">Tanggal Mulai</label>
							<input type="text" value="<?= $progres_kegiatan['tgl_start'] ?>" class="form-control" value="Tanggal Mulai" disabled>
							<br>
							<label class="require">Tanggal Selesai</label>
							<input type="text" value="<?= $progres_kegiatan['tgl_start'] ?>" class="form-control" value="Tanggal Selesai" disabled>

							<hr>

							<label class="require">Progress</label>

							<div data-provide="slider" name="progresKegiatan" data-value=" <?= $progres_kegiatan['persen_progres']; ?>" data-target="next"></div>
							<input style="width: 25px;" type="number" name="progresKegiatan" value="" class="form-control-plaintext" readonly>


							<hr>

							<div class="form-group">
								<label class="require">Deskripsi Kegiatan</label>
								<textarea data-provide="summernote" data-toolbar="slim" data-min-height="220" name="deskripsiKegiatan">
                                    <?= $progres_kegiatan['deskripsi_progres'] ?>
									</textarea>
							</div>
						</div>


						<footer class="card-footer text-right">
							<a class="btn btn-secondary mr-2" href="<?= base_url('Admin/Monitoring/Kegiatan') ?>">Cancel</a>
							<button class="btn btn-primary" type="submit">Update</button>
						</footer>


					</div>
				</div>


				<!-- <div class="col-md-5 col-xl-4">
        <div class="card shadow-1">
          <h5 class="card-title">Attachments</h5>

          <div class="card-body">
            <div class="input-group file-group">
              <input type="text" class="form-control file-value" placeholder="Choose file..." readonly>
              <input type="file" multiple>
              <span class="input-group-append">
                <button class="btn btn-light file-browser" type="button"><i class="fa fa-upload"></i></button>
              </span>
            </div>
          </div>
        </div>
      </div> -->


			</form>
		</div>
	</div>