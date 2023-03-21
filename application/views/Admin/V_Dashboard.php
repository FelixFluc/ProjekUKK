<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Dashboard</h2>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Menunggu</div>
                    <div class="card-body"><?= $jumlah['pengaduan'] ?></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Proses</div>
                    <div class="card-body"><?= $jumlah['proses'] ?></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Selesai</div>
                    <div class="card-body"><?= $jumlah['selesai'] ?></div>
                </div>
            </div>
        </div>
        <div class="card col-md-5 mt-4">
            <h5 class="card-header">User Info</h5>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama </td>
                        <td><?= $petugas['nama_petugas'] ?></td>
                    </tr>
                    <tr>
                        <td>Username </td>
                        <td><?= $petugas['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Telepon </td>
                        <td><?= $petugas['telepon'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>