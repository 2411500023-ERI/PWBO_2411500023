<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0">Data Transaksi</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
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

                    <a href="<?= base_url('transaksi/tambah'); ?>" class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Tambah Transaksi
                    </a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Kunjungan</th>
                                <th>Tgl Kunjungan</th>
                                <th>Fasilitas</th>
                                <th>Tgl Transaksi</th>
                                <th>Jenis Transaksi</th>
                                <th>Total Biaya</th>
                                <th>Keterangan</th>
                                <th>Aksi</th> 
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; foreach ($list_transaksi as $t): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $t['kunjungan_id']; ?></td>
                                    <td><?= $t['tgl_kunjungan']; ?></td>
                                    <td><?= $t['fasilitas']; ?></td>
                                    <td><?= $t['tgl_transaksi']; ?></td>
                                    <td><?= $t['jenis_transaksi']; ?></td>
                                    <td>Rp <?= number_format($t['total_biaya'], 0, ',', '.'); ?></td>
                                    <td><?= $t['keterangan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('transaksi/ubah/'.$t['id_transaksi']); ?>" 
                                           class="badge bg-success">Ubah</a>

                                        <a href="<?= base_url('transaksi/hapus/'.$t['id_transaksi']); ?>" 
                                           class="badge bg-danger"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($list_transaksi)): ?>
                                <tr>
                                    <td colspan="9" class="text-center">Data transaksi belum ada</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
