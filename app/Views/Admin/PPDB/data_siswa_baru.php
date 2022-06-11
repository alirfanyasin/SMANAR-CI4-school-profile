<!-- data siswa -->
<table id="example" class="table table-bordered display nowrap dataTables_wrapper" style="width:100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Lengkap</th>
      <th>Jenis Kelamin</th>
      <th>Asal Sekolah</th>
      <th>Jurusan</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>


  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($data_siswa as $ds) : ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $ds['nama_lengkap'] ?></td>
        <td><?= $ds['jenis_kelamin'] ?></td>
        <td><?= $ds['asal_sekolah'] ?></td>
        <td><?= $ds['jurusan'] ?></td>
        <td><span class="badge <?= ($ds['status'] === '0' || $ds['status'] === NULL) ? 'badge-warning' : '' ?><?= ($ds['status'] === '1') ? 'badge-success' : '' ?><?= ($ds['status'] === '2') ? 'badge-danger' : '' ?>">
            <?= ($ds['status'] === '0' || $ds['status'] === NULL) ? 'Belum Dikonfirmasi' : '' ?>
            <?= ($ds['status'] === '1') ? 'Diterima' : '' ?>
            <?= ($ds['status'] === '2') ? 'Ditolak' : '' ?>
          </span> </td>
        <td>
          <button type="button" onclick="biodata_siswa('<?= $ds['id_siswa_baru'] ?>')" class="btn btn-success"><i class="fa fa-eye"></i></button>
          <button type="button" class="btn btn-danger" onclick="hapus_biodata('<?= $ds['id_siswa_baru'] ?>')"><i class="fa fa-trash"></i></button>

        </td>
      </tr>
      <?php $no++ ?>
    <?php endforeach; ?>
  </tbody>
</table>




<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "scrollX": true
    });
  })

  function biodata_siswa(id_siswa_baru) {
    // alert(id_siswa_baru);
    $.ajax({
      type: "get",
      url: "<?= base_url('Admin_smanar/PPDB/get_biodata_siswa') ?>",
      data: {
        id_siswa_baru: id_siswa_baru
      },
      dataType: "json",
      success: function(response) {
        $('.view-biodata-siswa').html(response.success).show();
        $('#modal-biodata-siswa').modal('show');

      }
    });
  }

  function hapus_biodata(id_siswa_baru) {
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
        url: '<?= base_url('Admin_smanar/PPDB/delete_biodata') ?>',
        data: {
          id_siswa_baru: id_siswa_baru
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
            get_siswa();
          }
        }
      })

    })
  }
</script>