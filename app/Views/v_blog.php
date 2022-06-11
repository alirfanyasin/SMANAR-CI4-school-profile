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

        <article class="entry entry-single">

          <div class="entry-img">
            <img src="<?= base_url() ?>/Front/assets/img/blog/<?= $detail_blog['thumbnail_blog'] ?>" alt="" width="100%" class="img-fluid">
          </div>

          <h2 class="entry-title">
            <h2> <b> <?= $detail_blog['judul_blog'] ?></b></h2>
          </h2>

          <div class="entry-meta">
            <ul class="keterangan text-black">
              <li class="d-flex align-items-center mr-2"><i class="fa-regular fa-user mr-1">&nbsp;</i><?= $penulis['nama_admin'] ?></li>
              <li class="d-flex align-items-center mr-2"><i class="fa-regular fa-clock mr-1"></i>&nbsp; <span class="date-post-blog"><?= date('d F Y', strtotime($detail_blog['created_at']))  ?></span></li>
              <li class="d-flex align-items-center mr-2"><i class="fa-solid fa-list"></i>&nbsp;<?= $detail_blog['kategori_blog'] ?></li>
            </ul>
            <!-- <ul>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
            </ul> -->
          </div>

          <div class="entry-content">
            <p><?= $detail_blog['content_blog'] ?></p>

          </div>

          <!-- <div class="entry-footer">
            <i class="bi bi-folder"></i>
            <ul class="cats">
              <li><a href="#">Business</a></li>
            </ul>

            <i class="bi bi-tags"></i>
            <ul class="tags">
              <li><a href="#">Creative</a></li>
              <li><a href="#">Tips</a></li>
              <li><a href="#">Marketing</a></li>
            </ul>
          </div> -->

        </article>
        <!-- End blog entry -->
        <div class="view-data-result-categori"></div>

      </div>
      <!-- End blog entries list -->

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
                <img src="<?= base_url() ?>/Front/assets/img/blog/<?= $datblog['thumbnail_blog'] ?>" alt="">
                <h4><a href="<?= base_url('Home/detail_blog/' . $datblog['slug_blog']) ?>" class="judul_blog"><?= $datblog['judul_blog'] ?></a></h4>
                <time><span class="date-post-blog"><?= date('d F Y', strtotime($datblog['created_at']))  ?></span></time>
              </div>

            <?php endforeach; ?>


          </div>
          <!-- End sidebar recent posts-->



        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

    </div>

  </div>

</section>

<!-- STYLE CSS -->
<style>
  ul.keterangan {
    display: flex;
    margin-left: -35px;
    justify-content: left;
  }

  /* .keterangan li */

  ul.keterangan li i {
    margin-right: 10px;
  }
</style>

<script>
  let lengthTitle = document.querySelectorAll('.judul_blog');
  for (var i = 0; i < lengthTitle.length; i++) {
    let string = lengthTitle[i].textContent;
    if (string.length > 35) {
      lengthTitle[i].innerHTML = string.substring(0, 35) + '...';
    }
  }
</script>
<?= $this->endSection() ?>