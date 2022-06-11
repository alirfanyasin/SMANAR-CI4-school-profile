<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Gallery</li>
          </ol>
        </div>
        <h4 class="page-title">Gallery</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->
  <button type="button" id="btn-tambah-data-gallery" class="btn text-white mb-3" style="background-color: #3fa400;">Tambah Image</button>



  <div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">

          <h4 class="mt-0 header-title">Daftar Images</h4>

          <div class="view-data-gallery"></div>



        </div>
      </div>
    </div> <!-- end col -->
  </div>
</div>
<div class="view-modal-tambah-gallery" style="display: none;"></div>


<script>
  function data_gallery() {
    $.ajax({
      type: "get",
      url: "<?= base_url('Admin_smanar/Tampilan/get_data_gallery') ?>",
      dataType: "json",
      success: function(response) {
        $('.view-data-gallery').html(response);
      }
    });
  }

  $(document).ready(function() {
    data_gallery();

    $('#btn-tambah-data-gallery').on('click', function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        dataType: 'json',
        url: "<?= base_url('Admin_smanar/Tampilan/form_modal_tambah_gallery') ?>",
        success: function(response) {
          $('.view-modal-tambah-gallery').html(response.modal_tambah_gallery).show();
          $('#modal_tambah_data_gallery').modal('show');
        }
      });

    })

  })
</script>


<?= $this->endSection() ?>