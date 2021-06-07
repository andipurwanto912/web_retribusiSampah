<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel Role</h2>
            <div class="row">
                <div class="col">

                    <!-- form validation error -->
                    <!-- <?= form_error('menu', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                            ?> -->

                    <!-- validation success -->
                    <!-- <?= $this->session->flashdata('pesan'); ?> -->

                    <div class="card">
                        <div class="card-header">
                            <a href="" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#masyModal"><i class="fas fa-plus"></i> Add Masyarakat</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="">#</th>
                                            <th>Nik</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Kelurahan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($masyarakat as $m) : ?>
                                            <tr class="">
                                                <th scope=" row"><?= $i; ?></th>
                                                <td><?= $m['nik']; ?></td>
                                                <td><?= $m['nama_lengkap']; ?></td>
                                                <td><?= $m['alamat']; ?></td>
                                                <td><?= $m['rt']; ?></td>
                                                <td><?= $m['rw']; ?></td>
                                                <td><?= $m['kelurahan']; ?></td>
                                                <td>
                                                    <a href="#">
                                                        <button class="btn btn-icon btn-info btn-sm"> <i class="fas fa-info"></i>Detail</button>
                                                    </a>
                                                    <a href="#">
                                                        <button class="btn btn-icon btn-success btn-sm"> <i class="fa fa-edit"></i>Edit</button>
                                                    </a>
                                                    <a href="#" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <button class="btn btn-icon btn-danger btn-sm"> <i class="fa fa-trash"></i>Hapus</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
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
<div class="modal fade" id="masyModal" tabindex="-1" role="dialog" aria-labelledby="masyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Add Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('masyarakat/addMasy'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Masyarakat</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" requireds>
                    </div>

                    <div class="form-group ">
                        <label for="kecamatan">Kecamatan</label>
                        <select id="kecamatan" name="kecamatan" class="form-control">
                            <option selected>Pilih Kecamatan</option>
                            <option>Tegal Barat</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="keluarahan">Kelurahan</label>
                            <select id="kelurahan" name="kelurahan" class="form-control">
                                <option selected>Pilih Kelurahan</option>
                                <option>Debong Lor</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="rw">RT</label>
                            <input type="text" class="form-control" id="rt" name="rt">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control" name="rw" id="rw">
                        </div>
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