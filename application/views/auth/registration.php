<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-6 offset-md-2 col-lg-6 offset-lg-2 col-xl-6 offset-xl-2 mx-auto">
                    <div class="login-brand">
                        <img src="<?= base_url(''); ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('auth/registration') ?>">
                                <div class="form-group">
                                    <label for="email">Nama Lengkap</label>
                                    <input id="name" type="text" class="form-control" name="name" value="<?= set_value('name') ?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                            <div class="mt-5 text-muted text-center">
                                Already have an account? <a href="<?= base_url(); ?>auth">Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; TA Politeknik Harapan Bersama <?= date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>