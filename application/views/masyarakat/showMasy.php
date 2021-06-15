<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <?= $detail->nik ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $detail->nama_lengkap ?></h5>
                            <p class="card-text"><?= $detail->tempat_lahir ?>, <?= $detail->tanggal_lahir ?></p>
                            <p class="card-text"><?= $detail->alamat ?>, RT <?= $detail->rt ?>, RW <?= $detail->rw ?>, <?= $detail->kelurahan ?>, <?= $detail->kecamatan ?>,</p>
                            <h3>
                                <p class="card-text"><?= $detail->seri ?></p>
                            </h3>

                            <div class="form-group">
                                <div class="text-right">
                                    <!-- <button class="btn btn-primary" type="submit"><i class="fas fa-edit"></i> Simpan Perubahan</button> -->
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