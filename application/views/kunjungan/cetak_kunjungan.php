<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Kunjungan</h3>
        </div>

        <div class="card-body">

         <table class="table table-borderless" style="width: 60%;">
  <tr>
    <th style="width: 180px;">Nama Anak</th>
    <td style="width: 20px;">:</td>
    <td><?= $kunjungan['nama_anak'] ?></td>
  </tr>

 <tr>
  <th>Nama Ortu</th>
  <td>:</td>
  <td>
    <?= $kunjungan['name_ayah'] ?> & <?= $kunjungan['name_ibu'] ?>
  </td>
</tr>

   <tr>
    <th>Tgl Kunjungan</th>
    <td>:</td>
    <td><?= $kunjungan['tgl_kunjungan'] ?></td>
   </tr>

   <tr>
    <th>Fasilitas</th>
    <td>:</td>
    <td><?= $kunjungan['fasilitas'] ?></td>
   </tr>
   
    </table>
           </div>
        <div class="card-footer text-left">
          <a href="<?= base_url('kunjungan') ?>" class="btn btn-secondary">
            Kembali
          </a>
          <a href="<?= base_url('kunjungan/download_pdf/'.$kunjungan['id_kunjungan']) ?>"
             class="btn btn-danger">
            Cetak PDF
          </a>
        </div>

      </div>

    </div>
  </section>
</div>
