<!-- List User Table -->

<h6 class="ml-4" style="color :#33cabb;"><em>Hasil Pencarian : <?= $result_user; ?></em></h6>

<table class="table table-hover  ">
    <thead class="thead thead-dark">
        <tr>
            <th>Nama</th>
            <th>NIP</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($users)) {
            foreach ($users as $indeks => $item) { ?>
                <tr>
                    <input type="hidden" name="idUser" id="idUser<?= $item['id_pegawai'] ?>" value="<?= $item['id_pegawai'] ?>">
                    <td name="namaUser" id="namaUser<?= $item['id_pegawai'] ?>"><?= $item['nama_peg'] ?></td>
                    <td name="nipUser" id="nipUser<?= $item['id_pegawai'] ?>"><?= $item['nip'] ?></td>
                    <td name="roleUser" id="roleUser">

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
<?= $this->pagination->create_links(); ?>