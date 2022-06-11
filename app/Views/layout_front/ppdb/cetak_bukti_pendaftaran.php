<?= $this->extend('layout_front/template') ?>

<?= $this->section('content_front') ?>
<?php

if (!session()->get('bukti_pendaftaran')) {
  throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
  return redirect()->to('ppdb/formulir_pendaftaran');
}

?>
<div class="container" style="padding-top: 150px; padding-bottom: 100px;">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-10 col-md-12 col-12">
      <div class="alert alert-success text-center" role="alert">
        <h2>SELAMAT <b> <?= strtoupper(session()->get('nama_lengkap')) ?></b> ANDA SUDAH TERDAFTAR.</h2>
        <p>Wajib <b>Download</b> bukti pendaftaran untuk mengambil <b>Kode Pendaftaran</b>, setelah di download klik tombol <b>Selesai</b>!. Dan nantikan pengumuman akan di buka setelah pendaftaran di tutup</p>
      </div>

      <div class="button-regenerate text-center">
        <a href="<?= base_url('ppdb/download_bukti_pendaftaran') ?>" class="btn text-white" style="background-color: #3fa400;">Download</a>
        <button type="button" onclick="konfirmasi()" class="btn btn-dark text-white">Selesai</button>
      </div>
    </div>
  </div>
</div>

<script>
  function konfirmasi() {
    swal({
      title: 'Sudah Mendownload?',
      text: "Pendaftaran Selesai!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger m-l-10',
      cancelButtonText: 'Tidak',
      confirmButtonText: 'Ya'
    }).then(function() {
      document.location.href = '<?= base_url('ppdb/finish_register') ?>'
    })
  }
</script>
<?= $this->endSection()  ?>