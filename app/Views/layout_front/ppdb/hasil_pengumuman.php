<div class="container">
  <div class="row justify-content-center" style="padding-top: 200px; padding-bottom: 150px;">
    <div class="col-md-8 col-11">
      <?php if ($data_pengumuman == 1) : ?>
        <div class="alert alert-success text-center">
          <h4> SELAMAT <span style="font-weight: 800;"> <?= strtoupper($data_siswa['nama_lengkap']) ?></span> ANDA TELAH LULUS SELEKSI PPDB SMA NEGERI 1 ARJASA</h1>
        </div>
      <?php elseif ($data_pengumuman == 2) : ?>
        <div class="alert alert-danger text-center">
          <h4> JANGAN PATAH SEMANGAT, <br> MOHON MAAF <span style="font-weight: 800;"> <?= strtoupper($data_siswa['nama_lengkap']) ?></span> ANDA BELUM LULUS SELEKSI PPDB SMA NEGERI 1 ARJASA</h1>
        </div>
      <?php endif; ?>
    </div>
  </div>

</div>