<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0">Data Kunjungan</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kunjungan</li>
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

                    <a href="<?= base_url('kunjungan/tambah'); ?>" class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anak</th>
                                <th>Nama Ortu</th>
                                <th>Tgl Kunjungan</th>
                                <th>Fasilitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; foreach ($list_kunjungan as $kunjungan): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $kunjungan['nama_anak']; ?></td>
                                    <td>
                                        Ibu <?= $kunjungan['name_ibu']; ?>  
                                        Ayah <?= $kunjungan['name_ayah']; ?>
                                    </td>
                                    <td><?= $kunjungan['tgl_kunjungan']; ?></td>
                                    <td><?= $kunjungan['fasilitas']; ?></td>
                                    <td>
                                        <a href="<?= base_url('kunjungan/ubah/'.$kunjungan['id_kunjungan']); ?>" class="badge bg-success">
                                            Ubah
                                        </a>
                                        <a href="<?= base_url('kunjungan/hapus/'.$kunjungan['id_kunjungan']); ?>"
                                           class="badge bg-danger"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($list_kunjungan)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Data belum ada</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
