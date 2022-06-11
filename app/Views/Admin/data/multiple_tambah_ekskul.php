<form action="<?= base_url('Admin_smanar/Tampilan/multiple_tambah_ekskul') ?>" method="POST" class="multiple_tambah_ekskul">
  <?= csrf_field() ?>
  <button type="button" class="btn btn-dark mb-3 btn-kembali">
    Kembali
  </button>
  <button type="submit" class="btn btn-secondary mb-3 btn-simpan-data-ekskul">
    Simpan
  </button>
  <table class="table table-sm table-bordered tbl-multiple-form">
    <thead>
      <tr>
        <th>Thumbnil</th>
        <th>Nama Ekskul</th>
        <th>Pembina</th>
        <th>Pengikut</th>
      </tr>
    </thead>
    <tbody class="form-tambah">
      <tr>
        <td>
          <input type="text" name="foto_ekskul[]" class="form-control">
        </td>

        <td>
          <input type="text" name="nama_ekskul[]" class="form-control">
        </td>

        <td>
          <input type="text" name="pembina_ekskul[]" class="form-control">
        </td>

        <td>
          <input type="number" name="pengikut_ekskul[]" class="form-control">
        </td>


        <td>
          <button type="button" class="btn btn-primary btn-tambah-form">
            <i class="fa fa-plus"></i>
          </button>
        </td>

      </tr>
    </tbody>
  </table>
</form>

<script>
  $(document).ready(function() {

    // Add data with ajax
    $('.multiple_tambah_ekskul').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
          $('.btn-simpan-data-ekskul').attr('disable', 'disabled');
          $('.btn-simpan-data-ekskul').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        complete: function() {
          $('.btn-simpan-data-ekskul').removeAttr('disable');
          $('.btn-simpan-data-ekskul').html('Simpan');
        },
        success: function(response) {
          if (response.success) {
            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            }).then(function() {
              data_ekskul();
            })

          }

        }
      });



    })















    // Btn Add Form
    $('.btn-tambah-form').click(function(e) {
      e.preventDefault();

      $('.form-tambah').append(`
      <tr>
        <td>
          <input type="text" name="foto_ekskul[]" class="form-control">
        </td>

        <td>
          <input type="text" name="nama_ekskul[]" class="form-control">
        </td>

        <td>
          <input type="text" name="pembina_ekskul[]" class="form-control">
        </td>

        <td>
          <input type="number" name="pengikut_ekskul[]" class="form-control" >
        </td>


        <td>
          <button type="button" class="btn btn-danger btn-hapus-form">
            <i class="fa fa-trash"></i>
          </button>
        </td>

    </tr>
      
      `)
    })

    // Btn Hapus Form Add
    $(document).on('click', '.btn-hapus-form', function(e) {
      e.preventDefault();

      $(this).parents('tr').remove();
    })


    // Btn Back
    $('.btn-kembali').click(function(e) {
      e.preventDefault();

      data_ekskul();
    })
  })
</script>