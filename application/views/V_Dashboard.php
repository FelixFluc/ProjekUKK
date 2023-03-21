<div class="container-fluid px-4">
    <div class="card col-md-5 mt-4">
        <h5 class="card-header">User Info</h5>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Nama </td>
                    <td><?= $user['nama'] ?></td>
                </tr>
                <tr>
                    <td>Username </td>
                    <td><?= $user['username'] ?></td>
                </tr>
                <tr>
                    <td>Telepon </td>
                    <td><?= $user['telepon'] ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>