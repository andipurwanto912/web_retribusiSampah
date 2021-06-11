<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
		</div>
		<div class="section-body">
			<h2 class="section-title">Tabel Role</h2>
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<a href="" data-toggle="modal" class="btn btn-icon btn-primary" onclick="addMasy()"><i class="fas fa-plus"></i> Add Masyarakat</a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="">#</th>
											<th>Nik</th>
											<th>Nama Lengkap</th>
											<th>Alamat</th>
											<th>RT</th>
											<th>RW</th>
											<th>Kelurahan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>