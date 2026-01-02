<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Kunjungan</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('kunjungan') ?>">Kunjungan</a></li>
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

                    <form action="<?= base_url('kunjungan/tambah') ?>" method="post">

                        <div class="mb-3">
                            <label for="anak_id" class="form-label">Nama Anak</label>
                            <select name="anak_id" id="anak_id" class="form-control" required>
                                <option value="" selected disabled>-- Pilih Anak --</option>
                                <?php foreach ($list_anak as $anak): ?>
                                    <option value="<?= $anak['id_anak']; ?>">
                                        <?= $anak['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_kunjungan" class="form-label">Tanggal Kunjungan</label>
                            <input type="date"
                                   class="form-control"
                                   name="tgl_kunjungan"
                                   id="tgl_kunjungan"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="fasilitas" class="form-label">Fasilitas</label>
                            <input type="text"
                                   class="form-control"
                                   name="fasilitas"
                                   id="fasilitas"
                                   placeholder="Contoh: Konsultasi">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                        <a href="<?= base_url('kunjungan') ?>" class="btn btn-danger">
                            Kembali
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
