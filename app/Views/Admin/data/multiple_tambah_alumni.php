<form action="<?= base_url('Admin_smanar/Tampilan/multiple_tambah_alumni') ?>" method="POST" class="multiple-tambah-alumni">
  <button type="button" class="btn btn-dark mb-3 btn-kembali">
    Kembali
  </button>
  <button type="submit" class="btn btn-secondary mb-3 btn-simpan-data-alumni">
    Simpan
  </button>
  <table class="table table-sm table-bordered tbl-multiple-form">
    <thead>
      <tr>
        <th>Image</th>
        <th>Nama Lengkap</th>
        <th>Universitas / Jabatan</th>
        <th>Testimoni</th>
      </tr>
    </thead>
    <tbody class="form-tambah">
      <tr>
        <td>
          <input type="text" name="foto_alumni[]" class="form-control">
        </td>

        <td>
          <input type="text" name="nama_alumni[]" class="form-control">
        </td>

        <td>
          <input type="text" name="jabatan_alumni[]" class="form-control">
        </td>
        <td>
          <textarea name="testimoni_alumni[]" id="" cols="30" rows="5"></textarea>
        </td>
        <!-- <td>
        <input type="number" name="pengikut_ekskul[]" class="form-control">
      </td> -->


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

    // Add multiple data tambah to database
    $('.multiple-tambah-alumni').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
          $('.btn-simpan-data-alumni').attr('disable', 'disabled');
          $('.btn-simpan-data-alumni').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        complete: function() {
          $('.btn-simpan-data-alumni').removeAttr('disable');
          $('.btn-simpan-data-alumni').html('Simpan')
        },
        success: function(response) {
          if (response.success) {
            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            }).then(function() {
              data_alumni();
            })

          }
        }
      });
    });


    // Btn Add Form
    $('.btn-tambah-form').click(function(e) {
      e.preventDefault();

      $('.form-tambah').append(`
      <tr>
        <td>
          <input type="text" name="foto_alumni[]" class="form-control">
        </td>

        <td>
          <input type="text" name="nama_alumni[]" class="form-control">
        </td>

        <td>
          <input type="text" name="jabatan_alumni[]" class="form-control">
        </td>
        <td>
          <textarea name="testimoni_alumni[]" id="" cols="30" rows="5"></textarea>
        </td>
        <!-- <td>
          <input type="number" name="pengikut_ekskul[]" class="form-control">
        </td> -->


        <td>
          <button type="button" class="btn btn-danger btn-hapus-form">
            <i class="fa fa-trash"></i>
          </button>
        </td>

      </tr>
      `)
    })


    $(document).on('click', '.btn-hapus-form', function(e) {
      e.preventDefault();

      $(this).parents('tr').remove();
    })



    // Btn Back
    $('.btn-kembali').click(function(e) {
      e.preventDefault();

      data_alumni();
    })
  });
</script>