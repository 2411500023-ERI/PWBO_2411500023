<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Data Orang Tua</h3>
        </div>

        <div class="card-body">

         <table class="table table-borderless" style="width: 60%;">
  <tr>
    <th style="width: 180px;">Nama Ibu</th>
    <td style="width: 20px;">:</td>
    <td><?= $ortu['name_ibu'] ?></td>
  </tr>
  <tr>
    <th>Nama Ayah</th>
    <td>:</td>
    <td><?= $ortu['name_ayah'] ?></td>
  </tr>
  <tr>
    <th>Hubungan</th>
    <td>:</td>
    <td><?= $ortu['hubungan'] ?></td>
  </tr>
  <tr>
    <th>Telp</th>
    <td>:</td>
    <td><?= $ortu['telp'] ?></td>
  </tr>
  <tr>
    <th>Alamat</th>
    <td>:</td>
    <td><?= $ortu['alamat'] ?></td>
  </tr>
</table>
        </div>

       
        <div class="card-footer text-left">
          <a href="<?= base_url('ortu') ?>" class="btn btn-secondary">
            Kembali
          </a>
          <a href="<?= base_url('ortu/download_pdf/'.$ortu['id_ortu']) ?>"
             class="btn btn-danger">
            Cetak PDF
          </a>
        </div>

      </div>

    </div>
  </section>
</div>
