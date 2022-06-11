<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="#">PPDB</a></li>
            <li class="breadcrumb-item active">Pendaftaran</li>
          </ol>
        </div>
        <h4 class="page-title">Pendaftaran</h4>
      </div>
    </div>
  </div>


  <div class="card" style="margin-bottom: 100px;">
    <div class="card-body">

      <div class="view-data-pendaftaran"></div>
    </div>
  </div>
</div>


<script>
  function get_data() {
    $.ajax({
      type: "get",
      url: "<?= base_url('Admin_smanar/PPDB/get_data_pendaftaran') ?>",
      dataType: "json",
      success: function(response) {
        $('.view-data-pendaftaran').html(response);

      }
    });
  }

  $(document).ready(function() {
    get_data();
  })
</script>
<?= $this->endSection() ?>