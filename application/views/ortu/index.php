<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                
                <div class="col-sm-6">
                    <h1 class="m-0">Data Orang Tua</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Orang Tua</li>
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

                    <a href="<?= base_url('ortu/tambah'); ?>" class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Ibu</th>
                                <th scope="col">Nama Ayah</th>
                                <th scope="col">Hubungan</th>
                                <th scope="col">Telp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; foreach ($list_ortu as $ortu): ?>
                            <tr>
                              <td><?= $no++; ?></td>
                               <td><?= $ortu['name_ibu'] ?? '_'; ?></td>
                               <td><?= $ortu['name_ayah'] ?? '_'; ?></td>
                               <td><?= $ortu['hubungan'] ?? '-'; ?></td>
                               <td><?= $ortu['telp'] ?? '-'; ?></td>
                               <td><?= $ortu['alamat'] ?? '-'; ?></td>


                                <td>
                                    <a href="<?= base_url('ortu/ubah/' . $ortu['id_ortu']); ?>" 
                                       class="badge bg-success">Ubah</a>

                                    <a href="<?= base_url('ortu/hapus/' . $ortu['id_ortu']); ?>" 
                                       class="badge bg-danger"
                                       onclick="return confirm('Yakin Hapus?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
