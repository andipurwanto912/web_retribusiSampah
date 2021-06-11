<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel Submenu</h2>
            <div class="row">
                <div class="col">

                    <!-- form validation error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <!-- validation success -->
                    <?= $this->session->flashdata('pesan'); ?>

                    <div class="card">
                        <div class="card-header">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#submenuModal"><i class="fas fa-plus"></i> Add Submenu</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="">#</th>
                                            <th>Title</th>
                                            <th>Menu</th>
                                            <th>Url</th>
                                            <th>Icon</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($subMenu as $sm) : ?>
                                            <tr class="">
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $sm['title']; ?></td>
                                                <td><?= $sm['menu']; ?></td>
                                                <td><?= $sm['url']; ?></td>
                                                <td><?= $sm['icon']; ?></td>
                                                <td><?= $sm['is_active']; ?></td>
                                                <td>
                                                    <!-- <a href="#">
                                                        <button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>
                                                            Edit </button>
                                                    </a> -->
                                                    <a href="<?= base_url('menu/hapusSubmenu/') ?><?= $sm['id']; ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="submenuModal" tabindex="-1" role="dialog" aria-labelledby="submenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submenuModalLabel">Add Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/subMenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="form-group">
                        <label>Menu</label>
                        <select class="form-control selectric" name="menu_id" id="menu_id">
                            <option selected>Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Url</label>
                        <input type="text" class="form-control" id="url" name="url">
                    </div>

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
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