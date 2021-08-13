<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
		</div>
		<div class="section-body">
			<h2 class="section-title">Tabel Users</h2>
			<div class="row">
				<div class="col">
					<?= form_error('email', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

					<?= form_error('password', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

					<?= form_error('role_id', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>
                    
					<?= form_error('no_hp', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

					<!-- validation success -->
					<?= $this->session->flashdata('pesan'); ?>

					<div class="card">
						<div class="card-header">
							<a href="" class="btn btn-primary" data-toggle="modal" data-target="#userModal"><i
									class="fas fa-plus"></i> Add Users</a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-hover" id="table-1">
									<thead>
										<tr class="text-center">
											<th class="">#</th>
											<th>Nama</th>
											<th>Email</th>
											<th>No HP</th>
											<th>Photo</th>
											<th>Role</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
                                        foreach ($users as $u) : ?>
										<tr class="text-center">
											<td><?= $no++ ?></td>
											<td><?= $u->nama_lengkap ?></td>
											<td><?= $u->email ?></td>
											<td><?= $u->no_hp ?></td>
											<td><img style="width: 50px;"
													src="<?= base_url('assets/img/profile/'.$u->photo)?>"></td>
											<td><?= $u->role_id ?></td>
											<td>
												<!-- <a href="<?= base_url('auth/editUser/' . $u->id_user) ?>">
													<button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>
													</button>
												</a> -->

												<a href="<?= base_url('auth/deleteUsers/' . $u->id_user); ?>"
													onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
													<button class="btn btn-danger btn-sm"> <i
															class="fa fa-trash"></i></button>
												</a>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>

<!-- Add Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="userModalLabel">Add Users</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('auth/registration'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Nama</label>
						<input id="name" type="text" class="form-control" name="name">
						<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="email">email</label>
						<input id="email" type="email" class="form-control" name="email">
						<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="no_hp">No Hp</label>
						<input id="no_hp" onkeypress="return hanyaAngka(event)" type="type" class="form-control"
							name="no_hp">
						<?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label class="d-block">Pilih Role</label>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="role_id" id="role_id" value="1"
								checked="">
							<label class="form-check-label" for="role_id">
								1
							</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="role_id" id="role_id" value="2"
								checked="">
							<label class="form-check-label" for="role_id">
								2
							</label>
						</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
								1 = Admin, 2 = User
							</small>
					</div>

					<div class="row">
						<div class="form-group col-6">
							<label for="password" class="d-block">Password</label>
							<input id="password"
								pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
								type="password" class="form-control pwstrength" data-indicator="pwindicator"
								name="password">
							<input type="checkbox" style="margin-top: 10px;" onclick="myFunction()"> Lihat Password

							<small id="passwordHelpBlock" class="form-text text-muted">
								min. 8 character, huruf Besar, Kecil dan Angka
							</small>
							<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group col-6">
							<label for="password2" class="d-block">Password Confirmation</label>
							<input id="password2"
								pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
								type="password" class="form-control" name="password2">
							<!-- <input type="checkbox" style="margin-top: 10px;" onclick="myFunction()"> Lihat Password -->
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
