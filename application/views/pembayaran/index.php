<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <class="section-body">
            <h2 class="section-title">Tabel Data Pembayaran</h2>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Filter Data Pembayaran
                </div>
                <div class="card-body">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label>Bulan: </label>
                            <select class="form-control selectric" name="bulan" id="bulan">
                                <option selected value="">Pilih Bulan</option>
                                <option selected value="01">Januari</option>
                                <option selected value="02">Februari</option>
                                <option selected value="03">Maret</option>
                                <option selected value="04">April</option>
                                <option selected value="05">Mei</option>
                                <option selected value="06">Juni</option>
                                <option selected value="07">Juli</option>
                                <option selected value="08">Agustus</option>
                                <option selected value="09">September</option>
                                <option selected value="10">Oktober</option>
                                <option selected value="11">November</option>
                                <option selected value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3 mb-2 ml-5">
                            <label>Tahun: </label>
                            <select class="form-control selectric" name="tahun" id="tahun">
                                <option selected>Pilih Tahun</option>
                                <?php $tahun = date('Y');
                                for ($i = 2020; $i < $tahun + 10; $i++) { ?>
                                    <option selected value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info mb-2 ml-auto"><i class="fas fa-eye"></i> Show Data</button>
                        <a href="" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i> Input Pembayaran</a>
                    </form>
                </div>
            </div>

            <?php
            if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan . $tahun;
            } else {
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan . $tahun;
            }
            ?>

            <div class="alert alert-info">
                Menampilakan Data Pembayaran pada Bulan: <span class="font-weight-bold"><?= $bulan ?></span> Tahun: <span class="font-weight-bold"><?= $tahun ?> </span>
            </div>

            <?php
            $jlm_data = count($pembayaran);
            if ($jlm_data > 0) { ?>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="">#</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Seri</th>
                                        <th>Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pembayaran as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p->nik ?></td>
                                            <td><?= $p->nama_lengkap ?></td>
                                            <td><?= $p->seri ?></td>
                                            <td>Rp. <?= number_format($p->jml_bayar, 0, ',', '.') ?></td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> </button>
                                                </a>

                                                <a href="#">
                                                    <button class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> </button>
                                                </a>

                                                <a href="#" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php
                    } else { ?>
                            <span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data Kosong atau tidak ditemukan pada Bulan: <span class="font-weight-bold"><?= $bulan ?> Tahun: <span class="font-weight-bold"><?= $tahun ?></span>
                                <?php
                            } ?>
                        </div>
                    </div>
                </div>
    </section>
</div>