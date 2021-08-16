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
				Data Masyarakat Berdasarkan Seri<br>
				Kecamatan Tegal Timur
			</p>
			<!-- <br /> -->
		</tr>
	</table>
</div>

<table class="table table-striped table-bordered table-hover" style="font-family: 'Times New Roman', Times, serif;">
	<thead>
		<tr class="text-center">
			<th>No</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>RT/RW </th>
			<th>Kelurahan</th>
			<!-- <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th> -->
			<th>Seri</th>
			<!-- <th>Jumlah</th> -->
		</tr>
	</thead>
	<tbody>
		<?php 
        $no = 1;
            foreach ($cetakMasyarakat as $cm) : ?>
		<tr class="text-center">
			<td><?= $no++ ?></td>
			<td><?= $cm->nik ?></td>
			<td><?= $cm->nama_lengkap ?></td>
			<td><?= $cm->alamat ?></td>
			<td><?= $cm->rt ?>/<?= $cm->rw ?></td>
			<td><?= $cm->kelurahan ?></td>
			<td><?= $cm->seri ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<!-- tanggal-bulan-tahun dan tanda tangan cetak laporan -->
<!-- <div>
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
	<div style="float:right; margin-top: 10px; font-family: 'Times New Roman', Times, serif">
		Tegal, <?=tgl_indo(date('Y-m-d'));?>
		<br />Bendahara Penerima
		<br />
		<br />
		<br />
		<br />
		____________________
		<br />
		<?= $user['nama_lengkap'] ?>
	</div>
</div> -->
