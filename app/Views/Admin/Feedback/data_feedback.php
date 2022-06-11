<div class="row">
  <div class="card-group">
    <?php foreach ($data as $data_feeback) : ?>
      <div class="col-lg-4 col-md-6 col-12 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="header d-flex ">
              <p><?= $data_feeback['email_feedback'] ?></p>
              <button type="button" onclick="hapus('<?= $data_feeback['id_feedback'] ?>')" class="ml-auto text-danger"><i class="fa fa-trash"></i></button>
            </div>
            <p><?= $data_feeback['pesan_feedback'] ?></p>
            <div class="footer-feedback">
              <span><strong><?= $data_feeback['nama_feedback'] ?></strong>(<?= $data_feeback['subjek_feedback'] ?>)</span>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<style>
  button {
    background: none;
    outline: none;
    border: none;
  }
</style>
<script>
  function hapus(id) {
    swal({
      title: 'Apakah  Anda Yakin?',
      text: "Data akan di hapus",
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger m-l-10',
      cancelButtonText: 'Tidak',
      confirmButtonText: 'Ya, Hapus!'
    }).then(function() {
      $.ajax({
        type: "post",
        url: "<?= base_url('Admin_smanar/Feedback/delete_feedback') ?>",
        data: {
          id_feedback: id
        },
        dataType: "json",
        success: function(response) {
          swal({
            title: 'Berhasil',
            text: response.success,
            type: 'success',
            confirmButtonClass: 'btn btn-success',
          })

          get_feedback()
        }
      })
    });
  }
</script>