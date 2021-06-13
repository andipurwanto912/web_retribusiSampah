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
                    <?= form_error('nama_lengkap', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>
                    <?= form_error('alamat', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>
                    <?= form_error('kelurahan', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

                    <?= form_error('tempat_lahir', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

                    <?= form_error('tanggal_lahir', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

                    <?= form_error('kecamatan', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

                    <?= form_error('seri', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>
                    <?php foreach ($masyarakat as $mas) : ?>
                        <form action="<?= base_url('masyarakat/editMasyarakat'); ?>" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Edit Masyarakat</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="hidden" class="form-control" id="id_masy" name="id_masy" value="<?= $mas->id_masy ?>">
                                                <input type="number" readonly class="form-control" id="nik" name="nik" value="<?= $mas->nik ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Nama Masyarakat</label>
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $mas->nama_lengkap ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $mas->tempat_lahir ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $mas->tanggal_lahir ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mas->alamat ?>">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="">RT</label>
                                                    <input type="text" class="form-control" id="rt" name="rt" value="<?= $mas->rt ?>">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="rw">RW</label>
                                                    <input type="text" class="form-control" id="rw" name="rw" value="<?= $mas->rw ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Kelurahan</label>
                                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= $mas->kelurahan ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $mas->kecamatan ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Seri</label>
                                                <select class="form-control selectric" name="seri" id="seri">
                                                    <option selected><?= $mas->seri ?></option>
                                                    <?php foreach ($seri as $s) : ?>
                                                        <option value="<?= $s->seri ?>"><?= $s->seri ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <div class="text-right">
                                                    <button class="btn btn-primary" type="submit"><i class="fas fa-edit"></i> Simpan Perubahan</button>
                                                    <a class="btn btn-danger left" type="" href="<?= base_url('masyarakat') ?>">Back</a>
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