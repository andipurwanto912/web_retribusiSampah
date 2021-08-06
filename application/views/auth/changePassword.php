<div id="app">
	<section class="section">
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
					<div class="login-brand">
						<img src="<?= base_url('assets') ?>/img/stisla-fill.svg" alt="logo" width="100"
							class="shadow-light rounded-circle">
					</div>
					<?= $this->session->flashdata('pesan'); ?>
					<div class="card card-primary">
						<div class="card-header">
							<h4>Change Password</h4>
						</div>
						<div class="card-body">
							<p class="text-muted"><?= $this->session->userdata('reset_email'); ?></p>
							<form method="POST" class="user" action="<?= base_url('auth/changePassword') ?>">

								<div class="form-group">
									<label for="password">New Password</label>
									<input pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
										id="password1" type="password" class="form-control pwstrength"
										data-indicator="pwindicator" name="password1" tabindex="2" required>
									<small id="passwordHelpBlock" class="form-text text-muted">
										min 8 karakter, Huruf Besar, Kecil dan Angka
									</small>
									<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
								</div>

								<div class="form-group">
									<label for="password2">Confirm Password</label>
									<input pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
										id="password2" type="password" class="form-control" name="password2"
										tabindex="2" required>
								</div>
								<small id="passwordHelpBlock" class="form-text text-muted">
									min 8 karakter, Huruf Besar, Kecil dan Angka
								</small>
								<?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
										Change Password
									</button>
								</div>
							</form>
							<div class="mt-5 text-muted text-center">
								<a href="<?= base_url(); ?>auth">&larr;Back Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
