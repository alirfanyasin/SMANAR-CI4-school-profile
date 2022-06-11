<form action="<?= base_url('Admin_smanar/Tampilan/multiple_hapus_ekskul') ?>" method="POST" class="multiple_hapus_ekskul">
  <!-- <button type="submit" id="btn-multiple-hapus-ekskul" class="btn mb-3 btn-danger text-white ">Multiple Hapus</button> -->

  <table id="datatable" class="table table-bordered display nowrap" style="width: 100%;">
    <thead>
      <tr>
        <!-- <th width="10px">
          <input type="checkbox" id="centang_semua">
        </th> -->
        <th>Tumbhnail</th>
        <th>Nama Ekskul</th>
        <th>Pembina</th>
        <th>Pengikut</th>
        <th>Aksi</th>

      </tr>
    </thead>


    <tbody>
      <?php foreach ($data_ekskul as $dakul) : ?>
        <tr>
          <!-- <td width="10px">
            <input type="checkbox" name="id_ekskul[]" class="centang_id_ekskul" value="<?= $dakul['id_ekskul'] ?>">
          </td> -->
          <td><img src="<?= base_url('Front/assets/img/team/ekskul/' . $dakul['foto_ekskul']) ?>" width="60px" alt=""></td>
          <td><?= $dakul['nama_ekskul'] ?></td>
          <td><?= $dakul['pembina_ekskul'] ?></td>
          <td><?= $dakul['pengikut_ekskul'] ?></td>
          <td>
            <button type="button" class="btn btn-sm btn-warning" onclick="edit('<?= $dakul['id_ekskul'] ?>')">
              <i class="fa fa-edit"></i>
            </button>
            <button type="button" class="btn btn-sm btn-danger" onclick="hapus('<?= $dakul['id_ekskul'] ?>')">
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


    // Checkbox delete
    $('#centang_semua').click(function() {
      if ($(this).is(':checked')) {
        $('.centang_id_ekskul').prop('checked', true)
      } else {
        $('.centang_id_ekskul').prop('checked', false)

      }
    })




    // Delete data ekskul with ajax
    $('.multiple_hapus_ekskul').submit(function(e) {
      e.preventDefault();

      let jmlData = $('.centang_id_ekskul:checked');

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
            data_ekskul();
          }
        });
      }


    })



  })


  function edit(id_ekskul) {
    $.ajax({
      url: '<?= base_url('Admin_smanar/Tampilan/modal_edit_ekskul') ?>',
      type: 'post',
      dataType: 'json',
      data: {
        id_ekskul: id_ekskul
      },
      success: function(response) {
        if (response.success) {
          $('.view-modal-tambah-data-ekskul').html(response.success).show();
          $('#modal_edit_data_ekskul').modal('show');
        }
      }
    })
  }

  function hapus(id_ekskul) {
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
        url: '<?= base_url('Admin_smanar/Tampilan/hapus_data_ekskul') ?>',
        data: {

          id_ekskul: id_ekskul
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
            data_ekskul();
          }
        }
      })

    })
    return false;
  }
</script>