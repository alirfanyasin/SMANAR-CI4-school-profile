<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
        <h4 class="page-title">Dashboard</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->

  <div class="view-data-dashboard"></div>


</div>

<script>
  $.ajax({
    type: "get",
    url: "<?= base_url('Admin_smanar/Dashboard/counting_data') ?>",
    dataType: "json",
    success: function(response) {
      $('.view-data-dashboard').html(response);
    }
  });
</script>
<?= $this->endSection() ?>