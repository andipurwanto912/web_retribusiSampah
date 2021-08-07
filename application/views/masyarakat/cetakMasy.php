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
			font-family: Arial, Helvetica, sans-serif;
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
				<span style="line-height: 38px; font-weight: bold; font-size: xx-large; font-family: 'Times New Roman', Times, serif;">
					DINAS LINGKUNGAN HIDUP
					<br>KOTA TEGAL
				</span>
			</td>
		</tr>
	</table>
    <hr class="line-title">
    <p align="center" style="font-family: 'Times New Roman', Times, serif; font-size: large;">
        Data Masyarakat Kota Tegal<br>
        Kecamatan Tegal Timur
    </p>
    <table class="table table-striped table-bordered table-hover" style="font-family: 'Times New Roman', Times, serif;">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>RT/RW   </th>
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
</body>
</html>
<script type="text/javascript">
	window.print();
</script>
