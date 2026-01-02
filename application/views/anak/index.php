<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                
                <div class="col-sm-6">
                    <h1 class="m-0">Data Anak</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Anak</li>
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

                    <a href="<?= base_url('anak/tambah'); ?>" class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Anak</th>
                                <th scope="col">Nama Ibu</th>
                                <th scope="col">Nama Ayah</th>
                                <th scope="col">BB Lahir</th>
                                <th scope="col">TB Lahir</th>
                                <th scope="col">JK</th>
                                <th scope="col">Tgl Lahir</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; foreach ($list_anak as $anak): ?>
                            <tr>
                               <th scope="row"><?= $no ?></th>
                               <td><?= $anak['name'] ?></td>
                               <td><?= $anak['name_ibu'] ?></td>
                               <td><?= $anak['name_ayah'] ?></td>
                               <td><?= $anak['bb_lahir'] ?></td>
                               <td><?= $anak['tb_lahir'] ?></td>
                               <td><?= $anak['jk'] ?></td>
                               <td><?= $anak['tgl_lahir'] ?></td>
                                <td>
                                    <a href="<?= base_url('anak/ubah/') ?><?= $anak['id_anak']; ?>">
                                      <span class="badge bg-success">Ubah</span></a>

                                    <a href="<?= base_url('anak/hapus/') ?><?= $anak['id_anak']; ?>"> 
                                     <span class="badge bg-danger">Hapus</span></a>
                                </td>
                            </tr>
                            <?php $no++; endforeach ?>
                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
