<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel Role Access</h2>
            <div class="row">
                <div class="col-6">
                    <!-- form validation error -->

                    <!-- validation success -->
                    <?= $this->session->flashdata('pesan'); ?>

                    <h5>Role : <?= $role['role']; ?></h5>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="">#</th>
                                            <th>Menu</th>
                                            <th>Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($menu as $m) : ?>
                                            <tr class="">
                                                <th scope=" row"><?= $i; ?></th>
                                                <td><?= $m['menu']; ?></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" <?= checkAccess($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-primary mr-1" type="" href="<?= base_url('admin/role') ?>">Back</a>
                            <!-- <button class="btn btn-secondary" type="" href=" <?= base_url('user') ?>""></button> -->
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