<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
		</div>
		<class="section-body">
			<h2 class="section-title">Tabel Data Pembayaran Masyarakat</h2>
			<div class="card mx-auto">
				<div class="card-header bg-primary text-white ">
					Filter Laporan Data Pembayaran Belum Bayar
				</div>
				<div class="card-body">
					<form class="form-inline">
						<div class="form-group mx-sm-3 mb-2">
							<label>Bulan: </label>
							<select class="form-control selectric" name="bulan" id="bulan">
								<option selected value="">Pilih Bulan</option>
								<option selected value="01">Januari</option>
								<option selected value="02">Februari</option>
								<option selected value="03">Maret</option>
								<option selected value="04">April</option>
								<option selected value="05">Mei</option>
								<option selected value="06">Juni</option>
								<option selected value="07">Juli</option>
								<option selected value="08">Agustus</option>
								<option selected value="09">September</option>
								<option selected value="10">Oktober</option>
								<option selected value="11">November</option>
								<option selected value="12">Desember</option>
							</select>
						</div>
						<div class="form-group mx-sm-3 mb-2 ml-5">
							<label>Tahun: </label>
							<select class="form-control selectric" name="tahun" id="tahun">
								<option selected>Pilih Tahun</option>
								<?php $tahun = date('Y');
                                for ($i = 2021; $i < $tahun + 10; $i++) { ?>
								<option selected value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php } ?>
							</select>
						</div>
						<?php 
                         if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                                $bulan = $_GET['bulan'];
                                $tahun = $_GET['tahun'];
                                $bulantahun = $bulan . $tahun;
                            } else {
                                $bulan = date('m');
                                $tahun = date('Y');
                                $bulantahun = $bulan . $tahun;
                            }
                        ?>
						<button type="submit" class="btn btn-info mb-2 ml-auto"><i class="fas fa-eye"></i> Show
							Data</button>
							<a href="<?=('pembayaran/printLaporanByBelum?bulan='.$bulan),'&tahun='.$tahun?>"
							class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i> Cetak Data Masyarakat Belum Bayar</a>
					</form>
				</div>
			</div>

			<?php
            if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan . $tahun;
            } else {
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan . $tahun;
            }
            ?>

			<div class="alert alert-info">
				Menampilkan Data Masyarakat Belum Bayar pada Bulan: <span class="font-weight-bold"><?= $bulan ?></span> Tahun:
				<span class="font-weight-bold"><?= $tahun ?> </span>
			</div>

			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover" id="table-1">
							<thead>
								<tr>
									<th class="">#</th>
									<th>BulanTahun</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Seri</th>
									<th>Jumlah</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
                                    foreach ($cetakPembayaran as $p) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $bulantahun ?></td>
									<td><?= $p->nik ?></td>
									<td><?= $p->nama_lengkap ?></td>
									<td><?= $p->seri ?></td>
									<td><?= $p->kelurahan ?></td>
									<td>
									<span class="badge bg-warning text-dark">Belum Bayar</span>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header bg-primary text-white">
					Filter Data Pembayaran
				</div>
				<div class="card-body">
					<form class="form-inline">
						<div class="form-group mx-sm-3 mb-2">
							<label>Bulan: </label>
							<select class="form-control selectric" name="bulan" id="bulan">
								<option selected value="">Pilih Bulan</option>
								<option selected value="01">Januari</option>
								<option selected value="02">Februari</option>
								<option selected value="03">Maret</option>
								<option selected value="04">April</option>
								<option selected value="05">Mei</option>
								<option selected value="06">Juni</option>
								<option selected value="07">Juli</option>
								<option selected value="08">Agustus</option>
								<option selected value="09">September</option>
								<option selected value="10">Oktober</option>
								<option selected value="11">November</option>
								<option selected value="12">Desember</option>
							</select>
						</div>
						<div class="form-group mx-sm-3 mb-2 ml-5">
							<label>Tahun: </label>
							<select class="form-control selectric" name="tahun" id="tahun">
								<option selected>Pilih Tahun</option>
								<?php $tahun = date('Y');
                                for ($i = 2021; $i < $tahun + 10; $i++) { ?>
								<option selected value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php } ?>
							</select>
						</div>

						<?php 
                         if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                                $bulan = $_GET['bulan'];
                                $tahun = $_GET['tahun'];
                                $bulantahun = $bulan . $tahun;
                            } else {
                                $bulan = date('m');
                                $tahun = date('Y');
                                $bulantahun = $bulan . $tahun;
                            }
                        ?>

						<button type="submit" class="btn btn-info mb-2 ml-auto"><i class="fas fa-eye"></i> Show
							Data</button>

						<?php if (count($pembayaran)>0){ ?>
						<a href="<?=('pembayaran/cetakPembayaran?bulan='.$bulan),'&tahun='.$tahun?>"
							class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i> Cetak Data Pembayaran</a>
						<?php }else{ ?>
						<button type="button" class="btn btn-success mb-2 ml-3" data-toggle="modal"
							data-target="#exampleModal">
							<i class="fas fa-print"></i> Cetak Data Pembayaran</button>
						<?php } ?>
					</form>
				</div>
			</div>

			<!-- data masyarakat yang sudah melakukan pembayaran -->
			<?php
            if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan . $tahun;
            } else {
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan . $tahun;
            }
            ?>

			<div class="alert alert-info">
				Menampilkan Data Pembayaran dari Masyarakat pada Bulan: <span class="font-weight-bold"><?= $bulan ?></span> Tahun:
				<span class="font-weight-bold"><?= $tahun ?> </span>
			</div>

			<?php
            $jlm_data = count($pembayaran);
            if ($jlm_data > 0) { ?>

			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover" id="table-2">
							<thead>
								<tr>
									<th class="">#</th>
									<th>BulanTahun</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Seri</th>
									<th>Jumlah</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
                                    foreach ($pembayaran as $p) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $bulantahun ?></td>
									<td><?= $p->nik ?></td>
									<td><?= $p->nama_lengkap ?></td>
									<td><?= $p->seri ?></td>
									<td>Rp. <?= number_format($p->jml_bayar, 0, ',', '.') ?></td>
									<td>
										<a href="<?= base_url('pembayaran/deletePemb/' . $p->id_transaksi); ?>"
											onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
											<button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
										</a>

										<a href="<?= base_url('pembayaran/showTransaksi/' . $p->id_transaksi) ?>">
											<button class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> </button>
										</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php
                    } else { ?>
						<span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data Kosong atau tidak
							ditemukan pada
							Bulan: <span class="font-weight-bold"><?= $bulan ?> Tahun: <span
									class="font-weight-bold"><?= $tahun ?></span>
								<?php
                            } ?>
					</div>
				</div>
			</div>
	</section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Data pembayaran masih kosong, coba cek kembali bulan dan tahun yang anda pilih!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
