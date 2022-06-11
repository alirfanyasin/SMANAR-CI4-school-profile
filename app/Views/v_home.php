<?= $this->extend('layout_front/template') ?>
<?= $this->section('content_front') ?>

<?php
$db = \Config\Database::connect();

$statusPendaftaran = $db->table('tbl_pendaftaran')->where(['status_pendaftaran' => 'Belum di buka'])->get()->getRowArray();
$hubkam = $db->table('tbl_hub_kam')->get()->getRowArray();
?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center content-one-jumbotron">
        <h1 data-aos="fade-up">Sekolah yang Tepat untuk Menunjang Bakat dan Minat</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">SMA Negeri 1 Arjasa, Maju Bersama Hebat Semua</h2>
        <div data-aos="fade-up" data-aos-delay="600">
          <div class="text-center text-lg-start">
            <a href="<?= ($statusPendaftaran) ? base_url('ppdb/pendaftaran') : '#' ?>" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center <?= ($statusPendaftaran) ? '' : 'btn-ayo-daftar' ?>">
              <span>Ayo Daftar</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-6 hero-img content-two-jumbotron" data-aos="zoom-out" data-aos-delay="200">
        <img src="<?= base_url() ?>/front/assets/img/new-hero.svg" class="img-fluid" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->






<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">


    <div class="container" data-aos="fade-up">
      <div class="data_kepsek"></div>



    </div>

  </section><!-- End About Section -->

  <!--  Wakasek Start-->
  <section id="team" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>WAKASEK</h2>
        <p>Wakil Kepala Sekolah</p>
      </header>


      <div class="data_wakasek"></div>

    </div>

  </section>
  <!--  Wakasek End-->


  <!-- ======= Values Section ======= -->
  <section id="values" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Waktu Operasi</h2>
        <p>Operasional Sekolah</p>
      </header>

      <div class="row">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="box">
            <img src="<?= base_url('') ?>/front/assets/img/study.svg" class="img-fluid mb-4" alt="">
            <h3>Senin - Jumat</h3>
            <p>Hari senin sampai jumat merupakan hari pembelajaran di kelas.</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
          <div class="box">
            <img src="<?= base_url('') ?>/front/assets/img/time.svg" class="img-fluid" alt="">
            <h3>07.00 AM - 12.00 PM </h3>
            <p>Pembelajaran di kelas sekitar 8 jam dengan 20 menit istirahat.</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
          <div class="box">
            <img src="<?= base_url('') ?>/front/assets/img/holiday.svg" class="img-fluid mb-5" alt="">
            <h3>Hari Libur</h3>
            <p>Hari liburnya dua hari yaitu hari sabtu dan minggu istirahat di rumah.</p>
          </div>
        </div>

      </div>

    </div>

  </section><!-- End Values Section -->

  <!-- ======= Counts Section JUMPENG======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">
      <div class="data_jml_penghuni"></div>

    </div>
  </section><!-- End Counts Section JUMPENG-->

  <!-- ======= Features Section ======= -->
  <section id="features" class="features">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Fasilitas</h2>
        <p>Fasilitas untuk Siswa</p>
      </header>

      <div class="row">

        <div class="col-lg-6">
          <img src="<?= base_url('') ?>/front/assets/img/fasilitas.svg" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
          <div class="row align-self-center gy-4">

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Lab Komputer</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Lab Kimia</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Lab Fisika</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Lab Biologi</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>UKS</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Lapangan Olahraga</h3>
              </div>
            </div>
            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Mushollah</h3>
              </div>
            </div>
            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Taman Belajar</h3>
              </div>
            </div>
            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Koperasi Sekolah</h3>
              </div>
            </div>
            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Perpustakaan</h3>
              </div>
            </div>
            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Kantin Sekolah</h3>
              </div>
            </div>
            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Tablet Belajar</h3>
              </div>
            </div>

          </div>
        </div>

      </div> <!-- / row -->

      <!-- Ekskul Start -->
      <section id="portfolio-details" class="portfolio-details" style="margin-top: 100px;">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Minat & Bakat</h2>
            <p>Intra & Ekstrakulikuler</p>
          </header>
          <div class="row gy-4">

            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">
                  <?php foreach ($data_ekskul as $dakul) : ?>
                    <div class="swiper-slide">
                      <img src="<?= base_url() ?>/front/assets/img/team/ekskul/<?= $dakul['foto_ekskul'] ?>" alt="">
                    </div>

                  <?php endforeach; ?>

                </div>
                <!-- <div class="swiper-pagination"></div> -->
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Daftar Intra & Ekskul</h3>
                <ul>
                  <?php foreach ($data_ekskul as $eksname) : ?>
                    <li><i class="bi bi-check"></i> <?= $eksname['nama_ekskul'] ?></li>
                  <?php endforeach; ?>

                </ul>

              </div>

            </div>

          </div>
        </div>
      </section>
      <!-- Ekskul End -->



      <!-- Feature Icons -->
      <div class="row feature-icons" data-aos="fade-up">
        <h3>Kelebihan Bersekolah di SMANAR</h3>

        <div class="row">

          <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
            <img src="<?= base_url('') ?>/front/assets/img/kelebihan.svg" class="img-fluid p-4" alt="">
          </div>

          <div class="col-xl-8 d-flex content">
            <div class="row align-self-center gy-4">

              <div class="col-md-6 icon-box" data-aos="fade-up">
                <i class="ri-user-line"></i>
                <div>
                  <h4>Guru Profesional</h4>
                  <p>Guru yang profesional di bidangnya sangat membantu bagi siswa untuk cepat memahami pelajaran.</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="ri-book-line"></i>
                <div>
                  <h4>Metode Belajar </h4>
                  <p>Metode pembelajaran via Smartphone untuk membantu mempermudah siswa dalam belajar.</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="ri-run-line"></i>
                <div>
                  <h4>Ekstrakulikuler</h4>
                  <p>Ekstrakulikuler yang banyak merupakan sebagai penunjang bakat dan minat siswa.</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="ri-open-arm-line"></i>
                <div>
                  <h4>Lingkungan</h4>
                  <p>Di dalam lingkungan yang baik akan membentuk pribadi yang baik pula.</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                <i class="ri-emotion-happy-line"></i>
                <div>
                  <h4>Kedisiplinan</h4>
                  <p>Disiplin merupakan salah satu kewajiban siswa yang harus benar-benar mematuhi peraturan sekolah.</p>
                </div>
              </div>

              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                <i class="ri-star-smile-line"></i>
                <div>
                  <h4>Sopan Santun</h4>
                  <p>Sopan santun merupakan kewajiban siswa yang harus selalu dilakukan dimanapun dan kapanun.</p>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div><!-- End Feature Icons -->

    </div>

  </section><!-- End Features Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Prestasi</h2>
        <p>Prestasi Siswa</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-box blue">
            <i class="ri-star-line icon"></i>
            <h3>Tingkat Kecamatan</h3>
            <p>Prestasi di tingkat kecamatan selalu diraih dengan mudah oleh siswa-siswi smanar sehingga sekolah banyak mengalami kemajuan dalam bidang ilmu pengetahuan baik di ajang olimpiade maupun tidak.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-box orange">
            <i class="ri-medal-line icon"></i>
            <h3>Tingkat Kabupaten</h3>
            <p>Di tingkat kabupten siswa-siswi smanar hampir setiap tahun selalu mendapatkan prestasi di bidang non-akademik. selain itu tingkat kabupaten tidak terlalu banyak menyelengarakan lomba. </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-box green">
            <i class="ri-trophy-line icon"></i>
            <h3>Tingkat Nasional</h3>
            <p>Prestasi di tingkat nasional merupakan prestasi yang sangat membangakan bagi smanar yang sudah banyak diraih oleh siswa-siswi di ajang lomba olimpiade Akademik maunpun non-akademik.</p>
          </div>
        </div>

      </div>

    </div>

  </section><!-- End Services Section -->





  <!-- ======= Gallery Section ======= -->
  <section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Portfolio</h2>
        <p>Gallery</p>
      </header>


      <div class="data_gallery"></div>

    </div>

  </section><!-- End Portfolio Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Alumni</h2>
        <p>Bagaimana Menurut Mereka Tentang SMANAR?</p>
      </header>
      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper">
          <?php foreach ($data as $datlum) : ?>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <?= $datlum['testimoni_alumni'] ?>
                </p>
                <div class="profile mt-auto">
                  <img src="<?= base_url('Front/assets/img/team/alumni/' . $datlum['foto_alumni']) ?>" class="testimonial-img" alt="">
                  <h3><?= $datlum['nama_alumni'] ?></h3>
                  <h4><?= $datlum['jabatan_alumni'] ?></h4>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!-- End testimonial item -->
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <!-- <div class="data_alumni"></div> -->
    </div>

  </section><!-- End Testimonials Section -->




  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>F.A.Q</h2>
        <p>Ditanya Orang Lain</p>
      </header>

      <div class="row">
        <div class="col-lg-6">
          <!-- F.A.Q List 1-->
          <div class="accordion accordion-flush" id="faqlist1">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                  Apakah biayanya mahal sekolah di smanar?
                </button>
              </h2>
              <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Menjadi siswa atau siswi di smanar, anda tidak perlu khawatir mengenai biaya di dalamnya karena smanar bebas uang SPP jadi biaya yang di keluarkan untuk sekolah disini hanya daftar ulang persemester.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                  Kenapa harus sekolah di smanar?
                </button>
              </h2>
              <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Sekolah smanar mempunyai fasilitas yang lenkap yang dapat digunakan siswa untuk mengasah bakat dan minatnya, selain itu smanar juga mempunyai ekstrakulikuler yang banyak sehingga siswa dapat memilih sehingga menunjang bakat dan minatnya tidak hanya di bidang akademik tetapi juga non-akademik.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                  Apakah smanar merupakan sekolah negeri favorit di kangean?
                </button>
              </h2>
              <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Smanar merupakan sekolah negeri pertama di kangean dan yang paling banyak diminati siswa sehingga nama smanar dikenal banyak orang dengan prestasi-prestasi yang diraihnya?

                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-6">

          <!-- F.A.Q List 2-->
          <div class="accordion accordion-flush" id="faqlist2">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                  Berapa banyak alumni smanar yang diterima di PTN & PTS?
                </button>
              </h2>
              <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Smanar sudah banyak memiliki relasi dengan kampus-kampus besar, sehingga memungkinkan banyak siswa yang akan di terima di Perguruan Tinggi Negeri (PTN) dan Perguruan Tinggi Swasta (PTS).
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                  Jurusan apa saja yang ada di smanar?
                </button>
              </h2>
              <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Smanar memIliki dua jurusan yaitu Matematika Ilmu Pengetahuan Alam (MIPA) dan Ilmu Pengetahuan Sosial (IPS).

                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                  Kegiatan apa saja yang ada di smanar?
                </button>
              </h2>
              <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Kegiatan yang banyak di sekolah ini dapat di ikuti oleh semua siswa baik yang internal maupun eksternal.
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>

  </section>
  <!-- End F.A.Q Section -->


  <!-- ======= Recent Blog Posts Section ======= -->
  <section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Blog</h2>
        <p>Berita Terbaru</p>
      </header>

      <div class="view-data-blog"></div>

    </div>

  </section><!-- End Recent Blog Posts Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Kontak</h2>
        <p>Hubungi Kami</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-geo-alt"></i>
                <h3>Alamat</h3>
                <p><?= $hubkam['alamat_hubkam'] ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-telephone"></i>
                <h3>Hubungi</h3>
                <p><?= $hubkam['kontak1_hubkam'] ?><br><?= $hubkam['kontak2_hubkam'] ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-envelope"></i>
                <h3>Email</h3>
                <p><?= $hubkam['email_hubkam'] ?><br><br></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-clock"></i>
                <h3>Operasi</h3>
                <p>Senin - Jumat<br><?= $hubkam['dari_jam_hubkam'] ?> AM - <?= $hubkam['sampai_jam_hubkam'] ?> PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="<?= base_url('Home/kirim_feedback') ?>" method="POST" class="form_feedback php-email-form">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="nama_feedback" class="form-control" placeholder="Nama Lengkap" required>
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control" name="email_feedback" placeholder="Alamat Email" required>
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="subjek_feedback" placeholder="Subjek" required>
              </div>

              <div class="col-md-12">
                <textarea name="pesan_feedback" class="form-control" placeholder="Pesan" required rows="6"></textarea>
              </div>

              <div class="col-md-12 text-center">

                <button type="submit" class="btn text-white btn-kirim" style="background-color: #3fa400;">Kirim Pesan</button>
              </div>

            </div>
          </form>

        </div>

      </div>

    </div>

  </section><!-- End Contact Section -->

</main><!-- End #main -->
<?= $this->endSection() ?>