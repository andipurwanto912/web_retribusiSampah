<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
		</div>
		<div class="section-body">
			<div class="card mx-auto" style="max-width: 50%">
				<div class="card-header bg-primary text-white ">
					Filter Laporan Data Pembayaran
				</div>
				<div class="card-body">
					<form class="form-inline" method="POST" action="<?= base_url('pembayaran/printLaporanByKelurahan') ?>">
						<div class="form-group mx-sm-3 mb-2">
							<label>Kelurahan: </label>
							<select class="form-control selectric" name="kelurahan" id="kelurahan">
								<option selected value="">Pilih Kelurahan</option>
								<option value="Kejambon">Kejambon</option>
								<option value="Mangkukusuman">Mangkukusuman</option>
								<option value="Mintaragen">Mintaragen</option>
								<option value="Panggung">Panggung</option>
								<option value="Slerok">Slerok</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success mb-2 ml-auto"><i class="fas fa-print"></i> Cetak Data</button>
					</form>
				</div>
			</div>
			<div class="card mx-auto" style="max-width: 50%">
				<div class="card-header bg-primary text-white text-center">
				Filter Laporan Data Pembayaran
				</div>
				<div class="card-body">
					<form class="form-inline">
						<div class="form-group mx-sm-3 mb-2">
							<label>Seri: </label>
							<select class="form-control selectric" name="bulan" id="bulan">
								<option selected value="">Pilih Seri</option>
								<?php foreach ($seri as $s) : ?>
								<option value="<?= $s->seri ?>"><?= $s->seri ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<a href ="#" class="btn btn-success mb-2 ml-auto"><i class="fas fa-print"></i> Cetak Data</a>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
