<!-- Main container -->

<main>
	<header class="header header-inverse mb-0" style="background-image: url(<?= base_url('assets/img/bg/redhead.png') ?>);">
		<div class="container">
			<div class="header-info">
				<div class="left">
					<br>
					<h2 class="header-title" style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;
						  text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">
						<strong>Pegawai Provinsi</strong>
						<small class="subtitle" style=" color: #444448;
						  text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">
							Daftar Pegawai Provinsi
						</small>
					</h2>
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

			<?php echo $this->session->flashdata('info_form');  ?>
			<div class="row">
				<div class="col-lg-7">
					<div class="card shadow-1">

						<!-- Search Form -->
						<!-- <div class="card-body">
								<div class="lookup lookup-right">
									<input type="text" id="searchUser" name="searchUser" autofocus autocomplete="off" placeholder="Cari Nama Pegawai">

								</div>
							</div> -->

						<!-- List User Table -->

						<div class="card-body"><!-- List User Table -->

							<!-- <h6 class="ml-4" style="color :#33cabb;"><em>Hasil Pencarian : <?= $result_user; ?></em></h6> -->

							<table class="table table-hover table-responsive" data-provide="datatables">
								<thead class="thead thead-dark">
									<tr>
										<th>Nama</th>
										<th>NIP</th>
										<th>NIP Lama</th>
										<th>Role</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (count($users)) {
										foreach ($users as $indeks => $item) {   ?>
											<tr>
												<input type="hidden" name="idUser" id="idUser<?= $item['id_pegawai'] ?>" value="<?= $item['id_pegawai'] ?>">
												<td name="namaUser" id="namaUser<?= $item['id_pegawai'] ?>"><?= $item['nama_peg'] ?></td>
												<td><?= $item['nip'] ?></td>
												<td name="nipUser" id="nipUser<?= $item['id_pegawai'] ?>"><?= $item['nip_lama'] ?></td>
												<td name="roleUser" id="roleUser<?= $item['id_pegawai'] ?>">
													<?php
													$foundMatch = false;
													$roles = array(); // Inisialisasi array untuk menampung nama peran
													foreach ($role_user[$indeks] as $user) {
														if ($item['nip_lama'] == $user['nip_pegawai']) {
															$roles[] = $user['nama_role']; // Tambahkan nama peran ke dalam array
															$foundMatch = true;
														}
													}
													// Jika ada yang sesuai, tampilkan daftar peran
													if ($foundMatch) {
														echo '<ul>'; // Mulai daftar tidak terurut
														foreach ($roles as $role) {
															echo '<li>' . $role . '</li>'; // Tampilkan setiap peran dalam elemen list
														}
														echo '</ul>'; // Selesai daftar tidak terurut
													} else {
														echo '<ul><li>User</li></ul>';
													}

													?>
												</td>
												<td>
													<!-- <nav class="nav gap-2 fs-16"> -->
													<span name="editUser" id="<?= $item['id_pegawai'] ?>" onclick="editUser(this.id)" class="nav-link hover-primary cat-edit" href="#" data-provide="tooltip" title="Edit" data-perform="edit" data-target="modal-cat-edit.html"><i class="ti-pencil"></i></span>
													<!-- <a class="nav-link hover-danger cat-delete" href="#" data-provide="tooltip" title="Delete" data-perform="delete" data-target="#"><i class="ti-trash"></i></a> -->
													<!-- </nav> -->
												</td>

											</tr>
										<?php }
									} else { ?>
										<tr>
											<td colspan="4">
												<div class="alert alert-secondary">User Tidak Ada</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							<!-- Pagination -->

						</div>


					</div>
				</div>

				<!-- Form Edit Role User -->
				<div class="col-lg-5">
					<form action="<?= base_url('') ?>Admin/Monitoring/User/editRole/1" method="post" class="card shadow-1">
						<h5 class="card-title"><strong>Edit Role User</strong></h5>

						<div class="card-body">
							<input class="form-control" type="hidden" name="idEdit" id="idEdit">
							<div class="form-group">
								<label class="require">Name</label>
								<input class="form-control" type="text" name="namaEdit" id="namaEdit" required readonly>
							</div>

							<div class="form-group">
								<label class="require">NIP</label>
								<input class="form-control" type="text" name="nipEdit" id="nipEdit" required readonly>
							</div>

							<div class="form-group">
								<label>Jenis Tim Kerja</label>
								<select multiple data-live-search="false" data-actions-box="true" class="selectpicker" title="Pilih Role" name="roleEdit[]" id="roleEdit" data-width="100%">
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
										console.log(roleOptions[i]);
									}
								}
							}
							$(kolomRole).selectpicker('refresh');

						}
					</script>
				</div>

			</div>
		</div>
	</section>
</main>