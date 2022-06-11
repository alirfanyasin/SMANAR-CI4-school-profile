<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Ekskul</li>
          </ol>
        </div>
        <h4 class="page-title">Ekskul</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->

  <button type="button" id="btn-tambah-data-ekskul" class="btn text-white mb-3" style="background-color: #3fa400;">Tambah Ekskul</button>
  <!-- <button type="button" id="btn-multiple-tambah-ekskul" class="btn text-white btn-warning mb-3">Multiple Tambah</button> -->


  <div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">

          <h4 class="mt-0 header-title">Daftar Ekskul</h4>

          <div class="view-data-ekskul"></div>



        </div>
      </div>
    </div> <!-- end col -->
  </div>
</div>

<div class="view-modal-tambah-data-ekskul" style="display: none;"></div>

<script>
  function data_ekskul() {
    $.ajax({
      url: '<?= base_url('Admin_smanar/Tampilan/data_ekskul') ?>',
      type: 'get',
      dataType: 'json',
      success: function(response) {
        $('.view-data-ekskul').html(response);
      }
    })
  }
  $(document).ready(function() {
    data_ekskul();


    // Request Ajax tambah data
    $('#btn-tambah-data-ekskul').on('click', function(e) {
      e.preventDefault();

      $.ajax({
        url: '<?= base_url('Admin_smanar/Tampilan/modal_tambah_data_ekskul') ?>',
        type: 'post',
        dataType: 'json',
        success: function(response) {
          $('.view-modal-tambah-data-ekskul').html(response.open_modal).show();
          $('#modal_tambah_data_ekskul').modal('show');
        }
      })
      return false;

    });





    // View Multiple Tambah Data Ajax
    $('#btn-multiple-tambah-ekskul').click(function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        url: "<?= base_url('Admin_smanar/Tampilan/form_multiple_tambah_ekskul') ?>",
        dataType: "json",
        beforeSend: function() {
          $('.view-data-ekskul').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        success: function(response) {
          $('.view-data-ekskul').html(response.multiple_tambah_ekskul);
        }
      });
    })


  })
</script>

<?= $this->endSection() ?>