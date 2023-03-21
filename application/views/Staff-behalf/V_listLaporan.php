<main>
    <div class="container-fluid px-4">
        <div class="card mt-5">
            <h5 class="card-header bg-secondary" style="color:white;">
                List Laporan
            </h5>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pelapor</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Subkategori</th>
                            <th scope="col">Isi</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($laporan as $lp) : ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td scope="row"><?= $lp['nama'] ?></td>
                                <td scope="row"><?= $lp['tanggal'] ?></td>
                                <td scope="row"><?= $lp['kategori'] ?></td>
                                <td scope="row"><?= $lp['sub_kategori'] ?></td>
                                <td scope="row"><?= $lp['isi_laporan'] ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#detail<?= $lp['id_pengaduan'] ?>">
                                        Detail
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="detail<?= $lp['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <fieldset disabled>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="disabledTextInput" class="form-label">Pelapor</label>
                                                                    <input type="text" id="pelapor" class="form-control" value="<?= $lp['nama'] ?>" placeholder="Disabled input">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="disabledSelect" class="form-label">Tanggal</label>
                                                                    <input type="text" id="tanggal" class="form-control" value="<?= $lp['tanggal'] ?>" placeholder="Disabled input">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="disabledSelect" class="form-label">Kategori</label>
                                                                    <input type="text" id="kategori" class="form-control" value="<?= $lp['kategori'] ?>" placeholder="Disabled input">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="disabledSelect" class="form-label">Subkategori</label>
                                                                    <input type="text" id="subkategori" class="form-control" value="<?= $lp['sub_kategori'] ?>" placeholder="Disabled input">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledSelect" class="form-label">Isi Laporan</label>
                                                                <input type="text" id="isi" class="form-control" value="<?= $lp['isi_laporan'] ?>" placeholder="Disabled input">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Gambar</label>
                                                                <p><img src="<?= base_url('asset/img/uploads/') . $lp['foto'] ?>" width="300px"></p>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <!-- button trigger modal -->
                                    <?php if ($lp['status'] == 'selesai') : ?>
                                       
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selesai<?= $lp['id'] ?>">
                                            Selesai
                                        </button>
                                   
                                    <?php elseif ($lp['status'] == 'proses') : ?>
                                        <a button type="button" class="btn btn-warning" href="<?= base_url('C_View/Aproses/') . $lp['id_pengaduan'] ?>">
                                            Proses
                                        </a>
                                  
                                    <?php else : ?>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#balas<?= $lp['id_pengaduan'] ?>">
                                            Tindakan
                                        </button>
                                    <?php endif ?>
                                    

                                    <!-- modal #balas -->
                                    <div class="modal fade" id="balas<?= $lp['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tindakan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?= base_url('C_Main/laporan_up/') . $lp['id_pengaduan'] ?>">
                                                        <fieldset disabled>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="disabledTextInput" class="form-label">Pelapor</label>
                                                                    <input type="text" id="pelapor" name="pelapor" class="form-control" value="<?= $lp['nama'] ?>" placeholder="Disabled input">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="disabledSelect" class="form-label">Tanggal</label>
                                                                    <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?= $lp['tanggal'] ?>" placeholder="Disabled input">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="disabledSelect" class="form-label">Kategori</label>
                                                                    <input type="text" id="kategori" name="kategori" class="form-control" value="<?= $lp['kategori'] ?>" placeholder="Disabled input">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="disabledSelect" class="form-label">Subkategori</label>
                                                                    <input type="text" id="subkategori" name="subkategori" class="form-control" value="<?= $lp['sub_kategori'] ?>" placeholder="Disabled input">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledSelect" class="form-label">Isi Laporan</label>
                                                                <input type="text" id="isi" name="isi" class="form-control" value="<?= $lp['isi_laporan'] ?>" placeholder="Disabled input">
                                                            </div>
                                                        </fieldset>
                                                        <div class="mb-3">
                                                            <label for="">Status</label>
                                                            <select class="form-select" id="status" name="status" aria-label="Default select example">
                                                                <option selected>Pilih salah satu</option>
                                                                <option value="proses">Proses</option>
                                                                <option value="selesai">Selesai</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label label for="exampleInputEmail1" class="form-label">
                                                                Komentar
                                                            </label>
                                                            <textarea class="form-control" id="tanggapan" name="tanggapan"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>