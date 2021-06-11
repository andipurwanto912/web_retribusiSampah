<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel Seri</h2>
            <div class="row">
                <div class="col">

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

                    <!-- validation success -->
                    <?= $this->session->flashdata('pesan'); ?>

                    <div class="card">
                        <div class="card-header">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#seriModal"><i class="fas fa-plus"></i> Add Seri</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="">#</th>
                                            <th>Seri</th>
                                            <th>Jenis Retribusi</th>
                                            <th>Jumlah Tagihan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($seri as $s) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $s->seri ?></td>
                                                <td><?= $s->jenis_retribusi ?></td>
                                                <td>Rp. <?= number_format($s->tagihan, 0, ',', '.') ?></td>
                                                <td>
                                                    <a href="<?= base_url('seri/edit/' . $s->id) ?>">
                                                        <button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> </button>
                                                    </a>
                                                    <a href="<?= base_url('seri/deleteSeri/' . $s->id); ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="seriModal" tabindex="-1" role="dialog" aria-labelledby="seriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="seriModalLabel">Add Seri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('seri'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Seri</label>
                        <input type="text" class="form-control" id="seri" name="seri" required>
                    </div>
                    <div class="form-group">
                        <label>jenis Retribusi</label>
                        <textarea class="form-control summernote-simple" id="jenis_retribusi" name="jenis_retribusi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tagihan</label>
                        <input type="number" class="form-control" id="tagihan" name="tagihan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>