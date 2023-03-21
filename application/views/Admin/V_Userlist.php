<!-- tabel list petugas -->
<main>
    <div class="container-fluid px-4">
        <div class="card mt-5">
            <h5 class="card-header bg-secondary" style="color:white;">
                List petugas
            </h5>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Dispose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($userlist as $ul): ?>
                            <tr>
                                <td scope="row">
                                    <?= $no++ ?>
                                </td>
                                <td scope="row">
                                    <?= $ul['nama_petugas'] ?>
                                </td>
                                <td scope="row">
                                    <?= $ul['level'] ?>
                                </td>
                                <td><a><button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editadmin<?= $ul['id_petugas'] ?>">
                                            <i class="fas fa-pen" aria-hidden="true"></i>
                                        </button></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('C_Main/delete_admin/' . $ul['id_petugas']) ?> "><button
                                            class="btn bg-danger" type='submit'
                                            onclick="return confirm('Proceed to delete staff?')"><i
                                                class="fas fa-ban"></i></button></a>
                                </td>
                            </tr>

                            <!-- modal edit admin -->
                            <div class="modal fade" id="editadmin<?= $ul['id_petugas'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('C_Main/edit_admin/') . $ul['id_petugas'] ?>"
                                                method="post" class="form-group">
                                                <label>Nama</label>
                                                <input type="text" value="<?= $ul['nama_petugas'] ?>" class="form-control"
                                                    id="nama_petugas" name="nama_petugas">
                                                <label>Username</label>
                                                <input type="text" value="<?= $ul['username'] ?>" class="form-control"
                                                    id="username" name="username">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Role</label>
                                                    <select class="form-control" id="level" name="level">
                                                        <option selected>Pilih salah satu</option>
                                                        <option>Admin</option>
                                                        <option>Petugas</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            <?php endforeach ?>
            </tbody>
        </div>
        </table>

        <!-- Button trigger modal add petugas -->
        <?php if ($petugas['level'] == 'admin') { ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#petugas">
                Tambah Petugas
            </button>
        <?php } ?>

        <!-- Modal add petugas -->
        <div class="modal fade" id="petugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form action="<?= base_url('C_Main/tambahpetugas') ?>" method="post">

                                <div class="">
                                    <div>
                                    </div>
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama_petugas"
                                                name="nama_petugas" placeholder="Nama">
                                            <?= form_error('nama_petugas', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name="username" placeholder="Username">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" id="telepon"
                                                name="telepon" placeholder="telp">
                                            <?= form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    name="password1" id="password1" placeholder="Password">
                                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    name="password2" id="password2" placeholder="Repeat Password">
                                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>
                                        <select class="form-select form-control" aria-label="Default select example"
                                            name="level" id="level">
                                            <option selected>Pilih Role</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Petugas</option>
                                        </select>
                                        <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<!-- tabel list masyarakat -->
<main>
    <div class="container-fluid px-4">
        <div class="card mt-5">
            <h5 class="card-header bg-secondary" style="color:white;">
                List masyarakat
            </h5>
            <div class="card-body">
                <?= $this->session->flashdata('message4'); ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Dispose</th>
                            <!-- <?php if ($user['level'] == 'admin') { ?>
                                <th>Aksi</th>
                            <?php } ?> -->
                            <th scope="col">Suspend</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $us): ?>
                            <tr>
                                <td scope="row">
                                    <?= $no++ ?>
                                </td>
                                <td scope="row">
                                    <?= $us['nama'] ?>
                                </td>
                                <td scope="row">
                                    <?= $us['nik'] ?>
                                </td>
                                <!-- <td scope="row"><?= $us['user_status'] ?></td> -->
                                <td>
                                    <a href="<?= base_url('C_Main/ban_user/' . $us['id']) ?> "><button class="btn bg-danger"
                                            type='submit' onclick="return confirm('Proceed to delete user?')"><i
                                                class="fas fa-ban"></i></button></a>
                                </td>
                                <td>
                                    <?php if ($us['user_status'] == 'dormant') { ?>
                                        <a href="<?= base_url('C_Main/user_unsuspend/' . $us['id']) ?>">
                                            <button type="submit" class="btn btn-success"
                                                onclick="return confirm('Proceed to activate user?')"><i
                                                    class="fas fa-unlock"></i>
                                            </button>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('C_Main/user_suspend/' . $us['id']) ?>">
                                            <button type="submit" class="btn btn-warning"
                                                onclick="return confirm('Proceed to suspend user?')"><i class="fas fa-lock"></i>
                                            </button>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>