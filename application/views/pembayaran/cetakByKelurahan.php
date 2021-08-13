	<!DOCTYPE html>
	<html>

	<head>
		<title><?= $title; ?></title>
		<!-- General CSS Files -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

		<style>
			.line-title {
				border: 3px;
				border-style: inset;
				border-top: 1px solid #000;
			}

			.table {
				font-family: Arial, Helvetica, sans-serif, 'Times New Roman', Times, serif;
				border-collapse: collapse;
				width: 100%;
			}

			.table td,
			.table th {
				border: 1px solid #ddd;
				padding: 8px;
			}

			.table tr:nth-child(even) {
				background-color: #f2f2f2;
			}

			.table tr:hover {
				background-color: #ddd;
			}

			.table th {
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: left;
				background-color: #04AA6D;
				color: white;
			}

		</style>
	</head>

	<body>
		<img alt="image" src="<?= base_url('assets/img/logo.png')?>"
			style="position: absolute; width: 75px; height: auto;">
		<table style="width: 100%;">
			<tr>
				<td align="center">
					<span
						style="line-height: 38px; font-weight: bold; font-size: xx-large; font-family: 'Times New Roman', Times, serif;">
						DINAS LINGKUNGAN HIDUP
						<br>KOTA TEGAL
					</span>
				</td>
			</tr>
		</table>
		<hr class="line-title">
		<p align="center" style="font-family: 'Times New Roman', Times, serif; font-size: large;">
			Data Pembayaran Retribusi Sampah Berdasarkan Kelurahan<br>
			Kecamatan Tegal Timur
		</p>
		<table class="table table-striped table-bordered table-hover"
			style="font-family: 'Times New Roman', Times, serif;">
			<thead>
				<tr class="">
					<th>No</th>
					<th>Bulan/Tahun</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Alamat</th>
					<!--<th>RT/RW</th>-->
					<th>Kelurahan</th>
					<th>Seri</th>
					<th>Jumlah Bayar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					$total = 0;
					foreach ($cetakPembayaran as $p) : $total += $p->jml_bayar?>
				<tr class="">
					<td><?= $no++ ?></td>
					<td><?= $p->bulan ?></td>
					<td><?= $p->nik ?></td>
					<td><?= $p->nama_lengkap ?></td>
					<td><?= $p->alamat ?></td>
					<!--<td><?= $p->rt ?>/<?= $p->rw ?></td>-->
					<td><?= $p->kelurahan ?></td>
					<td><?= $p->seri ?></td>
					<td style="">Rp. <?= number_format($p->jml_bayar, 0, ',', '.') ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="7" style="text-align: center; font-weight : bold">TOTAL</td>
					<td class="">Rp. <?= number_format($total, 0, '', '.') ?></td>
				</tr>
			</tfoot>
		</table>

		<!-- tanggal-bulan-tahun dan tanda tangan cetak laporan -->
		<div>
			<?php
				function tgl_indo($tanggal){
					$bulan = array (
						1 => 'Januari',
						'Februari',
						'Maret',
						'April',
						'Mei',
						'Juni',
						'Juli',
						'Agustus',
						'September',
						'Oktober',
						'November',
						'Desember'
					);
					$pecahkan = explode('-', $tanggal);		
					// variabel pecahkan 0 = tanggal
					// variabel pecahkan 1 = bulan
					// variabel pecahkan 2 = tahun				
					return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
				}
				?>
			<div style="float:right; font-family: 'Times New Roman', Times, serif">
				Tegal, <?=tgl_indo(date('Y-m-d'));?>
				<br />Bendahara Penerima
				<br />
				<br />
				<br />
				<br />
				____________________
				<p><?= $user['nama_lengkap'] ?></p>
			</div>
			<div style="clear:both"></div>
		</div>
	</body>

	</html>
