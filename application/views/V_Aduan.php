<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tulis Keluhan</h1>
        <form class="mt-5" method="post" action="<?= base_url('C_Main/report') ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="disabledtextinput" class="form-label">
                    <h6>NIK</h6>
                </label>
                <input type="text" class="form-control" id="nik" name="nik" aria-describedby="nik" value="<?= $user['nik'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">
                    <h6>Laporan</h6>
                </label>
                <textarea class="form-control" id="isi_laporan" name="isi_laporan"></textarea>
                <small class="text-danger"><?= form_error('isi_laporan'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2"><h6>Kategori</h6></label>
                <select class="form-control" id="kategori" name="kategori">
                    <option selected>Pilih salah satu</option>
                    <?php foreach ($kategori as $kt) : ?>
                    <option value="<?= $kt['id'] ?>"><?= $kt['kategori'] ?></option>
                    <?php endforeach; ?>
                </select>
                <small id="kategoriHelp" class="form-text text-muted">Mohon pilih salah satu.</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2"><h6>Subkategori</h6></label>
                <select class="form-control" id="subkategori" name="subkategori">
                    <option selected>Pilih salah satu</option>
                </select>
                <small id="subkategoriHelp" class="form-text text-muted">Mohon pilih salah satu.</small>
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">
                    <h6>Waktu</h6>
                </label>
                <input type="time" class="form-control" id="waktu" name="waktu">
                <small class="text-danger"><?= form_error('waktu'); ?></small>
            </div>
            <!-- <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">
                    <h6>Tanggal</h6>
                </label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
                <small class="text-danger"><?= form_error('tanggal'); ?></small>
            </div> -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">
                    <h6>Gambar</h6>
                </label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary">
                <h6>Tambah laporan</h6>
            </button>
        </form>
    </div>
</main>