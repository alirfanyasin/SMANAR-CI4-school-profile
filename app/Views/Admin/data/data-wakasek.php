<form action="<?= base_url('Admin_smanar/Tampilan/multiple_hapus_wakasek') ?>" method="POST" class="multiple_hapus_wakasek">

  <!-- <button type="submit" id="btn-multiple-hapus-wakasek" class="btn mb-3 btn-danger text-white ">Multiple Hapus</button> -->


  <table id="datatable" class="table table-bordered display nowrap" style="width: 100%;">
    <thead>
      <tr>
        <!-- <th width="10px">
          <input type="checkbox" name="" id="centang_semua">
        </th> -->
        <th>Foto</th>
        <th>Nama Lengkap</th>
        <th>Jabatan</th>
        <th>Sosmed</th>
        <th>Aksi</th>

      </tr>
    </thead>


    <tbody>
      <?php foreach ($wakasek as $waka) : ?>
        <tr>
          <!-- <td width="10px">
            <input type="checkbox" name="id_wakasek[]" class="centang_id_wakasek" value="<?= $waka['id_wakasek'] ?>">
          </td> -->
          <td height="70px"><img src="<?= base_url('Front/assets/img/team/wakasek/' . $waka['foto_wakasek']) ?>" width="60px" alt=""></td>
          <td><?= $waka['nama_wakasek'] ?></td>
          <td><?= $waka['jabatan_wakasek'] ?></td>
          <td>
            <i class="fa fa-whatsapp"></i>
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
          </td>
          <td>
            <button type="button" class="btn btn-warning btn-edit btn-sm" onclick="edit('<?= $waka['id_wakasek'] ?>')">
              <i class="fa fa-edit"></i>
            </button>
            <button type="button" class="btn btn-danger btn-hapus btn-sm" onclick="hapus('<?= $waka['id_wakasek'] ?>')">
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


    // Checkbox Delete
    $('#centang_semua').click(function() {
      if ($(this).is(':checked')) {
        $('.centang_id_wakasek').prop('checked', true);
      } else {
        $('.centang_id_wakasek').prop('checked', false);
      }
    })

    // Multiple Delete Ajax
    $('.multiple_hapus_wakasek').submit(function(e) {
      e.preventDefault();

      let jmlData = $('.centang_id_wakasek:checked');

      if (jmlData.length === 0) {
        swal({
          title: 'Gagal',
          text: "Pilih data yang akan di hapus",
          type: 'error',
          confirmButtonClass: 'btn btn-success',

        })
      } else {


        // swal({
        //   title: 'Apakah  Anda Yakin?',
        //   text: `${jmlData.length} Data akan di hapus`,
        //   type: 'warning',
        //   showCancelButton: true,
        //   confirmButtonClass: 'btn btn-success',
        //   cancelButtonClass: 'btn btn-danger m-l-10',
        //   cancelButtonText: 'Tidak',
        //   confirmButtonText: 'Ya, Hapus!'
        // }).then(function() {
        $.ajax({
          type: 'post',
          url: $(this).attr('action'),
          data: $(this).serialize(),
          dataType: 'json',
          success: function(response) {

            swal({
              title: 'Berhasil',
              text: response,
              type: 'success',
              // confirmButtonClass: 'btn btn-success',
            })
            dataWakasek();

          }
        })
        // })
      }
      return false;
    })
  });


  function edit(id_wakasek) {
    $.ajax({
      type: 'post',
      url: '<?= base_url('Admin_smanar/Tampilan/modal_edit') ?>',
      data: {

        id_wakasek: id_wakasek
      },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          $('.view-modal').html(response.success).show();
          $('#modal-edit').modal('show');
        }
      }
    })
  }

  function hapus(id_wakasek) {

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

        url: '<?= base_url('Admin_smanar/Tampilan/hapus') ?>',
        data: {

          id_wakasek: id_wakasek
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
            dataWakasek();
          }
        }
      })

    })


    return false;
  }
</script>