<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Pengukuran</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('pengukuran') ?>">Pengukuran</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <form action="<?= base_url('pengukuran/tambah') ?>" method="post">

                      
                        <div class="mb-3">
                            <label class="form-label">Kunjungan Nama Anak</label>
                            <select name="kunjungan_id" class="form-control" required>
                                <option value="" disabled selected>-- Pilih Kunjungan --</option>
                                <?php foreach ($list_kunjungan as $k): ?>
                                    <option value="<?= $k['id_kunjungan']; ?>">
                                        <?= $k['nama_anak']; ?> | <?= $k['tgl_kunjungan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Ukur</label>
                            <input type="date" name="tgl_ukur" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Berat Badan (kg)</label>
                            <input type="number" step="0.01" name="bb" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tinggi Badan (cm)</label>
                            <input type="number" step="0.01" name="tb" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lingkar Kepala (cm)</label>
                            <input type="number" step="0.01" name="lk" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Vaksin</label>
                            <input type="text" name="vaksin" class="form-control" placeholder="Contoh: Polio">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Gizi</label>
                            <select name="status_gizi" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Baik">Baik</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Buruk">Buruk</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('pengukuran') ?>" class="btn btn-danger">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
