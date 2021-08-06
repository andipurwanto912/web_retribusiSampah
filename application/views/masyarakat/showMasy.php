<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

     <div class="section-body">
            <div class="card" style="max-width: 50%">
                <div class="card-header bg-primary text-white">
               <h5><?= $detail->nik; ?> </h5>
            </div>
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="chocolat-parent">
                                <a href="<?= base_url('assets/img/') . $detail->barcode; ?>" class="chocolat-image" <?= base_url('assets/img/') . $detail->barcode; ?>>
                                    <div data-crop-image="100%">
                                        <img alt="image" src="<?= base_url('assets/img/') . $detail->barcode; ?>" class="img-fluid img-thumbnail">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">Nama : <?= $detail->nama_lengkap;?></p>
                            <p class="card-text">Tempat Lahir : <?= $detail->tempat_lahir;?></p>
                            <p class="card-text">Tanggal Lahir : <?= $detail->tanggal_lahir;?></p>
                            <p class="card-text">Alamat : <?= $detail->alamat;?></p>
                            <p class="card-text">Kelurahan : <?= $detail->kelurahan;?></p>
                            <p class="card-text">Kecamatan : <?= $detail->kecamatan;?></p>
                            <p class="card-text">Seri : <?= $detail->seri;?></p>
		                	<div class="form-group">
                                <div class="text-right">
                                <a class="btn btn-danger left" type="" href="<?= base_url('masyarakat') ?>">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>