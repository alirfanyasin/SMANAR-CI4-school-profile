<div class="row" data-aos="fade-up" data-aos-delay="100">
  <div class="col-lg-12 d-flex justify-content-center">
    <ul id="portfolio-flters">
      <li data-filter="*" class="filter-active">Semua</li>
      <li data-filter=".Fasilitas">Fasilitas</li>
      <li data-filter=".Prestasi">Prestasi</li>
    </ul>
  </div>
</div>
<div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

  <?php foreach ($data as $dagal) : ?>
    <div class="col-lg-3  col-md-4 col-6  portfolio-item <?= $dagal['kategori_gallery'] ?>">
      <div class="portfolio-wrap">
        <img src="<?= base_url('Front/assets/img/portfolio/' . $dagal['thumb_gallery']) ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4><?= $dagal['judul_gallery'] ?></h4>
          <p><?= $dagal['kategori_gallery'] ?></p>
          <div class="portfolio-links">
            <a href="<?= base_url('Front/assets/img/portfolio/' . $dagal['thumb_gallery']) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>


</div>