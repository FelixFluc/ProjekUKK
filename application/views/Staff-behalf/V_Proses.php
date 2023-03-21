<main>
    <div class="container-fluid px-4">
        <h1 class="mt-2">Tanggapan</h1>
        <div class="row">
            <div class="col-lg mb-4">
                <div class="card mt-3">
                    <div class="card-header py-3">
                        <h6>Pengaduan</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <fieldset disabled>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="disabledTextInput" class="form-label">Pelapor</label>
                                        <input type="text" id="pelapor" class="form-control"
                                            value="<?= $aduan['nama'] ?>" placeholder="Disabled input">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="disabledSelect" class="form-label">Tanggal</label>
                                        <input type="text" id="tanggal" class="form-control"
                                            value="<?= $aduan['tanggal'] ?>" placeholder="Disabled input">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="disabledSelect" class="form-label">Kategori</label>
                                        <input type="text" id="kategori" class="form-control"
                                            value="<?= $aduan['kategori'] ?>" placeholder="Disabled input">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="disabledSelect" class="form-label">Subkategori</label>
                                        <input type="text" id="subkategori" class="form-control"
                                            value="<?= $aduan['sub_kategori'] ?>" placeholder="Disabled input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Isi Laporan</label>
                                        <input type="text" id="isi" class="form-control"
                                            value="<?= $aduan['isi_laporan'] ?>" placeholder="Disabled input">
                                    </div>
                                    <div class="mb-3">
                                        <label>Gambar</label>
                                        <p><img src="<?= base_url('asset/img/uploads/') . $aduan['foto'] ?>"
                                                width="300px"></p>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-4">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-header bg-secondary" style="color:white;">
                    List Tanggapan
                </h5>
                <table class="table">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tanggapan</th>
                            <th scope="col">Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        if ($tanggapan) { ?>
                            <tr>
                                <td scope="col">
                                    <?= $no++ ?>
                                </td>
                                <td scope="col">
                                    <?= $tanggapan['tgl_tanggapan'] ?>
                                </td>
                                <td scope="col">
                                    <?= $tanggapan['tanggapan'] ?>
                                </td>
                                <td scope="col">
                                    <?= $tanggapan['id_petugas'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tanggapan">
                    Tandai Selesai
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Modal Selesai Tanggapan -->
<div class="modal fade" id="tanggapan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('C_Main/laporan_up/') . $aduan['id_pengaduan'] ?>">
                    <h4>Yakin ingin mengubah status menjadi selesai?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('C_Main/laporan_done/') . $aduan['id_pengaduan'] ?> " type="submit"
                class="btn btn-primary">Selesai</a>
            </div>
        </div>
    </div>
</div>