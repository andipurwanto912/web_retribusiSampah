<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <?= form_open_multipart('user/editProfile'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <?= $user['nama_lengkap']; ?>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $user['nama_lengkap']; ?>">
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label class="">Picture</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/profile/') . $user['photo']; ?>" alt="" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Edit</button>
                            <!-- <button class="btn btn-secondary" type="" href=" <?= base_url('user') ?>""></button> -->
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>