<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Data Pengukuran</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('pengukuran') ?>">Pengukuran</a>
                        </li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <form action="<?= base_url('pengukuran/ubah/'.$ukur['id_ukur'] ?? '') ?>" method="post">

                       
                        <div class="mb-3">
                            <label class="form-label">Nama Anak & Tgl Kunjungan</label>
                            <select name="kunjungan_id" class="form-control" required>
                                <option value="">-- Pilih Anak & Kunjungan --</option>
                                <?php foreach($list_kunjungan as $k): ?>
                                    <option value="<?= $k['id_kunjungan']; ?>"
                                        <?= ($ukur['kunjungan_id'] ?? '') == $k['id_kunjungan'] ? 'selected' : '' ?>>
                                        <?= $k['nama_anak'] ?> | <?= $k['tgl_kunjungan'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Ukur</label>
                            <input type="date"
                                   name="tgl_ukur"
                                   class="form-control"
                                   value="<?= $ukur['tgl_ukur'] ?? '' ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Berat Badan (kg)</label>
                            <input type="number"
                                   step="0.01"
                                   name="bb"
                                   class="form-control"
                                   value="<?= $ukur['bb'] ?? '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tinggi Badan (cm)</label>
                            <input type="number"
                                   step="0.01"
                                   name="tb"
                                   class="form-control"
                                   value="<?= $ukur['tb'] ?? '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lingkar Kepala (cm)</label>
                            <input type="number"
                                   step="0.01"
                                   name="lk"
                                   class="form-control"
                                   value="<?= $ukur['lk'] ?? '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Vaksin</label>
                            <input type="text"
                                   name="vaksin"
                                   class="form-control"
                                   value="<?= $ukur['vaksin'] ?? '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Gizi</label>
                            <select name="status_gizi" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Baik" <?= ($ukur['status_gizi'] ?? '')=='Baik'?'selected':''; ?>>Baik</option>
                                <option value="Kurang" <?= ($ukur['status_gizi'] ?? '')=='Kurang'?'selected':''; ?>>Kurang</option>
                                <option value="Buruk" <?= ($ukur['status_gizi'] ?? '')=='Buruk'?'selected':''; ?>>Buruk</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Ubah
                        </button>
                        <a href="<?= base_url('pengukuran') ?>" class="btn btn-danger">
                            Kembali
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
