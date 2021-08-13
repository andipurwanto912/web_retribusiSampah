<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="row">
            <div class="col-6">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        </div>

        <div class="section-body">
            <div class="card mb-3" style="max-width: 50%">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="chocolat-parent">
                                <a href="<?= base_url('assets/img/profile/') . $user['photo']; ?>" class="chocolat-image" <?= base_url('assets/img/profile/') . $user['photo']; ?>>
                                    <div data-crop-image="100%">
                                        <img alt="image" src="<?= base_url('assets/img/profile/') . $user['photo']; ?>" class="img-fluid img-thumbnail">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama_lengkap']; ?></h5>
                            <p class="card-text"><?= $user['email']; ?></p>
                            <p class="card-text"><?= $user['no_hp']; ?></p>

                            <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>