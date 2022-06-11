<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Hubungi Kami</li>
          </ol>
        </div>
        <h4 class="page-title">Hubungi Kami</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->

  <div class="view-data-hubkam"></div>


</div>

<script>
  // get data hubkam
  function getHubkam() {
    $.ajax({
      type: 'get',
      url: "<?= base_url('Admin_smanar/Tampilan/getDataHubkam') ?>",
      dataType: "json",
      success: function(response) {
        $('.view-data-hubkam').html(response);
      },
      error: function(xhr, ajaxOptions, throwError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError)
      }
    });
  }
  $(document).ready(function() {
    getHubkam()
  })
</script>
<?= $this->endSection() ?>