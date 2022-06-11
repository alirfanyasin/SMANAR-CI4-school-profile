<!-- Modal -->
<div class="modal fade" id="modal-edit-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Admin_smanar/Profile/update_data_profile') ?>" method="POST" class="form_edit_data_profile">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <input type="hidden" name="id_admin" value="<?= $id_admin ?>">

              <div class="form-group">
                <label for="nama_admin">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?= $nama_admin ?>">
                <div class="invalid-feedback error_nama_admin"></div>
              </div>
              <div class="form-group">
                <label for="password_admin">Password</label>
                <input type="password" class="form-control" id="password_admin" name="password_admin" value="<?= $password_admin ?>">
                <div class="invalid-feedback error_password_admin"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email_admin">Alamat Email</label>
                <input type="email" class="form-control" id="email_admin" name="email_admin" value="<?= $email_admin ?>">
                <div class="invalid-feedback error_email_admin"></div>

              </div>
              <!-- <div class="form-group">
                <label for="password_admin">Password</label>
                <input type="password" class="form-control" id="password_admin" name="password_admin" value="<?= $password_admin ?>">
              </div> -->
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btn-simpan">Update</button>
        </div>

      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $('.form_edit_data_profile').submit(function(e) {
      e.preventDefault();

      $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() {
          $('#btn-simpan').attr('disable', 'disabled')
          $('#btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        complete: function() {
          $('#btn-simpan').removeAttr('disable')
          $('#btn-simpan').html('Update')
        },
        success: function(response) {
          if (response.error) {
            if (response.error.nama_admin) {
              $('#nama_admin').addClass('is-invalid');
              $('.error_nama_admin').html(response.error.nama_admin);
            } else {
              $('#nama_admin').removeClass('is_invalid')
            }
            if (response.error.email_admin) {
              $('#email_admin').addClass('is-invalid');
              $('.error_email_admin').html(response.error.email_admin);
            } else {
              $('#email_admin').removeClass('is_invalid')
            }
            if (response.error.password_admin) {
              $('#password_admin').addClass('is-invalid');
              $('.error_password_admin').html(response.error.password_admin);
            } else {
              $('#password_admin').removeClass('is_invalid')
            }


          } else {

            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })

            $('#modal-edit-profile').modal('hide');
            getDataAdmin();
          }

        }

      })

    })
  })
</script>