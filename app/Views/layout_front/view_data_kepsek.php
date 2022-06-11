<?php foreach ($data as $dakep) : ?>
  <div class="row gx-0">
    <div class="col-lg-4 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
      <img src="<?= base_url('Front/assets/img/team/kepsek/' . $dakep['foto_kepsek']) ?>" width="100%" class="img-fluid" alt="">
    </div>

    <div class="col-lg-8 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <div class="content">
        <h2>Kepala Sekolah</h2>
        <h3><?= $dakep['nama_kepsek'] ?></h3>
        <p>
          <?= $dakep['sambutan_kepsek'] ?>
        </p>
        <div class="text-center text-lg-start">
          <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Profile</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

<?php endforeach; ?>