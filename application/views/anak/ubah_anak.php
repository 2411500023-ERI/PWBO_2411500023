<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Data Anak</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Data Anak</li>
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
                            <h5 class="card-title">Ubah Anak</h5>

                            <form action="<?= base_url('anak/ubah/'.$anak['id_anak']) ?>" method="post">

                                
                                <div class="mb-3">
                                    <label class="form-label">Nama Anak</label>
                                    <input type="text" class="form-control"
                                           name="anak" value="<?= $anak['name'] ?>" required>
                                </div>

                                
                                <div class="mb-3">
                                    <label class="form-label">Nama Orang Tua</label>
                                    <select name="ortu_id" class="form-control" required>
                                        <option value="">-- pilih data ortu --</option>
                                        <?php foreach ($list_ortu as $ortu): ?>
                                            <option value="<?= $ortu['id_ortu'] ?>"
                                                <?= $ortu['id_ortu'] == $anak['ortu_id'] ? 'selected' : '' ?>>
                                                Ny. <?= $ortu['name_ibu'] ?> - Tn. <?= $ortu['name_ayah'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                
                                <div class="mb-3">
                                    <label class="form-label">NIK Anak</label>
                                    <input type="text" class="form-control"
                                           name="nik" value="<?= $anak['nik'] ?>" required>
                                </div>

                              
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="jk" class="form-control" required>
                                        <option value="L" <?= $anak['jk']=='L' ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="P" <?= $anak['jk']=='P' ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>

                               
                                <div class="mb-3">
                                    <label class="form-label">Berat Badan Lahir (kg)</label>
                                    <input type="number" step="0.1" class="form-control"
                                           name="bb_lahir" value="<?= $anak['bb_lahir'] ?>" required>
                                </div>

                              
                                <div class="mb-3">
                                    <label class="form-label">Tinggi Badan Lahir (cm)</label>
                                    <input type="number" step="0.1" class="form-control"
                                           name="tb_lahir" value="<?= $anak['tb_lahir'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control"
                                           name="tgl_lahir" value="<?= $anak['tgl_lahir'] ?>" required>
                                </div>

                               
                                <div class="mb-3">
                                    <label class="form-label">Golongan Darah</label>
                                    <select name="goldar" class="form-control" required>
                                        <option value="A" <?= $anak['goldar']=='A' ? 'selected' : '' ?>>A</option>
                                        <option value="B" <?= $anak['goldar']=='B' ? 'selected' : '' ?>>B</option>
                                        <option value="AB" <?= $anak['goldar']=='AB' ? 'selected' : '' ?>>AB</option>
                                        <option value="O" <?= $anak['goldar']=='O' ? 'selected' : '' ?>>O</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('anak') ?>" class="btn btn-danger">Kembali</a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
