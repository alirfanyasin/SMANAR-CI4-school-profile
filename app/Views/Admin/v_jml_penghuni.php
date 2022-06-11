<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Jumlah Penghuni</li>
          </ol>
        </div>
        <h4 class="page-title">Jumlah Penghuni</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->
  <div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">

          <h4 class="mt-0 header-title">Daftar Jumlah Penghuni</h4>

          <div id="view-data"></div>


        </div>
      </div>
    </div> <!-- end col -->
  </div>
</div>

<div class="view-modal-jumpeng" style="display: none;"></div>

<script>
  function data_jumpeng() {

    $.ajax({
      url: '<?= base_url('Admin_smanar/Tampilan/data_penghuni') ?>',
      type: 'get',
      dataType: 'json',
      success: function(response) {
        $('#view-data').html(response);
      }
    })
  }

  $(document).ready(function() {
    data_jumpeng();
  })
</script>
<?= $this->endSection() ?>