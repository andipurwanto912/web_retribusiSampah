<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <?= $this->session->flashdata('pesan'); ?>
                    <form action="<?= base_url('user/changePassword'); ?>" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <?= $user['nama_lengkap']; ?>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="currentPassword">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                                    <?= form_error('currentPassword', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="newPassword1">New Password</label>
                                    <input type="password" class="form-control" id="newPassword1" name="newPassword1">
                                    <?= form_error('newPassword1', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="newPassword2">Repeat Password</label>
                                    <input type="password" class="form-control" id="newPassword2" name="newPassword2">
                                    <?= form_error('newPassword2', '<small class="text-danger">', '</small>'); ?>

                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit"> <i class="fas fa-key"></i> Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>