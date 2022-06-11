<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Blog</li>
          </ol>
        </div>
        <h4 class="page-title">Blog</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->

  <section id="recent-blog-posts" class="recent-blog-posts" style="margin-bottom: 100px;" data-aos="fade-up">


    <header class="section-header">
      <a href="<?= base64_encode(base_url('Admin_smanar/add_blog')) ?>" class="btn mb-3 text-white" style="background-color: #3fa400;">Tambah Blog</a>
    </header>

    <div class="view-data-blog"></div>


  </section>
</div>

<script>
  function get_blog() {
    $.ajax({
      type: "get",
      url: "<?= base_url('Admin_smanar/Blog/get_blog') ?>",
      dataType: "json",
      success: function(response) {
        $('.view-data-blog').html(response);
      }
    });
  }

  $(document).ready(function() {
    get_blog();
  })
</script>

<?= $this->endSection() ?>