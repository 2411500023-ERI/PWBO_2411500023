<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Anak</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Data Anak</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Anak</h5>

                            <p class="card-text">

                            
                            <form action="<?= base_url('anak/tambah_anak') ?>" method="post">

                                <div class="mb-3">
                                    <label for="anak" class="form-label">Nama Anak</label>
                                    <input type="text" class="form-control" name="anak" id="anak" aria-describedby="Nama anak">
                                </div>

                                <div class="mb-3">
                                    <label for="ortu_id" class="form-label">Nama Ortu</label>
                                    <select name="ortu_id" id="ortu_id" class="form-control">
                                        <option value="" selected disabled>--pilih data ortu--</option>
                                        <?php foreach ($list_ortu as $ortu) : ?>
                                            <option value="<?= $ortu['id_ortu'] ?>">
                                                Ny. <?= $ortu['name_ibu'] ?> - Tn. <?= $ortu['name_ayah'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nik" class="form-label">Nik Anak</label>
                                    <input type="text" class="form-control" name="nik" id="nik" aria-describedby="nik" required>
                                </div>

                                <div class="mb-3">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control">
                                        <option value="" selected disabled>--pilih jenis kelamin--</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="bb_lahir" class="form-label">Berat Badan Lahir (kg 2.75)</label>
                                    <input type="number" step="0.1" class="form-control" name="bb_lahir" id="bb_lahir" aria-describedby="bb_lahir" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tb_lahir" class="form-label">Tinggi Badan Lahir (cm 27.5)</label>
                                    <input type="number" step="0.1" class="form-control" name="tb_lahir" id="tb_lahir" aria-describedby="tb_lahir" required>
                                </div>
                                    
                                <div class="mb-3">
                                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="tgl_lahir" required>
                                </div>

                                <div class="mb-3">
                                    <label for="goldar" class="form-label">Golongan Darah</label>
                                    <select name="goldar" id="goldar" class="form-control">
                                        <option value="" selected disabled>--pilih golongan darah--</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="<?= base_url('ortu') ?>" class="btn btn-danger">Kembali</a>

                            </form>
                        

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
