<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
		</div>
		<div class="section-body">
			<div class="row">

				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-primary">
							<i class="fas fa-users"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Users</h4>
							</div>
							<div class="card-body">
								<?= $userdata ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-danger">
							<i class="fab fa-stripe-s"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Seri</h4>
							</div>
							<div class="card-body">
								<?= $seri ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-warning">
							<i class="fas fa-id-card"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Warga</h4>
							</div>
							<div class="card-body">
								<?= $masyarakat ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-success">
							<i class="fas fa-money-check-alt"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Pendapatan</h4>
							</div>
							<div class="card-body">
								Rp. <?= number_format($sum,0, ',', '.') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<h4 class="card-header  bg-primary text-white">Tentang!</h4>
				<div class="card-body">
					<h5 class="card-title">Dinas Lingkungan Hidup Kota Tegal</h5>
					<p class="card-text">Dinas Lingkungan Hidup (DLH) selaku perangkat daerah salah satunya bertugas sebagai
						pengelolaan sampah yang bertugas untuk memaksimalkan sumber daya dan fasilitas kota dalam menjaga dan
						memelihara kebersihan kota dan mengelola sampah dengan maksimal.
						Mengenai perhitungan iuran retribusi sampah dilakukan beberapa kategori, diantaranya iuran dapat dilakukan
						setiap bulan dan setiap tahun. Untuk mempermudah sistem pembayaran dan mempermudah pengguna sehingga ada
						kategori masing masing dalam pembayaran iuran retribusi sampah tersebut.
					</p>
					<a href="https://dlh.tegalkota.go.id/v2/" class="btn btn-primary">Website Resmi DLH Kota Tegal</a>
				</div>
			</div>
		</div>
</div>
</section>
</div>
