<?php

$db = \Config\Database::connect();

$hubkam = $db->table('tbl_hub_kam')->get()->getRowArray();

?>

<footer id="footer" class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <img src="<?= base_url('') ?>/front/assets/img/logo-smanar.png" alt="">
            <span>SMANAR</span>
          </a>
          <p>SMA Negeri 1 Arjasa atau lebih dikenal dengan sebutan SMANAR merupakan sekolah negeri pertama di pulau kangean yang di dirikan sejak tahun 1990.</p>
          <div class="social-links mt-3">
            <a href="<?= $hubkam['tw_hubkam'] ?>" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="<?= $hubkam['fb_hubkam'] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="<?= $hubkam['ig_hubkam'] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="<?= $hubkam['yt_hubkam'] ?>" class="linkedin"><i class="bi bi-youtube"></i></a>
            <a href="<?= $hubkam['wa_hubkam'] ?>" class="linkedin"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Link</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('/') ?>">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Tentang</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Prestasi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Gallery</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Blog</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Kontak</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Fasilitas</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Lab Sains & Teknologi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Lapangan Olahraga</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Mushollah</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Taman Sekolah</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Koperasi Sekolah</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Kursus Komputer</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Hubungi Kami</h4>
          <p>
            <?= $hubkam['alamat_hubkam'] ?> <br><br>
            <strong>Phone:</strong> <?= $hubkam['kontak1_hubkam'] ?><br>
            <strong>Email:</strong> <?= $hubkam['email_hubkam'] ?><br>
          </p>

        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>Smanar</span></strong>. All Rights Reserved <?= date('Y') ?>
    </div>
    <div class="credits">

      Created by <a href="https://negozio.epizy.com/" target="_blank">Irfan Yasin</a>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('') ?>/front/assets/vendor/purecounter/purecounter.js"></script>
<script src="<?= base_url('') ?>/front/assets/vendor/aos/aos.js"></script>
<script src="<?= base_url('') ?>/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('') ?>/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url('') ?>/front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('') ?>/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('') ?>/front/assets/vendor/php-email-form/validate.js"></script>

<!-- Sweet-Alert  -->
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/pages/sweet-alert.init.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('') ?>/front/assets/js/main.js"></script>