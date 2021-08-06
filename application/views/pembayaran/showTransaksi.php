<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="card" style="max-width: 50%;">
            <div class="card-header bg-primary text-white">
               <h5> BulanTahun : <?= $detailTransaksi->bulan; ?> </h5>
            </div>
             <div class="card-body">
                <h5 class="card-title">NIK : <?= $detailTransaksi->nik; ?></h5>
                <p class="card-text">Nama : <?= $detailTransaksi->nama_lengkap;?></p>
                <p class="card-text">Alamat : <?= $detailTransaksi->alamat;?></p>
                <p class="card-text">Kelurahan : <?= $detailTransaksi->kelurahan;?></p>
                <p class="card-text">Kecamatan : <?= $detailTransaksi->kecamatan;?></p>
                <p class="card-text">Seri : <?= $detailTransaksi->seri;?></p>
                <p class="card-text">Jumlah Bayar : Rp. <?= number_format($detailTransaksi->jml_bayar, 0, ',', '.') ?></p>
		           	<div class="form-group">
                        <div class="text-right">
                <!-- <button class="btn btn-primary" type="submit"><i class="fas fa-edit"></i> Simpan Perubahan</button> -->
                    <a class="btn btn-danger left" type="" href="<?= base_url('pembayaran') ?>">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>