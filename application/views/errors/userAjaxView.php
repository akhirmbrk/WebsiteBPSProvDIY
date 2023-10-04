<!-- List User Table -->

<h6 class="ml-4" style="color :#33cabb;"><em>Hasil Pencarian : <?= $result_user; ?></em></h6>

<table class="table table-hover" data-provide="datatables">
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



                        // if ($item['super_admin'] == 1) {
                        //     echo '<span class="badge badge-ring badge-danger mr-2 mt-2"></span>';
                        //     echo '<input id="role' .  $item['ida']  . '" type="hidden" value="SuperAdmin"></input>';
                        //     echo 'Super Admin';
                        // } elseif ($item['admin_tim_kerja_prov'] == 1) {
                        //     echo '<span class="badge badge-ring badge-purple mr-2 mt-2"></span>';
                        //     echo '<input id="role' .  $item['ida']  . '" type="hidden" value="AdminTimKerjaProv"></input>';
                        //     echo 'Admin Tim Kerja Provinsi';
                        // } elseif ($item['admin_tim_kerja_kabkota'] == 1) {
                        //     echo '<span class="badge badge-ring badge-pink mr-2 mt-2"></span>';
                        //     echo '<input id="role' .  $item['ida']  . '" type="hidden" value="AdminTimKerjaKabKot"></input>';
                        //     echo 'Admin Tim Kerja Kabupaten/Kota';
                        // } elseif ($item['kepala_prov'] == 1) {
                        //     echo '<span class="badge badge-ring badge-success mr-2 mt-2"></span>';
                        //     echo '<input id="role' .  $item['ida']  . '" type="hidden" value="KepalaProv"></input>';
                        //     echo 'Kepala BPS Provinsi';
                        // } elseif ($item['kepala_kabkota'] == 1) {
                        //     echo '<span class="badge badge-ring badge-cyan mr-2 mt-2"></span>';
                        //     echo '<input id="role' .  $item['ida']  . '" type="hidden" value="KepalaKabKot"></input>';
                        //     echo 'Kepala BPS Provinsi';
                        // } elseif ($item['ketua_tim_kerja_prov'] == 1) {
                        //     echo '<span class="badge badge-ring badge-dark mr-2 mt-2"></span>';
                        //     echo '<input id="role' .  $item['ida']  . '" type="hidden" value="KetuaTimKerjaProvinsi"></input>';
                        //     echo 'Ketua Tim Kerja';
                        // } else {
                        //     echo '<span class="badge badge-ring badge-secondary mr-2 mt-2"></span>';
                        //     echo '<input id="role' .  $item['ida']  . '" type="hidden" value="user"></input>';
                        //     echo 'User';
                        // }
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
<!-- <?= $this->pagination->create_links(); ?> -->