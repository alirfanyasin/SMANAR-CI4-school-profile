<div class="row">
  <?php foreach ($data_blog as $dablog) : ?>

    <div class=" col-xl-3 col-lg-4 col-md-6 col-12 mt-3">
      <div class="post-box">
        <div class="post-img">
          <img src="<?= base_url('') ?>/front/assets/img/blog/<?= $dablog['thumbnail_blog'] ?>" class="img-fluid" alt="">
          <div class="button-action" style="position: absolute; margin-top: -70%; margin-left: 10px;">
            <!-- <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
          </div>
        </div>
        <span class="post-date"><?= $dablog['created_at'] ?></span>
        <h4 class="post-title"><?= $dablog['judul_blog'] ?></h4>
        <input type="hidden" name="slug_blog" value="<?= $dablog['slug_blog'] ?>">
        <a href="<?= base_url('Admin_smanar/Blog/detail/' . $dablog['slug_blog']) ?>" class="readmore stretched-link mt-auto"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
      </div>
    </div>

  <?php endforeach; ?>


</div>


<script>
  // Date
  let date = document.querySelectorAll('.post-date');
  for (var i = 0; i < date.length; i++) {
    let string = date[i].textContent;

    date[i].innerHTML = string.substring(0, 11);

  }
  // Length string
  let lengthTitle = document.querySelectorAll('.post-title');
  for (var i = 0; i < lengthTitle.length; i++) {
    let string = lengthTitle[i].textContent;
    if (string.length > 45) {
      lengthTitle[i].innerHTML = string.substring(0, 45) + '...';
    }
  }
</script>