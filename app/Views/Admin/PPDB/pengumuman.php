<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">PPDB</li>
            <li class="breadcrumb-item active">Pengumuman</li>
          </ol>
        </div>
        <h4 class="page-title">Pengumuman</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">

          <div class="view-atur-pengumuman"></div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function get_atur_pengumuman() {
    $.ajax({
      type: "get",
      url: "<?= base_url('Admin_smanar/PPDB/get_atur_pengumuman') ?>",
      dataType: "json",
      success: function(response) {
        $('.view-atur-pengumuman').html(response);
      }
    });
  }
  $(document).ready(function() {
    get_atur_pengumuman();
  })
</script>
<?= $this->endSection() ?>