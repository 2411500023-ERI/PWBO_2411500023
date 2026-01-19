<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0">Data Pengukuran</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pengukuran</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <?php if ($this->session->flashdata('message')): ?>
                        <?= $this->session->flashdata('message'); ?>
                    <?php endif; ?>

                    <a href="<?= base_url('pengukuran/tambah'); ?>" class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anak</th>
                                <th>Tgl Kunjungan</th>
                                <th>Tgl Ukur</th>
                                <th>Berat Badan</th>
                                <th>Tinggi Badan</th>
                                <th>Lingkar Kepala</th>
                                <th>Vaksin</th>
                                <th>Status Gizi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; foreach ($list_pengukuran as $ukur): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ukur['nama_anak']; ?></td>
                                    <td><?= $ukur['tgl_kunjungan']; ?></td>
                                    <td><?= $ukur['tgl_ukur']; ?></td>
                                    <td><?= $ukur['bb']; ?></td>
                                    <td><?= $ukur['tb']; ?></td>
                                    <td><?= $ukur['lk']; ?></td>
                                    <td><?= $ukur['vaksin']; ?></td>
                                    <td><?= $ukur['status_gizi']; ?></td>
                                    <td>
                                        <a href="<?= base_url('pengukuran/ubah/'.$ukur['id_ukur']); ?>" class="badge bg-success">
                                            Ubah
                                        </a>

                                        <a href="<?= base_url('pengukuran/hapus/'.$ukur['id_ukur']); ?>"
                                           class="badge bg-danger"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </a>

                                       <a href="<?= base_url('pengukuran/cetak/'.$ukur['id_ukur']); ?>" 
                                            class="badge bg-info">
                                             Cetak
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($list_pengukuran)): ?>
                                <tr>
                                    <td colspan="10" class="text-center">Data belum ada</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
