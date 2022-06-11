<form action="<?= base_url('Admin_smanar/PPDB/update_pendaftaran') ?>" enctype="multipart/form-data" method="POST" class="form-open-pendaftaran">
  <?php foreach ($data_pendaftaran as $dapen) : ?>

    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="ta">Tahun Ajaran</label>
          <input type="text" name="tahun_ajaran_pendaftaran" class="form-control" id="ta" value="<?= $dapen['tahun_ajaran_pendaftaran'] ?>" placeholder="Contoh : 2021/2022">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="">Status</label>
          <input type="text" name="status_pendaftaran" class="form-control" readonly value="<?= ($dapen['status_pendaftaran'] == 'Belum di buka') ? 'Sudah di buka' : 'Belum di buka' ?>" id="">
        </div>
      </div>

      <div class="row d-flex justify-content-center">

        <button type="submit" id="btn-pendaftaran" class="btn text-white text-center display nowrap" style="background-color:  <?= ($dapen['status_pendaftaran'] == 'Belum di buka') ? '#df4759' : '#3fa400' ?>; "><?= ($dapen['status_pendaftaran'] == 'Belum di buka') ? 'Tutup Pendaftaran' : 'Buka Pendaftaran' ?></button>

      </div>
    </div>
  <?php endforeach; ?>
</form>

<script>
  $(document).ready(function() {
    $('.form-open-pendaftaran').submit(function(e) {
      e.preventDefault()
      $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: "json",
        success: function(response) {
          swal({
            title: 'Berhasil',
            text: response.success,
            type: 'success',
            confirmButtonClass: 'btn btn-success',
          })
          get_data();
        }
      });


    })
  })
</script>