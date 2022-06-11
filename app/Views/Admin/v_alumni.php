<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Alumni</li>
          </ol>
        </div>
        <h4 class="page-title">Alumni</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->

  <button type="button" id="btn-tambah-data-alumni" class="btn mb-3 text-white" style="background-color: #3fa400;">Tambah Alumni</button>
  <!-- <button type="button" id="btn-multiple-tambah-alumni" class="btn btn-warning text-white mb-3">Multiple Tambah</button> -->


  <div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">

          <!-- <h4 class="mt-0 header-title">Daftar Foto</h4> -->

          <div class="view-data-alumni"></div>


        </div>
      </div>
    </div> <!-- end col -->
  </div>
</div>
<div class="view-modal-alumni"></div>


<script>
  function data_alumni() {
    $.ajax({
      url: '<?= base_url('Admin_smanar/Tampilan/data_alumni') ?>',
      type: 'get',
      dataType: 'json',
      success: function(response) {
        $('.view-data-alumni').html(response)
      }
    })
  }

  $(document).ready(function() {
    data_alumni()

    $('#btn-tambah-data-alumni').on('click', function(e) {
      e.preventDefault();

      $.ajax({
        url: '<?= base_url('Admin_smanar/Tampilan/modal_tambah_alumni') ?>',
        type: 'post',
        dataType: 'json',
        success: function(response) {
          $('.view-modal-alumni').html(response.modal).show();
          $('#modal_tambah_data_alumni').modal('show');
        }
      })


    })





    // View Multiple Tambah
    $('#btn-multiple-tambah-alumni').click(function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        url: "<?= base_url('Admin_smanar/Tampilan/form_multiple_tambah_alumni') ?>",
        dataType: "json",
        beforeSend: function() {
          $('.view-data-alumni').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        success: function(response) {
          $('.view-data-alumni').html(response.success);
        }
      });

    })


  })
</script>


<?= $this->endSection() ?>