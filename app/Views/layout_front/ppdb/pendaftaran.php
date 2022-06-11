<?= $this->extend('layout_front/template') ?>

<?= $this->section('content_front') ?>
<?php

$db = \Config\Database::connect();

$TA = $db->table('tbl_pendaftaran')->get()->getRowArray();

if (base_url('ppdb/pendaftaran')) {
  if ($TA['status_pendaftaran'] == 'Sudah di buka') {
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    return redirect()->to(base_url('/'));
  }
}
?>
<div class="container" style="padding-top: 150px;padding-bottom: 100px;">
  <div class="card shadow-lg rounded">
    <div class="card-body">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <img src="<?= base_url('Front/assets/img/ppdb-online.png') ?>" width="100%" alt="">

        </div>
      </div>
      <div class="row ">
        <div class="col">
          <div class="alert alert-success text-center" role="alert">
            <h2 class="text-center mb-4 sambutan-ppdb" style="font-weight: 800;">PPDB Tahun Ajaran <?= $TA['tahun_ajaran_pendaftaran'] ?> Telah Di Buka</h2>
          </div>
          <div class="button-isi-formulir text-center">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Tutorial
            </button>
            <a href="<?= base_url('ppdb/formulir_pendaftaran') ?>" class="btn text-white " style="background-color: #3fa400;">Formulir</a>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tutorial Mendaftar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- alert -->
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Perhatian!</strong> Silahkan screenshoot tutorial ini terlebih dahulu.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <!-- alert end -->
          <ol type="1">
            <li>Klik tombol <b>Daftar</b> atau Tombol <b>Ayoo Daftar</b></li>
            <li>Klik tombol <b>Formulir</b> <i>(untuk mengisi data-data diri anda)</i></li>
            <li>Masukkan data Anda termasuk biodata, data ayah, data ibu, prestasi <i>(jika ada)</i></li>
            <li>Setelah selesai semuanya di isi dengan lengkap </li>
            <li><b>Perhatian !</b> sebelum klik tombol <b>Daftar</b> pastikan bahwa data Anda sudah benar </li>
            <li>Jika semuanya sudah benar silahkan klik tombol <b>Daftar</b></li>
            <li>Klik tombol <b>Download</b> untuk mendapatkan <b>Kode Pendaftaran</b> </li>
            <li>Sebelum mengklik tombol selesai pastikan anda benar-benar sudah mendowload! karena jika sudah mengklik tombol <b>Selesai</b> Anda tidak akan bisa mendownloadnya lagi kecuali menghubungi panitia PPDB di <b>Kontak</b> website ini</li>

            <li>Setelah selesai mendownload maka klik tombol selesai</li>


          </ol>

          <h4 style="font-weight: 600;" class="mt-5">CARA MELIHAT HASIL PENGUMUMAN</h4>
          <ol type="1">
            <li>Tunggu hasil pengumuman setelah pendaftaran di tutup</li>
            <li><b>Pengguna Handphone : </b> Silahkan klik garis tiga di pojok kanan atas, klik tulisan <b>Pengumuman</b></li>
            <li><b>Pengguna Laptop : </b> Silahkan klik tulisan <b>Pengumuman</b> dibagian navbar atas</li>
            <li>Waktu mundur dibukanya pengumuman akan tampil di halaman tersebut</li>
            <li>Jika waktunya sudah selesai, maka klik tombol <b>Lihat Pengumuman</b></li>
            <li>Silahkan masukkan <b>Kode Pendaftaran</b> yang sudah Anda download</li>
            <li>Hasil pengumuman akan keluar</li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>