<div class="row">
  <?php foreach ($data as $data_blog) : ?>
    <div class="col-lg-4 mt-3">
      <div class="post-box">
        <div class="post-img"><img src="<?= base_url('') ?>/front/assets/img/blog/<?= $data_blog['thumbnail_blog'] ?>" class="img-fluid" alt="" width="100%"></div>
        <span class="post-date"><?= date('d F Y', strtotime($data_blog['created_at']))  ?></span>
        <h3 class="post-title"><?= $data_blog['judul_blog'] ?></h3>
        <a href="<?= base_url('Home/detail_blog/' . $data_blog['slug_blog']); ?>" class="readmore stretched-link mt-auto"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  <?php endforeach; ?>

</div>

<script>
  // Length string
  let lengthTitle = document.querySelectorAll('.post-title');
  for (var i = 0; i < lengthTitle.length; i++) {
    let string = lengthTitle[i].textContent;
    if (string.length > 50) {
      lengthTitle[i].innerHTML = string.substring(0, 50) + '...';
    }
  }
</script>