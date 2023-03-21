<div class="container-fluid px-4">
    <div class="card mt-5">
        <h5 class="card-header bg-secondary" style="color:white;">
            Reset Password
        </h5>
        <div class="card-body">
            <form method="post" action="<?= base_url('C_Auth/resetPassword')?>" >
            <?= $this->session->flashdata('message5'); ?>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <small class="text-danger"><?= form_error('password1'); ?></small>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <small class="text-danger"><?= form_error('password2'); ?></small>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>