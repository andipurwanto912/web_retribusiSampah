<style>
	.line-title {
		border: 3px;
		border-style: inset;
		border-top: 1px solid #000;
		margin-top: 10px;
		margin-bottom: 10px;
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

	.header {
		display: flex;
		justify-content: space-between;
	}

</style>
<div class="header">
	<table width="100%">
		<tr>
			<td width="10%">
				<img alt="image" src="<?= base_url('assets/img/logo.png')?>" style="width: 75px; height: auto;">
			</td>
			<td style="text-align: center">
				<span
					style="line-height: 38px; font-weight: bold; font-size: xx-large; font-family: 'Times New Roman', Times, serif;">
					DINAS LINGKUNGAN HIDUP
					<br>KOTA TEGAL
				</span>
			</td>
			<td width="10%">
			</td>
		</tr>
	</table>
</div>

<div class="line-title"></div>

<div class="">
	<table width="100%">
		<tr>
			<p
				style="text-align:center; font-size: large; font-family: 'Times New Roman', Times, serif;">
				Data Pembayaran Berdasarkan Masyarakat Belum Bayar <br>
				Kecamatan Tegal Timur
			</p>
			<!-- <br /> -->
		</tr>
	</table>
</div>

<table class="table table-striped table-bordered table-hover" style="font-family: 'Times New Roman', Times, serif;">
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
		</tr>
	</thead>
	<tbody>
		<?php 
			$no = 1;
			$total = 0;
			foreach ($cetakPembayaran as $p) : ?>
		<tr class="">
			<td><?= $no++ ?></td>
			<td><?= $bulantahun ?></td>
			<td><?= $p->nik ?></td>
			<td><?= $p->nama_lengkap ?></td>
			<td><?= $p->alamat ?></td>
			<td><?= $p->kelurahan ?></td>
			<td><?= $p->seri ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
