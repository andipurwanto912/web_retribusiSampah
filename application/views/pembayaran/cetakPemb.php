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

	</style>
</head>

<body>
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
        Laporan Pembayaran Retribusi<br>
    <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?= $bulan ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= $tahun ?></td>
        </tr>
    </p>
    <table class="table table-striped table-bordered table-hover" style="font-family: 'Times New Roman', Times, serif;">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Seri</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
            foreach ($cetakPembayaran as $p) : ?>
                <tr class="text-center">
                <td><?= $no++ ?></td>
                <td><?= $p->nik ?></td>
                <td><?= $p->nama_lengkap ?></td>
                <td><?= $p->seri ?></td>
                <td>Rp. <?= number_format($p->jml_bayar, 0, ',', '.') ?></td>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <table width="100%" style="font-family: 'Times New Roman', Times, serif;">
        <td></td>
        <td width="100px">
            <p>Tegal, <?= date('d M Y')?> <br><?= $user['nama_lengkap'] ?></p>
            <br>
            <br>
            <p>______________________</p>
        </td>
        
    </table>
</body>

</html>

<script type="text/javascript">
	window.print();
</script>
