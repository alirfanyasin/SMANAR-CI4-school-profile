<?php

$db = \Config\Database::connect();

$pengumuman = $db->table('tbl_pengumuman')->get()->getRowArray();

?>
<form action="<?= base_url('Admin_smanar/PPDB/update_pengumuman') ?>" method="POST" class="form-atur-pengumuman">
  <div class="row">
    <div class="col-12">
      <div class="alert alert-warning text-dark" role="alert">
        Atur tanggal dan waktu pengumuman untuk memberikan informasi kepada para pendaftar kapan akan di umumkan!. Pastikan <b> pengumuman di buka</b> pada saat pendaftaran sudah di tutup.
      </div>
      <h1 id="countdown" class="text-center"></h1> <br>
    </div>

    <input type="hidden" name="status_pengumuman" value="<?= ($atur['status_pengumuman'] == 'Aktif') ? 'Non Aktif' : 'Aktif' ?>">
    <div class="col-md-6">
      <div class="form-group">
        <label for="atur_tanggal">Atur Tanggal</label>
        <input type="date" name="tanggal_pengumuman" id="atur_tanggal" value="<?= $atur['tanggal_pengumuman'] ?>" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="atur_waktu">Atur Waktu</label>
        <input type="time" name="waktu_pengumuman" id="atur_waktu" value="<?= $atur['waktu_pengumuman'] ?>" class="form-control">
      </div>
    </div>
  </div>
  <div class="row d-flex justify-content-center">
    <button type="submit" id="btn-pengumuman" class="btn text-white text-center" style="background-color: <?= ($atur['status_pengumuman'] == 'Aktif') ? '#df4759' : '#3fa400' ?>;"><?= ($atur['status_pengumuman'] == 'Aktif') ? 'Tutup Pengumuman' : 'Buka Pengumuman' ?></button>
  </div>
</form>

<script>
  $(document).ready(function() {
    $('.form-atur-pengumuman').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: "json",

        success: function(response) {
          if (response.success) {
            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })
            get_atur_pengumuman();
          }
        }
      });
      return false;

    })




  })
</script>