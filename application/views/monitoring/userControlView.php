<!-- Main container -->

<header class="header header-inverse">
    <div class="container">
        <div class="header-info">
            <div class="left">
                <br>
                <h2 class="header-title"><strong>User</strong> <small class="subtitle">Ubah dan Edit role user</small>
                </h2>
            </div>
        </div>
    </div>
</header>
<!--/.header -->

<div class="main-content">

    <div class="container">

        <div class="row">
            <div class="col-lg-7">
                <div class="card shadow-1">
                    <div class="card-body">
                        <form class="lookup lookup-right">
                            <input type="text" name="s" placeholder="Cari Nama Pegawai">
                        </form>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Role</th>
                                <th class="w-100px text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($users)) {
                                foreach ($users as $indeks => $item) { ?>
                                    <tr>
                                        <input type="hidden" name="idUser" id="idUser<?= $item['ida'] ?>" value="<?= $item['ida'] ?>">
                                        <td name="namaUser" id="namaUser<?= $item['ida'] ?>"><?= $item['namaU'] ?></td>
                                        <td name="nipUser" id="nipUser<?= $item['ida'] ?>"><?= $item['nip'] ?></td>
                                        <td name="roleUser" id="roleUser">
                                            <?php if ($item['super_admin'] == 1) {
                                                echo '<span class="badge badge-ring badge-danger mr-2 mt-2"></span>';
                                                echo '<input id="role' .  $item['ida']  . '" type="hidden" value="SuperAdmin"></input>';
                                                echo 'Super Admin';
                                            } elseif ($item['admin_tim_kerja_prov'] == 1) {
                                                echo '<span class="badge badge-ring badge-purple mr-2 mt-2"></span>';
                                                echo '<input id="role' .  $item['ida']  . '" type="hidden" value="AdminTimKerjaProv"></input>';
                                                echo 'Admin Tim Kerja Provinsi';
                                            } elseif ($item['admin_tim_kerja_kabkota'] == 1) {
                                                echo '<span class="badge badge-ring badge-pink mr-2 mt-2"></span>';
                                                echo '<input id="role' .  $item['ida']  . '" type="hidden" value="AdminTimKerjaKabKot"></input>';
                                                echo 'Admin Tim Kerja Kabupaten/Kota';
                                            } elseif ($item['kepala_prov'] == 1) {
                                                echo '<span class="badge badge-ring badge-success mr-2 mt-2"></span>';
                                                echo '<input id="role' .  $item['ida']  . '" type="hidden" value="KepalaProv"></input>';
                                                echo 'Kepala BPS Provinsi';
                                            } elseif ($item['kepala_kabkota'] == 1) {
                                                echo '<span class="badge badge-ring badge-cyan mr-2 mt-2"></span>';
                                                echo '<input id="role' .  $item['ida']  . '" type="hidden" value="KepalaKabKot"></input>';
                                                echo 'Kepala BPS Provinsi';
                                            } elseif ($item['ketua_tim_kerja_prov'] == 1) {
                                                echo '<span class="badge badge-ring badge-dark mr-2 mt-2"></span>';
                                                echo '<input id="role' .  $item['ida']  . '" type="hidden" value="KetuaTimKerjaProvinsi"></input>';
                                                echo 'Ketua Tim Kerja';
                                            } else {
                                                echo '<span class="badge badge-ring badge-secondary mr-2 mt-2"></span>';
                                                echo '<input id="role' .  $item['ida']  . '" type="hidden" value="user"></input>';
                                                echo 'User';
                                            } ?></td>
                                        <td>
                                            <!-- <nav class="nav gap-2 fs-16"> -->
                                            <span name="editUser" id="<?= $item['ida'] ?>" onclick="editUser(this.id)" class="nav-link hover-primary cat-edit" href="#" data-provide="tooltip" title="Edit" data-perform="edit" data-target="modal-cat-edit.html"><i class="ti-pencil"></i></span>
                                            <!-- <a class="nav-link hover-danger cat-delete" href="#" data-provide="tooltip" title="Delete" data-perform="delete" data-target="#"><i class="ti-trash"></i></a> -->
                                            <!-- </nav> -->
                                        </td>

                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-lg-5">
                <form action="<?= base_url('') ?>monitoring/user/editRole" method="post" class="card shadow-1">
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
                            <!-- <input class="form-control" type="text" name="roleEdit" id="roleEdit" readonly> -->

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
                        var idRole = "role" + $id;

                        var nama = document.getElementById(idNama).innerHTML;
                        var nip = document.getElementById(idNip).innerHTML;
                        var role = document.getElementById(idRole).value;

                        var kolomId = document.getElementById('idEdit');
                        var kolomNama = document.getElementById('namaEdit');
                        var kolomNip = document.getElementById('nipEdit');
                        var kolomRole = document.getElementById('roleEdit');


                        kolomId.value = $id;
                        kolomNama.value = nama;
                        kolomNip.value = nip;
                        kolomRole.value = role;

                    }
                </script>
            </div>

        </div>
    </div>
</div>