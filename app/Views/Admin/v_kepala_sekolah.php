<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Kepala Sekolah</li>
          </ol>
        </div>
        <h4 class="page-title">Kepala Sekolah</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->


  <div id="data-kepsek">

  </div>

  <style>
    .profile input:focus,
    .profile textarea:focus {
      border: 1px solid #3fa400;
    }
  </style>
  <script>
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

    function dataKepsek() {
      $.ajax({
        url: '<?= base_url('Admin_smanar/Tampilan/data_kepsek') ?>',
        dataType: 'json',

        success: function(res) {
          $('#data-kepsek').html(res);
        }
      })
    }

    // Ajax Get Data
    $(document).ready(function() {
      dataKepsek()
    })
  </script>
  <?= $this->endSection() ?>