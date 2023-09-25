<!-- Main container -->

<main>
	<header class="header header-inverse" style="background-image: url(<?= base_url('assets/img/bg/redhead.png') ?>);">
		<div class="container">
			<div class="header-info">
				<div class="left">
					<br>
					<div class="header-title" , style="font-size: 55px; color: #9597a5;text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">
						<strong>Pegawai Kabupaten/Kota</strong>
						<small class="subtitle" style="color: black;text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">
							Daftar Pegawai dari Kabupaten dan Kota
						</small>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--/.header -->

	<div class="main-content">

		<div class="container">
			<?php echo $this->session->flashdata('info_form');  ?>
			<div class="row">
				<div class="col-lg-7">
					<div class="card shadow-1">

						<!-- Search Form -->
						<div class="card-body">
							<form class="lookup lookup-right">
								<input type="text" id="searchUserKabkota" name="searchUserKabkota" autocomplete="off" placeholder="Cari Nama Pegawai">
							</form>
						</div>
						<!-- List User Table -->

						<div id="ajaxContent1"></div>


					</div>
				</div>

				<!-- Form Edit Role User -->
				<div class="col-lg-5">
					<form action="<?= base_url('') ?>Admin/Monitoring/User/editRole/2" method="post" class="card shadow-1">
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
								<label>Jenis Tim Kerja</label>
								<select title="Role User" multiple data-live-search="false" data-actions-box="true" class="selectpicker" data-provide="selectpicker" name="roleEdit[]" id="roleEdit" data-width="100%">
									<?php foreach ($list_role as $key => $role) { ?>
										<option value="<?= $role['id_role']; ?>"><?= $role['nama_role']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<footer class="card-footer text-right">
							<button class="btn btn-primary" type="submit">Save</button>
						</footer>

					</form>


					<script>
						function editUser($id) {
							// var kolomRole = document.getElementById('roleEdit');
							// console.log(kolomRole.selected);

							var idNama = "namaUser" + $id;
							var idNip = "nipUser" + $id;
							var idRole = "roleUser" + $id;

							var nama = document.getElementById(idNama).innerHTML;
							var nip = document.getElementById(idNip).innerHTML;

							var tdElement = document.getElementById(idRole);
							// Mengambil elemen <ul> yang berada di dalam <td>
							var ulElement = tdElement.querySelector("ul");
							// Mengambil daftar elemen <li> dalam <ul>
							var liElements = ulElement.querySelectorAll("li");

							// Loop melalui setiap elemen <li> dan mengakses inner HTML-nya
							var role = []
							liElements.forEach(function(liElement, indeks) {
								role[indeks] = liElement.innerHTML;
							});
							// Cetak inner HTML dari setiap elemen <li>

							// console.log(role);
							var kolomId = document.getElementById('idEdit');
							var kolomNama = document.getElementById('namaEdit');
							var kolomNip = document.getElementById('nipEdit');
							var kolomRole = document.getElementById('roleEdit');
							var roleOptions = kolomRole.options;
							// var allInnerHTML = [];

							// Mengambil innerHTML dari semua opsi dan memeriksa apakah role sama dengan opsi

							kolomId.value = $id;
							kolomNama.value = nama;
							kolomNip.value = nip;
							for (var i = 0; i < roleOptions.length; i++) {
								roleOptions[i].removeAttribute('selected');
								for (var j = 0; j < role.length; j++) {
									if (role[j] === roleOptions[i].innerHTML) {
										roleOptions[i].setAttribute('selected', '');
										console.log(roleOptions);
									}
								}
							}
							$(kolomRole).selectpicker('refresh');

						}
					</script>
				</div>

			</div>
		</div>
	</div>
</main>