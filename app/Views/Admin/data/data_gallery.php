<table id="datatable" class="table table-bordered display nowrap" style="width: 100%;">
  <thead>
    <tr>
      <th>Tumbhnail</th>
      <th>Judul Image</th>
      <th>Kategori</th>
      <th width="100px">Aksi</th>

    </tr>
  </thead>


  <tbody>
    <?php foreach ($data_gallery as $datgal) : ?>
      <tr>
        <td><img src="<?= base_url('Front/assets/img/portfolio/' . $datgal['thumb_gallery']) ?>" width="60px" alt=""></td>
        <td><?= $datgal['judul_gallery'] ?></td>
        <td>
          <div class="badge <?= ($datgal['kategori_gallery'] == 'Prestasi') ? 'badge-success' : 'badge-warning' ?>  <?= ($datgal['kategori_gallery'] == 'Lainnya') ? 'badge-primary' : '' ?>"> <?= $datgal['kategori_gallery'] ?></div>
        </td>
        <td>
          <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $datgal['id_gallery'] ?>')"><i class="fa fa-trash"></i></button>
        </td>

      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      "scrollX": true
    });
  })

  function hapus(id_gallery) {

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
        type: 'post',
        url: '<?= base_url('Admin_smanar/Tampilan/hapus_data_gallery') ?>',
        data: {

          id_gallery: id_gallery
        },
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })
            data_gallery();
          }
        }
      })

    })
  }
</script>