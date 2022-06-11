<?= $this->extend('layout_front/template') ?>

<?= $this->section('content_front') ?>
<?php

$db = \Config\Database::connect();

$pengumuman = $db->table('tbl_pengumuman')->get()->getRowArray();

// if (base_url('ppdb/pengumuman')) {
//   if ($TA['status_pengumuman'] == 'Non Aktif') {
//     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
//     return redirect()->to(base_url('/'));
//   }
// }
?>


<div class="container">
  <div class="row d-flex justify-content-center" style="padding-top: 200px; padding-bottom: 100px;">
    <div class="col">
      <h2 class="text-center" id="pengum" style="font-weight: 700; color: #3fa400;">Pengumuman Akan Di Buka</h2>
      <h1 id="countdown" class="text-center"></h1>
      <div class="text-center">
        <a href="<?= base64_encode(base_url('ppdb/verifikasi_kode_pendaftaran')) ?>" id="button-lihat" class="btn text-white mt-3 d-none" style="background-color: #3fa400; ">Lihat Pengumuman</a>
      </div>
    </div>
  </div>
</div>

<?php if ($pengumuman['status_pengumuman'] == 'Aktif') : ?>
  <script>
    var countDownDate = new Date("<?= $pengumuman['tanggal_pengumuman'] ?> <?= $pengumuman['waktu_pengumuman'] ?>").getTime();
    setInterval(function() {
      var now = new Date().getTime();
      var distance = countDownDate - now;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var secon = Math.floor((distance % (1000 * 60)) / 1000);



      document.getElementById('countdown').innerHTML = days + " Hari " + hours + ":" + minutes + ":" + secon;






      if (distance < 0) {
        clearInterval();
        const text = document.getElementById('pengum');
        const countdown = document.getElementById('countdown');
        text.innerHTML = 'Pengumuman Telah di Buka';

        countdown.innerHTML = '';


        document.getElementById('button-lihat').classList.remove('d-none');

        close();
      }
    }, 1000)
  </script>

<?php else : ?>
  <script>
    var h2 = document.getElementById('pengum');
    h2.innerHTML = '<span class = "text-danger">Opps...! </span> <br> <span class = "text-dark">Tidak ada pengumuman </span>'
  </script>
<?php endif; ?>
<?= $this->endSection() ?>