<!-- Main container -->

<main>
	<header class="header header-inverse mb-0" style="background-image: url(<?= base_url('assets/img/bg/redhead.png') ?>);">
		<div class="container">
			<div class="header-info">
				<div class="left">
					<br>
					<div class="header-title" , style="font-size: 55px; color: #9597a5;text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">
						<strong>Pegawai Provinsi</strong>
						<small class="subtitle" style="color: black;text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">
							Daftar Pegawai Provinsi
						</small>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--/.header -->

	<section>
		<div class="main-content">
			<div class="set">
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves1.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves2.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves3.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves4.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves1.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves2.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves3.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves4.png" /></div>
			</div>
			<div class="set set2">
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves1.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves2.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves3.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves4.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves1.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves2.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves3.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves4.png" /></div>
			</div>
			<div class="set set3">
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves1.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves2.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves3.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves4.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves1.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves2.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves3.png" /></div>
				<div><img src="<?php echo base_url(); ?>/assets/img/leaves/leaves4.png" /></div>
			</div>

			<div class="container">
				<?php echo $this->session->flashdata('info_form');  ?>
				<div class="row">
					<div class="col-lg-7">
						<div class="card shadow-1">

							<!-- Search Form -->
							<div class="card-body">
								<form class="lookup lookup-right">
									<input type="text" id="searchUser" name="searchUser" autofocus autocomplete="off" placeholder="Cari Nama Pegawai">
									<!-- <button type="button" id="searchBtn" class="btn btn-info">Search</button>
                            <button type="button" id="resetBtn" class="btn btn-warning">Reset</button> -->

								</form>
							</div>

							<!-- List User Table -->

							<div id="ajaxContent"></div>


						</div>
					</div>

					<!-- Form Edit Role User -->
					<div class="col-lg-5">
						<form action="<?= base_url('') ?>Monitoring/User/editRole" method="post" class="card shadow-1">
							<h5 class="card-title"><strong>Edit Role User</strong></h5>

							<div class="card-body">
								<input class="form-control" type="hidden" name="idEdit" id="idEdit">
								<div class="form-group">
									<label class="require">Name</label>
									<input class="form-control" type="text" name="namaEdit" id="namaEdit" readonly>
								</div>

								<div class="form-group">
									<label class="require">NIP</label>
									<input class="form-control" type="text" name="nipEdit" id="nipEdit" readonly>
								</div>

								<div class="form-group">
									<label>Role</label>
									<select name="roleEdit" id="roleEdit" class="form-control">
										<option value="SuperAdmin">Super Admin</option>
										<option value="AdminTimKerjaProv">Admin Tim Kerja Provinsi</option>
										<option value="AdminTimKerjaKabKot">Admin Tim Kerja Kabupaten/Kota</option>
										<option value="KepalaProv">Kepala Provinsi</option>
										<option value="KepalaKabKot">Kepala KabKabupaten/Kota</option>
										<option value="KetuaTimKerjaProvinsi">Ketua Tim Kerja Provinsi</option>
										<option value="user">User</option>
									</select>
								</div>
							</div>

							<footer class="card-footer text-right">
								<button class="btn btn-primary" type="submit">Save</button>
							</footer>

						</form>


						<script>
							function editUser($id) {

								var idNama = "namaUser" + $id;
								var idNip = "nipUser" + $id;
								// var idRole = "role" + $id;

								var nama = document.getElementById(idNama).innerHTML;
								var nip = document.getElementById(idNip).innerHTML;
								// var role = document.getElementById(idRole).value;

								var kolomId = document.getElementById('idEdit');
								var kolomNama = document.getElementById('namaEdit');
								var kolomNip = document.getElementById('nipEdit');
								// var kolomRole = document.getElementById('roleEdit');


								kolomId.value = $id;
								kolomNama.value = nama;
								kolomNip.value = nip;
								// kolomRole.value = role;

							}
						</script>
					</div>

				</div>
			</div>
		</div>
	</section>
</main>
