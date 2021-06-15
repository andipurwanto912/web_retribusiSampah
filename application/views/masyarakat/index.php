<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel Masyarakat</h2>
            <div class="row">
                <div class="col">

                    <!-- form validation error -->
                    <?= form_error('nik', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>
                    <?= form_error('nama_lengkap', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

                    <!-- validation success -->
                    <?= $this->session->flashdata('pesan'); ?>

                    <div class="card">
                        <div class="card-header">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#masyModal"><i class="fas fa-plus"></i> Add Masyarakat</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="">#</th>
                                            <th>NIK</th>
                                            <th>Nama Masyarakat</th>
                                            <!-- <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th> -->
                                            <th>Alamat</th>
                                            <!-- <th>RT</th>
                                            <th>RW</th> -->
                                            <th>Kelurahan</th>
                                            <!-- <th>Kecamatan</th> -->
                                            <th>Seri</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($masyarakat as $m) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $m->nik ?></td>
                                                <td><?= $m->nama_lengkap ?></td>
                                                <td><?= $m->alamat ?></td>
                                                <!-- <td><?= $m->tempat_lahir ?></td>
                                                <td><?= $m->tanggal_lahir ?></td> -->
                                                <td><?= $m->kelurahan ?></td>
                                                <!-- <td><?= $m->rt ?></td>
                                                <td><?= $m->rw ?></td> -->
                                                <!-- <td><?= $m->kecamatan ?></td> -->
                                                <td><?= $m->seri ?></td>
                                                <td>
                                                    <a href="<?= base_url('masyarakat/editM/' . $m->id_masy) ?>">
                                                        <button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> </button>
                                                    </a>

                                                    <a href="<?= base_url('masyarakat/showM/' . $m->id_masy) ?>">
                                                        <button class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> </button>
                                                    </a>

                                                    <a href="<?= base_url('masyarakat/deleteMasy/' . $m->id_masy); ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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

<!-- Add Modal -->
<div class="modal fade" id="masyModal" tabindex="-1" role="dialog" aria-labelledby="masyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="masyModalLabel">Add Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('masyarakat'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Masyarakat</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">RT</label>
                            <input type="text" class="form-control" id="rt" name="rt" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control" id="rw" name="rw" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
                    </div>

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                    </div>

                    <div class="form-group">
                        <label>Seri</label>
                        <select class="form-control selectric" name="seri" id="seri" required>
                            <option selected>Pilih Seri</option>
                            <?php foreach ($seri as $s) : ?>
                                <option value="<?= $s->seri ?>"><?= $s->seri ?></option>
                            <?php endforeach; ?>
                        </select>
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