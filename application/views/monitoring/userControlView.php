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
                            <?php if (count($users)) {
                                foreach ($users as $indeks => $item) { ?>
                                    <tr>
                                        <td><?= $item['namaU'] ?></td>
                                        <td><?= $item['nip'] ?></td>
                                        <td><?php if ($item['admin_zoom'] == 1) {
                                                echo '<span class="badge badge-ring badge-danger mr-2 mt-2"></span>';
                                                echo 'Admin Zoom';
                                            } elseif ($item['admin_pst'] == 1) {
                                                echo '<span class="badge badge-ring badge-warning mr-2 mt-2"></span>';
                                                echo 'Admin PST';
                                            } else {
                                                echo '<span class="badge badge-ring badge-info mr-2 mt-2"></span>';
                                                echo 'User';
                                            } ?></td>
                                        <td>
                                            <nav class="nav gap-2 fs-16">
                                                <a class="nav-link hover-primary cat-edit" href="#" data-provide="tooltip" title="Edit" data-perform="edit" data-target="modal-cat-edit.html"><i class="ti-pencil"></i></a>
                                                <a class="nav-link hover-danger cat-delete" href="#" data-provide="tooltip" title="Delete" data-perform="delete" data-target="#"><i class="ti-trash"></i></a>
                                            </nav>
                                        </td>

                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-lg-5">
                <form class="card shadow-1">
                    <h5 class="card-title"><strong>Edit Role User</strong></h5>

                    <div class="card-body">
                        <div class="form-group">
                            <label class="require">Name</label>
                            <input class="form-control" type="text" name="name" id="cat-name">
                        </div>

                        <div class="form-group">
                            <label class="require">NIP</label>
                            <input class="form-control" type="text" name="slug" id="cat-slug">
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <!-- <input class="form-control" type="text" name="name" value="#33cabb" data-provide="colorpicker"> -->
                            <div>
                                <select data-provide="selectpicker" class="form-control">
                                    <option selected value="SuperAdmin">Super Admin</option>
                                    <option value="AdminTimKerjaProv">Admin Tim Kerja Prov</option>
                                    <option value="AdminTimKerjaKabKot">Admin Tim Kerja KabKot</option>
                                    <option value="KepalaProv">Kepala Prov</option>
                                    <option value="KepalaKabKot">Kepala KabKot</option>
                                    <option value="KetuaTimKerjaProvins">Ketua Tim Kerja Prov</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <footer class="card-footer text-right">
                        <button class="btn btn-primary">Save</button>
                    </footer>

                </form>
            </div>

        </div>
    </div>
</div>