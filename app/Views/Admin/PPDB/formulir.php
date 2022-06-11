<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Form Setting</li>
          </ol>
        </div>
        <h4 class="page-title">Form Setting</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->

  <button type="button" id="btn-tambah-form-input" class="btn mb-3 text-white" style="background-color: #3fa400;">Tambah Form Input</button>

  <div class="data-input"></div>
  <div class="view-modal-form-setting"></div>

</div>


<script>
  // GET DATA INPUT
  function get_input() {
    $.ajax({
      type: "get",
      url: "<?= base_url('Admin_smanar/Form/get_data_input') ?>",
      dataType: "json",
      success: function(response) {
        $('.data-input').html(response);
      }
    });
  }
  // Modal Form Setting
  $(document).ready(function() {

    // setInterval(function() {

    // }, 1000)
    get_input()
    $('#btn-tambah-form-input').on('click', function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        url: "<?= base_url('Admin_smanar/Form/modal_tambah_input_form') ?>",
        dataType: "json",
        success: function(response) {
          $('.view-modal-form-setting').html(response.open_modal).show();
          $('#modal-tambah-form-input').modal('show')
        }
      });
      return false;
    })

  })
</script>
<?= $this->endSection() ?>