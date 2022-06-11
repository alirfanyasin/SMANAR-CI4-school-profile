<?php
$db = \Config\Database::connect();

$id = $db->table('tbl_blog')->get()->getRowArray();
$statusPendaftaran = $db->table('tbl_pendaftaran')->where(['status_pendaftaran' => 'Belum di buka'])->get()->getRowArray();
$sp = $db->table('tbl_pengumuman')->where(['status_pengumuman' => 'Aktif'])->get()->getRowArray();

?>
<header id="header" class="header fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
      <img src="<?= base_url('') ?>/front/assets/img/logo-smanar.png" alt="">
      <span>SMANAR</span>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="<?= base_url('/') ?>">Beranda</a></li>
        <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
        <li><a class="nav-link scrollto" href="#services">Prestasi</a></li>
        <li><a class="nav-link scrollto" href="#portfolio">Galerry</a></li>
        <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
        <li><a class="nav-link scrollto" href="<?= base_url('Home/all')  ?>">Blog</a></li>
        <!-- <li class="dropdown"><a href="#"><span>Lainnya</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">PPDB</a></li>
            <li><a href="#">Profile Guru</a></li>

          </ul>
        </li> -->
        <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        <?php if ($sp == false) : ?>
          <?= ''; ?>
        <?php else : ?>
          <li><a class="nav-link scrollto" href="<?= base_url('ppdb/pengumuman')  ?>">Pengumuman</a></li>
        <?php endif; ?>
        <li><a class="getstarted scrollto <?= ($statusPendaftaran) ? '' : 'btn-daftar' ?>" href="<?= ($statusPendaftaran) ? base_url('ppdb/pendaftaran') : '#' ?>">Daftar</a></li>


        <!-- <li><a class="getstarted scrollto" href="" id="btn-daftar">Daftar</a></li> -->
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->


    <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> -->
  </div>
</header>