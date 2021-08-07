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
	<img alt="image" src="<?= base_url('assets/img/logo.png')?>" style="position: absolute; width: 75px; height: auto;">
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
		Data Masyarakat Berdasarkan Kelurahan<br>
        <!-- <?= $cetakPembayaran['kelurahan'] ?><br> -->
		Kecamatan Tegal Timur
    </p>
	<table class="table table-striped table-bordered table-hover" style="font-family: 'Times New Roman', Times, serif;">
		<thead>
			<tr class="">
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>RT/RW</th>
				<th>Kelurahan</th>
				<th>Seri</th>
			</tr>
		</thead>
		<tbody>
			<?php 
                $no = 1;
                foreach ($cetakMasyarakat as $m) :?>

			<tr class="">
				<td><?= $no++ ?></td>
				<td><?= $m->nik ?></td>
				<td><?= $m->nama_lengkap ?></td>
				<td><?= $m->alamat ?></td>
				<td><?= $m->rt ?>/<?= $m->rw ?></td>
				<td><?= $m->kelurahan ?></td>
				<td><?= $m->seri ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<!-- <div style="float: right">
		<p>Tegal, <?= date('d M Y')?> <br><?= $user['nama_lengkap'] ?></p>
		<br>
        <br>
		<p>______________________</p>
	</div> -->
</body>

</html>
