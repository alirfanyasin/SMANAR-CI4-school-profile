<div class="row gy-4">
  <?php foreach ($data as $dawep) : ?>
    <div class="col-lg-3 col-md-6 col-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
      <div class="member">
        <div class="member-img">
          <img src="<?= base_url('front/assets/img/team/wakasek/' . $dawep['foto_wakasek']) ?>" class="img-fluid" alt="">
          <div class="social">
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
          </div>
        </div>
        <div class="member-info">
          <h4><?= $dawep['nama_wakasek'] ?></h4>
          <span><?= $dawep['jabatan_wakasek'] ?></span>
        </div>
      </div>
    </div>
  <?php endforeach ?>

</div>