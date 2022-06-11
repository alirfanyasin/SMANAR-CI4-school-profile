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
            <li class="breadcrumb-item active">Data Siswa</li>
          </ol>
        </div>
        <h4 class="page-title">Data Siswa</h4>
      </div>
    </div>
  </div>


  <!-- Content Start-->
  <div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">


          <div class="view-data-siswa-baru"></div>
        </div>
      </div>
    </div> <!-- end col -->
  </div>
  <!-- Content End-->

</div>

<div class="view-biodata-siswa" style="display: none; "></div>


<script>
  function get_siswa() {
    $.ajax({
      type: "get",
      url: "<?= base_url('Admin_smanar/PPDB/get_data_siswa_baru') ?>",
      dataType: "json",
      success: function(response) {
        $('.view-data-siswa-baru').html(response);
      }
    });
  }

  $(document).ready(function() {
    get_siswa();
  })
</script>
<?= $this->endSection() ?>