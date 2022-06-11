<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col profile_detail">


    </div>
  </div>
</div>

<div class="view-modal-edit"></div>
<!-- JS -->
<script>
  function getDataAdmin() {
    $.ajax({
      type: "get",
      url: "<?= base_url('Admin_smanar/Profile/getDataAdmin') ?>",
      dataType: "json",
      success: function(response) {
        $('.profile_detail').html(response);
      }
    });
  }

  $(document).ready(function() {
    getDataAdmin();
  })
</script>


<?= $this->endSection() ?>