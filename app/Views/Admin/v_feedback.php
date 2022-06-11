<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Feedback</li>
          </ol>
        </div>
        <h4 class="page-title">Feedback</h4>
      </div>
    </div>
  </div>



  <div class="view-data-feedback"></div>


</div>

<script>
  function get_feedback() {
    $.ajax({
      type: "get",
      url: "<?= base_url('Admin_smanar/Feedback/get_feedback') ?>",
      dataType: "json",
      success: function(response) {
        $('.view-data-feedback').html(response);
      }
    });
  }


  $(document).ready(function() {
    get_feedback()
  })
</script>


<?= $this->endSection() ?>