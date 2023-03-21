<main>
    <div class="container-fluid px-4">
        <div class="card mt-5">
            <h5 class="card-header bg-secondary" style="color:white;">
                Category List
            </h5>

            <!-- modal add category -->
            <div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('C_Main/add_category') ?>" method="post" class="form-group">
                                <label>Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- tabel kategori -->
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kategori as $kt) : ?>
                            <tr>
                                <td scope="col"><?= $no++ ?></td>
                                <td scope="col"><?= $kt['kategori'] ?></td>
                                <td><a><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $kt['id'] ?>">
                                            <i class="fas fa-pen" aria-hidden="true"></i>
                                        </button></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('C_Main/delete_category/' . $kt['id']) ?> "><button class="btn bg-danger" type='submit' onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr>

                            <!-- modal edit category -->
                            <div class="modal fade" id="edit<?= $kt['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('C_Main/edit_category/') . $kt['id'] ?>" method="post" class="form-group">
                                                <label>Kategori</label>
                                                <input type="text" class="form-control" id="kategori" name="kategori">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- button for add category -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category">
                    Tambah Kategori
                </button>

            </div>
        </div>
</main>

<!-- tabel subkategori -->
<main>
    <div class="container-fluid px-4">
        <div class="card mt-5">
            <h5 class="card-header bg-secondary" style="color:white;">
                Subcategory List
            </h5>

            <!-- modal add subcategory -->
            <div class="modal fade" id="subcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('C_Main/add_subcategory') ?>" method="post" class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori">
                                        <?php foreach ($kategori as $kt) : ?>
                                            <option value="<?= $kt['id'] ?>"><?= $kt['kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label>Subkategori</label>
                                <input type="text" class="form-control" id="subkategori" name="subkategori">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Subkategori</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($subkategori as $skt) : ?>
                            <tr>
                                <td scope="col"><?= $no++ ?></td>
                                <td scope="col"><?= $skt['kategori'] ?></td>
                                <td scope="col"><?= $skt['sub_kategori'] ?></td>
                                <td><a><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editsub<?= $skt['id_subkategori'] ?>">
                                            <i class="fas fa-pen" aria-hidden="true"></i>
                                        </button></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('C_Main/delete_subcategory/' . $skt['id_subkategori']) ?> "><button class="btn bg-danger" type='submit' onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr>

                            <!-- modal edit category -->
                            <div class="modal fade" id="editsub<?= $skt['id_subkategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Subkategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('C_Main/edit_subcategory/') . $skt['id_subkategori'] ?>" method="post" class="form-group">
                                                <label>Subkategori</label>
                                                <input type="text" class="form-control" id="subkategori" name="subkategori" value="<?= $skt['sub_kategori'] ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- button for add category -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subcategory">
                    Tambah Subkategori
                </button>
            </div>
        </div>
    </div>
</main>