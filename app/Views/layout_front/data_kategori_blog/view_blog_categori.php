<?= $this->extend('layout_front/template') ?>

<?= $this->section('content_front') ?>
<?php
$db = \Config\Database::connect();

$datblognew = $db->table('tbl_blog')->orderBy('id_blog', 'DESC')->get(7)->getResultArray();
$penulis = $db->table('tbl_admin')->get()->getRowArray();


?>
<section id="blog" class="blog" style="padding-top: 100px;">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-8 entries">

        <?php foreach ($data_edukasi as $date) : ?>
          <article class="entry">

            <div class="entry-img">
              <img src="<?= base_url() ?>/Front/assets/img/blog/<?= $date['thumbnail_blog'] ?>" alt="" width="100%" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="<?= base_url('Home/detail_blog/' . $date['slug_blog']) ?>"><?= $date['judul_blog'] ?></a>
            </h2>
            <div class="read-more">
              <a href="<?= base_url('Home/detail_blog/' . $date['slug_blog']) ?>">Baca Selengkapnya</a>
            </div>

          </article><!-- End blog entry -->
        <?php endforeach; ?>


      </div><!-- End blog entries list -->

      <div class="col-lg-4">
        <div class="sidebar">

          <h3 class="sidebar-title">Search</h3>
          <div class="sidebar-item search-form">
            <form action="">
              <input type="text" class="form-control search-input">
              <button type="submit"><i class="bi bi-search"></i></button>
            </form>
          </div><!-- End sidebar search formn-->

          <h3 class="sidebar-title">Kategori</h3>
          <div class="sidebar-item categories">
            <ul>
              <li><a href="<?= base_url('Home/all') ?>">Semua </a></li>
              <li><a href="<?= base_url('Home/categori_edukasi') ?>">Edukasi </a></li>
              <li><a href="<?= base_url('Home/categori_prestasi') ?>">Prestasi</a></li>
              <li><a href="<?= base_url('Home/categori_kegiatan') ?>">Kegiatan</a></li>
              <li><a href="<?= base_url('Home/categori_kunjungan') ?>">Kunjungan</a></li>
              <li><a href="<?= base_url('Home/categori_ekstrakulikuler') ?>">Ekstrakulikuler </a></li>
              <li><a href="<?= base_url('Home/categori_other') ?>">Lainnya</a></li>
            </ul>
          </div><!-- End sidebar categories-->

          <h3 class="sidebar-title">Berita Terbaru</h3>
          <div class="sidebar-item recent-posts">
            <?php foreach ($datblognew as $datblog) : ?>

              <div class="post-item clearfix">
                <img src="<?= base_url() ?>/Front/assets/img/blog/<?= $datblog['thumbnail_blog'] ?>" alt="" width="100%">
                <h4><a href="<?= base_url('Home/detail_blog/' . $datblog['slug_blog']) ?>" class="judul_blog"><?= $datblog['judul_blog'] ?></a></h4>
                <time><span class="date-post-blog"><?= $datblog['created_at'] ?></span></time>
              </div>

            <?php endforeach; ?>


          </div>
          <!-- End sidebar recent posts-->

        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

    </div>

  </div>
</section>

<script>
  let lengthJudulBlog = document.querySelectorAll('.judul_blog');
  for (var i = 0; i < lengthJudulBlog.length; i++) {
    let string = lengthJudulBlog[i].textContent;
    if (string.length > 35) {
      lengthJudulBlog[i].innerHTML = string.substring(0, 35) + '...';
    }
  }


  let lengthTitle = document.querySelectorAll('.entry-title');
  for (var i = 0; i < lengthTitle.length; i++) {
    let string = lengthTitle[i].textContent;
    if (string.length > 150) {
      lengthTitle[i].innerHTML = string.substring(0, 150) + '...';
    }
  }
  let lenghtTime = document.querySelectorAll('span.date-post-blog');
  for (var i = 0; i < lenghtTime.length; i++) {
    let string = lenghtTime[i].textContent;
    lenghtTime[i].innerHTML = string.substring(0, 11) + '';
  }
</script>
<?= $this->endSection() ?>