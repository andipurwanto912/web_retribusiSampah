<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <!-- form validation error -->
                    <?= form_error('seri', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>
                    <?= form_error('jenis_retribusi', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>
                    <?= form_error('tagihan', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

                    <?php foreach ($seri as $s) : ?>
                        <form action="<?= base_url('seri/editSeri'); ?>" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Edit Seri</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Seri</label>
                                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $s->id ?>">
                                                <input type="text" readonly class="form-control" id="seri" name="seri" value="<?= $s->seri ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>jenis Retribusi</label>
                                                <textarea class="form-control summernote-simple" id="jenis_retribusi" name="jenis_retribusi" value="<?= htmlspecialchars($s->jenis_retribusi) ?>"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Tagihan</label>
                                                <input type="number" class="form-control" id="tagihan" name="tagihan" value="<?= $s->tagihan ?>">
                                            </div>
                                            <div class="form-group">
                                                <div class="text-right">
                                                    <button class="btn btn-primary" type="submit"><i class="fas fa-edit"></i> Simpan Perubahan</button>
                                                    <a class="btn btn-danger left" type="" href="<?= base_url('seri') ?>">Back</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>