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
                            <a href="" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#roleModal"><i class="fas fa-plus"></i> Add Masyarakat</a>
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