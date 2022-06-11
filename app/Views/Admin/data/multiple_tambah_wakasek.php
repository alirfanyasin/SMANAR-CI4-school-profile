<form action="<?= base_url('Admin_smanar/Tampilan/multiple_tambah_wakasek') ?>" method="POST" class="form_multiple_tambah_wakasek" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <button type="button" class="btn btn-dark mb-3 btn-kembali">
    Kembali
  </button>
  <button type="submit" class="btn btn-secondary mb-3 btn-simpan-data-wakasek">
    Simpan
  </button>
  <table class="table table-sm table-bordered tbl-multiple-form">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Nama Lengkap</th>
        <th>Jabatan</th>
        <th>Sosmed</th>
      </tr>
    </thead>
    <tbody class="form-tambah">
      <tr>
        <td>
          <input type="file" name="foto_wakasek[]" class="form-control foto_wakasek">
          <div class="invalid-feedback error_foto_wakasek"></div>
        </td>

        <td>
          <input type="text" name="nama_wakasek[]" class="form-control">
        </td>

        <td>
          <select class="form-control jabatan_wakasek" name="jabatan_wakasek[]">
            <option value="Waka Kesiswaan">Waka Kesiswaan</option>
            <option value="Waka Kurikulum">Waka Kurikulum</option>
            <option value="Waka Hubungan Masyarakat">Waka Hubungan Masyarakat</option>
            <option value="Waka Sarana & Prasarana">Waka Sarana & Prasarana</option>
          </select>
          <!-- <input type="text" name="jabatan_wakasek[]" class="form-control"> -->
        </td>

        <td>
          <input type="text" name="sosmed_wakasek[]" class="form-control" readonly placeholder="Disable">
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
<!-- Java Scrip -->
<script>
  $(document).ready(function() {

    // Ajax Add
    $('.form_multiple_tambah_wakasek').submit(function(e) {
      e.preventDefault();

      let form = $('.form_multiple_tambah_wakasek')[0];
      let data = new FormData(form);

      $.ajax({
        url: $(this).attr('action'),
        dataType: 'json',
        type: 'post',
        data: data,
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: function() {
          $('.btn-simpan-data-wakasek').attr('disable', 'disabled');
          $('.btn-simpan-data-wakasek').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        complete: function() {
          $('.btn-simpan-data-wakasek').removeAttr('disable');
          $('.btn-simpan-data-wakasek').html('Simpan');
        },
        success: function(response) {
          if (response.error) {
            if (response.error.foto_wakasek) {
              $('.foto_wakasek').addClass('is-invalid');
              $('.error_foto_wakasek').html(response.error.foto_wakasek);
            } else {
              $('.foto_wakasek').removeClass('is-invalid');
              $('.error_foto_wakasek').html('');
            }
          } else {
            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            }).then(function() {

              dataWakasek();
            })
          }

        },
        error: function(xhr, ajaxOptions, throwError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError)
        }
      })
    })




    // Add Element

    $('.btn-tambah-form').click(function(e) {
      e.preventDefault();

      $('.form-tambah').append(`
        <tr>
          <td>
            <input type="file" name="foto_wakasek[]" class="form-control foto_wakasek">
          <div class="invalid-feedback error_foto_wakasek"></div>

          </td>

          <td>
            <input type="text" name="nama_wakasek[]" class="form-control">
          </td>

          <td>
            <select class="form-control jabatan_wakasek" name="jabatan_wakasek[]">
              <option value="Waka Kesiswaan">Waka Kesiswaan</option>
              <option value="Waka Kurikulum">Waka Kurikulum</option>
              <option value="Waka Hubungan Masyarakat">Waka Hubungan Masyarakat</option>
              <option value="Waka Sarana & Prasarana">Waka Sarana & Prasarana</option>
            </select>
          </td>

          <td>
            <input type="text" name="sosmed_wakasek[]" class="form-control" readonly placeholder="Disable">
          </td>


          <td>
            <button type="button" class="btn btn-danger btn-hapus-form">
              <i class="fa fa-trash"></i>
            </button>
          </td>

        </tr>
      `);

    });





  });

  // remove row form 
  $(document).on('click', '.btn-hapus-form', function(e) {
    e.preventDefault();

    $(this).parents('tr').remove();
  })

  // btn back
  $('.btn-kembali').click(function(e) {
    e.preventDefault();
    dataWakasek();
  })
</script>