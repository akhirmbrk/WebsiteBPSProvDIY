<!-- List User Table -->
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
        } else { ?>
            <tr>
                <td>
                    <div class="">
                        <div class="alert alert-secondary">User tidak Ada</div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-- Pagination -->
<?= $this->pagination->create_links(); ?>