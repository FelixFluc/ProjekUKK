<main>
        <div class="container-fluid px-4">
            <div class="card mt-5">
                <h5 class="card-header bg-secondary" style="color:white;">
                    Riwayat
                </h5>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Subkategori</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; 
                            foreach ($listlaporan as $ll) : ?>
                                <tr>
                                    <td scope="col"><?= $no++ ?></td>
                                    <td scope="col"><?= $ll['tanggal'] ?></td>
                                    <td scope="col"><?= $ll['kategori'] ?></td>
                                    <td scope="col"><?= $ll['sub_kategori'] ?></td>
                                    <td scope="col"><?= $ll['isi_laporan'] ?></td>
                                    <td>
                                    <?php if ($ll['status'] == 'selesai') : ?>
                                       
                                       <button type="button" class="btn btn-success">
                                           Selesai
                                       </button>
                                  
                                   <?php elseif ($ll['status'] == 'proses') : ?>
                                       <a button type="button" class="btn btn-warning">
                                           Proses
                                       </a>
                                 
                                   <?php else : ?>
                                       <button type="button" class="btn btn-primary">
                                           Belum Proses
                                       </button>
                                   <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>