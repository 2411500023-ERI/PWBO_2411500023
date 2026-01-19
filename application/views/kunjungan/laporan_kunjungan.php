<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Kunjungan</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Kunjungan</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">

                <!-- Filter -->
                <div class="card-body">
                    <form method="get" action="<?= base_url('laporan_kunjungan'); ?>">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label>Dari Tanggal</label>
                                <input type="date" name="tgl_awal" class="form-control"
                                       value="<?= $this->input->get('tgl_awal'); ?>">
                            </div>

                            <div class="col-md-4">
                                <label>Sampai Tanggal</label>
                                <input type="date" name="tgl_akhir" class="form-control"
                                       value="<?= $this->input->get('tgl_akhir'); ?>">
                            </div>

                            <div class="col-md-4 d-flex align-items-end">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i> Filter
                                </button>

                                <?php if (!empty($list_kunjungan)): ?>
                                    <a href="<?= base_url('laporan_kunjungan/download_pdf?tgl_awal='.$this->input->get('tgl_awal').'&tgl_akhir='.$this->input->get('tgl_akhir')); ?>"
   class="btn btn-danger ml-2" target="_blank">
    <i class="fa fa-print"></i> Cetak
</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Table -->
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anak</th>
                                <th>Nama Ortu</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Fasilitas</th>
                            </tr>
                        </thead>

                       <tbody>
<?php if (!empty($list_kunjungan)): ?>
    <?php $no = 1; foreach ($list_kunjungan as $kunjungan): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $kunjungan['nama_anak']; ?></td>
            <td>
                Ibu <?= $kunjungan['name_ibu']; ?><br>
                Ayah <?= $kunjungan['name_ayah']; ?>
            </td>
            <td><?= $kunjungan['tgl_kunjungan']; ?></td>
            <td><?= $kunjungan['fasilitas']; ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="5" class="text-center">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>
</tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>

</div>
