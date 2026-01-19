<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Anak</h3>
        </div>

        <div class="card-body">

         <table class="table table-borderless" style="width: 60%;">
  <tr>
    <th style="width: 180px;">Nama Anak</th>
    <td style="width: 20px;">:</td>
    <td><?= $anak['name'] ?></td>
  </tr>

 <tr>
  <th>Nama Ortu</th>
  <td>:</td>
  <td>
    <?= $anak['name_ayah'] ?> & <?= $anak['name_ibu'] ?>
  </td>
</tr>

   <tr>
    <th>BB Lahir</th>
    <td>:</td>
    <td><?= $anak['bb_lahir'] ?></td>
   </tr>

    <tr>
     <th>TB Lahir</th>
     <td>:</td>
     <td><?= $anak['tb_lahir'] ?></td>
    </tr>
    
   <tr>
    <th>Jk</th>
    <td>:</td>
    <td><?= $anak['jk'] ?></td>
   </tr>

  <tr>
    <th>Tgl Lahir</th>
    <td>:</td>
    <td><?= $anak['tgl_lahir'] ?></td>
   </tr>

    <tr>
     <th>Goldar</th>
     <td>:</td>
     <td><?= $anak['goldar'] ?></td>

    </table>
           </div>
        <div class="card-footer text-left">
          <a href="<?= base_url('anak') ?>" class="btn btn-secondary">
            Kembali
          </a>
          <a href="<?= base_url('anak/download_pdf/'.$anak['id_anak']) ?>"
             class="btn btn-danger">
            Cetak PDF
          </a>
        </div>

      </div>

    </div>
  </section>
</div>
