<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register AdMas</title>
        <link href="<?= base_url('asset/admin/css/styles.css') ?>" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">AdMas</h3></div>
                                    <div class="card-body">
                                    <form action="<?= base_url('C_Auth/register') ?>" method="post">
                                <div class="modal-body row">
                                    <div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username">
                                            <small class="text-danger"><?= form_error ('username'); ?></small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama">
                                            <small class="text-danger"><?= form_error ('nama'); ?></small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">NIK</label>
                                            <input type="number" class="form-control" id="nik" name="nik">
                                            <small class="text-danger"><?= form_error ('nik'); ?></small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Telepon</label>
                                            <input type="text" class="form-control" id="telepon" name="telepon">
                                            <small class="text-danger"><?= form_error ('telepon'); ?></small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password1" name="password1">
                                            <small class="text-danger"><?= form_error ('password1'); ?></small>
                                        </div class="mb-3">
                                            <label for="password2" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control mb-3" id="password2" name="password2">
                                            <small class="text-danger"><?= form_error ('password2'); ?></small>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark">Register</button>
                                </div>
                            </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('C_View/login')?>">Have an account already?</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
