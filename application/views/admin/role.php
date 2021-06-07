<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel Role</h2>
            <div class="row">
                <div class="col-6">

                    <!-- form validation error -->
                    <?= form_error('menu', '<div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>', '</div>');
                    ?>

                    <!-- validation success -->
                    <?= $this->session->flashdata('pesan'); ?>

                    <div class="card">
                        <!-- <div class="card-header">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#roleModal"><i class="fas fa-plus"></i> Add Role</a>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="">#</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($role as $r) : ?>
                                            <tr class="">
                                                <th scope=" row"><?= $i; ?></th>
                                                <td><?= $r['role']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>">
                                                        <button class="btn btn-warning btn-sm"> <i class="fas fa-universal-access"></i>Access</button>
                                                    </a>
                                                    <!-- <a href="#">
                                                        <button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>Edit</button>
                                                    </a>
                                                    <a href="#" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>Hapus</button>
                                                    </a> -->
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
<!-- <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Add Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Role</label>
                        <input type="text" class="form-control form-control-sm" id="role" name="role">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div> -->