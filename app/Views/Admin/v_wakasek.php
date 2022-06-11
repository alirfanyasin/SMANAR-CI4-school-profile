<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Wakasek</li>
          </ol>
        </div>
        <h4 class="page-title">Wakasek</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->

  <header class="section-header">

    <button type="button" id="btn-tambah-data" class="btn mb-3 text-white btn-add" style="background-color: #3fa400;">Tambah Wakasek</button>
    <!-- <button type="button" id="btn-multiple-tambah-wakasek" class="btn mb-3 btn-warning text-white btn-add">Multiple Tambah</button> -->

  </header>

  <div class="row">
    <div class="col-12">
      <div class="card m-b-30">
        <div class="card-body">

          <h4 class="mt-0 header-title">Daftar Wakil Kepala Sekolah</h4>

          <div id="data-wakasek"></div>
        </div>
      </div>
    </div> <!-- end col -->
  </div>
</div>

<!-- Modal Tambah Data Start -->
<div class="view-modal" style="display: none;"></div>

<!-- Modal Tambah Data End -->
<style>
  form .row .col-md-8 input:focus,
  form .row .col-md-8 select:focus {
    border-color: #3fa400;
  }

  form .row .col-md-8 select option:focus {
    background-color: #3fa400;
  }
</style>



<script>
  //  File Reader
  var openFile = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function() {
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };



  // AJAX

  function dataWakasek() {
    $.ajax({
      url: '<?= base_url('Admin_smanar/Tampilan/data_wakasek') ?>',
      type: 'get',
      dataType: 'json',
      success: function(response) {
        $('#data-wakasek').html(response);
      }
    })
  }


  $(document).ready(function() {

    dataWakasek();

    // Tambah data
    $('#btn-tambah-data').on('click', function(e) {
      e.preventDefault();
      $.ajax({
        url: '<?= base_url('Admin_smanar/Tampilan/tambah_data_wakasek') ?>',
        dataType: 'json',
        success: function(response) {
          // Tampilakn Modal
          $('.view-modal').html(response.data).show();

          // Tampilkan modal 
          $('#modal-tambah').modal('show');

        }
      })
    });



    // Mutiple Tambah DATA
    $('#btn-multiple-tambah-wakasek').click(function(e) {
      e.preventDefault()

      $.ajax({
        type: "post",
        url: "<?= base_url('Admin_smanar/Tampilan/form_multiple_tambah_wakasek') ?>",
        dataType: "json",
        beforeSend: function() {
          $('#data-wakasek').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        success: function(response) {
          $('#data-wakasek').html(response.multiple_tambah).show();
        }
      });
    })
  })


  // Tambah Data
</script>
<?= $this->endSection() ?>