<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Data Pengukuran</h3>
        </div>

        <div class="card-body">

         <table class="table table-borderless" style="width: 60%;">
  <tr>
    <th style="width: 180px;">Nama Anak</th>
    <td style="width: 20px;">:</td>
    <td><?= $ukur['nama_anak'] ?></td>
  </tr>

  <tr>
    <th>Tgl Kunjungan</th>
    <td>:</td>
    <td><?= $ukur['tgl_kunjungan'] ?></td>
  </tr>

  <tr>
    <th>Tgl Ukur</th>
    <td>:</td>
    <td><?= $ukur['tgl_ukur'] ?></td>
  </tr>

  <tr>
    <th>Berat Badan</th>
    <td>:</td>
    <td><?= $ukur['bb'] ?></td>
  </tr>

  <tr>
    <th>Tinggi Badan</th>
    <td>:</td>
    <td><?= $ukur['tb'] ?></td>
  </tr>

    <tr>
        <th>Lingkar Kepala</th>
        <td>:</td>
        <td><?= $ukur['lk'] ?></td>
    </tr>

    <tr>
        <th>Vaksin</th>
        <td>:</td>
        <td><?= $ukur['vaksin'] ?></td>
    </tr>

    <tr>
        <th>Status Gizi</th>
        <td>:</td>
        <td><?= $ukur['status_gizi'] ?></td>
    </tr>

</table>
        </div>

       
        <div class="card-footer text-left">
          <a href="<?= base_url('pengukuran') ?>" class="btn btn-secondary">
            Kembali
          </a>

          <a href="<?= base_url('pengukuran/download_pdf/'.$ukur['id_ukur']) ?>"
             class="btn btn-danger">
            Cetak PDF
          </a>
        </div>

      </div>

    </div>
  </section>
</div>
