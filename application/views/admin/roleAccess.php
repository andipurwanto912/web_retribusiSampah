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