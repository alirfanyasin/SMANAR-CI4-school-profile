<form action="<?= base_url('Admin_smanar/Tampilan/multiple_hapus_alumni') ?>" method="POST" class="multiple_hapus_alumni">
  <!-- <button type="submit" id="btn-multiple-hapus-alumni" class="btn mb-3 btn-danger text-white ">Multiple Hapus</button> -->

  <table id="datatable" class="table table-bordered display nowrap" style="width: 100%;">
    <thead>
      <tr>
        <!-- <th>
          <input type="checkbox" name="id_alumni[]" class="centang_semua">
        </th> -->
        <th>Tumbhnail</th>
        <th>Nama Lengkap</th>
        <th>Universitas / Jabatan</th>
        <th>Testimoni</th>
        <th width="100px">Aksi</th>

      </tr>
    </thead>


    <tbody>
      <?php foreach ($alumni as $datlum) : ?>
        <tr>
          <!-- <td>
            <input type="checkbox" name="id_alumni[]" id="" class="centang_id_alumni" value="<?= $datlum['id_alumni'] ?>">
          </td> -->
          <td><img src="<?= base_url('Front/assets/img/team/alumni/' . $datlum['foto_alumni']) ?>" width="60px" alt=""></td>
          <td><?= $datlum['nama_alumni'] ?></td>
          <td><?= $datlum['jabatan_alumni'] ?></td>
          <td class="wrap"><?= $datlum['testimoni_alumni'] ?></td>
          <td>
            <button type="button" class="btn btn-sm btn-warning" onclick="edit('<?= $datlum['id_alumni'] ?>')">
              <i class="fa fa-edit"></i>
            </button>
            <button type="button" class="btn btn-sm btn-danger" onclick="hapus('<?= $datlum['id_alumni'] ?>')">
              <i class="fa fa-trash"></i>
            </button>

          </td>

        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</form>

<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      "scrollX": true
    });




    // Checklist id_alumni delete
    $('.centang_semua').click(function(e) {

      if ($(this).is(':checked')) {
        $('.centang_id_alumni').prop('checked', true)
      } else {
        $('.centang_id_alumni').prop('checked', false)
      }
    })


    // Delete data with multiple delete
    $('.multiple_hapus_alumni').submit(function(e) {
      e.preventDefault();

      let jmlData = $('.centang_id_alumni:checked');
      if (jmlData.length === 0) {
        swal({
          title: 'Gagal',
          text: "Pilih data yang akan di hapus",
          type: 'error',
          confirmButtonClass: 'btn btn-success',

        })
      } else {

        $.ajax({
          type: "post",
          url: $(this).attr('action'),
          data: $(this).serialize(),
          dataType: "json",
          success: function(response) {
            swal({
              title: 'Berhasil',
              text: response,
              type: 'success',
              confirmButtonClass: 'btn btn-success',

            })
            data_alumni();
          }

        })
      };
    })
  })


  function edit(id_alumni) {
    $.ajax({
      url: '<?= base_url('Admin_smanar/Tampilan/modal_edit_alumni') ?>',
      type: 'post',
      dataType: 'json',
      data: {
        id_alumni: id_alumni
      },
      success: function(response) {
        if (response.success) {
          $('.view-modal-alumni').html(response.success).show();
          $('#modal_edit_data_alumni').modal('show');
        }
      }
    })
  }


  function hapus(id_alumni) {
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
        url: '<?= base_url('Admin_smanar/Tampilan/hapus_data_alumni') ?>',
        data: {

          id_alumni: id_alumni
        },
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            swal({
              title: 'Anda Sudah Terdaftar',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })
            data_alumni();
          }
        }
      })

    })
    return false;

  }
</script>