<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <h1 class="m-0">Laporan Pengukuran</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard'); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Laporan Pengukuran</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">

        <div class="card">

            <div class="card-body">
                <form method="get" action="<?= base_url('laporan/pengukuran'); ?>">
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

                            <?php if (!empty($list_pengukuran)): ?>
                                <a href="<?= base_url(
                                    'laporan/pengukuran/download_pdf'
                                    .'?tgl_awal='.$this->input->get('tgl_awal')
                                    .'&tgl_akhir='.$this->input->get('tgl_akhir')
                                ); ?>"
                                   class="btn btn-danger ml-2" target="_blank">
                                    <i class="fa fa-print"></i> Cetak
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>
                </form>
            </div>

            
            <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anak</th>
                            <th>Tgl Kunjungan</th>
                            <th>Tgl Ukur</th>
                            <th>BB</th>
                            <th>TB</th>
                            <th>LK</th>
                            <th>Status Gizi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if (!empty($list_pengukuran)): ?>
                        <?php $no = 1; foreach ($list_pengukuran as $ukur): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $ukur['nama_anak']; ?></td>
                                <td><?= $ukur['tgl_kunjungan']; ?></td>
                                <td><?= $ukur['tgl_ukur']; ?></td>
                                <td><?= $ukur['bb']; ?></td>
                                <td><?= $ukur['tb']; ?></td>
                                <td><?= $ukur['lk']; ?></td>
                                <td><?= $ukur['status_gizi']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>

                </table>
            </div>

        </div>

    </div>
</div>
```

</div>
