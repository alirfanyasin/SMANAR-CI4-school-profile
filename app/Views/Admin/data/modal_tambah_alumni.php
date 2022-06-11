<!-- Modal -->
<div class="modal fade" id="modal_tambah_data_alumni" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="POST" class="form_tambah_data_alumni" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label for="nama_alumni">Nama Alumni</label>
                <input type="text" name="nama_alumni" class="form-control" id="nama_alumni">
                <div class="invalid-feedback error_nama_alumni"></div>
              </div>

              <div class="form-group">
                <label for="jabatan_alumni">Jabatan</label>
                <input type="text" class="form-control" id="jabatan_alumni" name="jabatan_alumni">
                <div class="invalid-feedback error_jabatan_alumni"></div>
              </div>
              <div class="form-group">
                <label for="testimoni_alumni">Testimoni</label>
                <textarea name="testimoni_alumni" class="form-control" maxlength="300" minlength="0" id="testimoni_alumni" cols="30" rows="7"></textarea>
                <div class="invalid-feedback error_testimoni_alumni"></div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="foto_alumni">Foto</label>
                <div class="img" id="image_demo"></div>
                <div class="form-group">
                  <input type="file" class="form-control" id="foto_alumni" name="foto_alumni" accept="image/*">
                  <div class="invalid-feedback error_foto_alumni">
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn text-white" style="background-color: #3fa400;" id="btn-simpan">Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    // Croppie Library
    $image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 198,
        height: 198,
        type: 'square'
      },
      boundary: {
        width: 200,
        height: 200
      }
    });

    // File Reader
    $('#foto_alumni').on('change', function() {
      var reader = new FileReader();
      reader.onload = function(event) {
        $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function() {
          console.log('Jquery bind complete')
        })
      }

      reader.readAsDataURL(this.files[0]);
    });

    // AJAX CREATE
    $('#btn-simpan').click(function() {

      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(image) {
        // Get value input
        var nama_alumni = $('#nama_alumni').val();
        var jabatan_alumni = $('#jabatan_alumni').val();
        var testimoni_alumni = $('#testimoni_alumni').val();
        // Run AJAX
        $.ajax({
          type: "post",
          url: "<?= base_url('Admin_smanar/Tampilan/simpan_data_alumni') ?>",
          data: {
            "image": image,
            "nama_alumni": nama_alumni,
            "jabatan_alumni": jabatan_alumni,
            "testimoni_alumni": testimoni_alumni
          },
          dataType: "json",
          beforeSend: function() {
            $('#btn-simpan').attr('disable', 'disabled');
            $('#btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>')
          },
          complete: function() {
            $('#btn-simpan').removeAttr('disable');
            $('#btn-simpan').html('Simpan');
          },
          success: function(response) {
            // Validation
            if (response.error) {
              if (response.error.nama_alumni) {
                $('#nama_alumni').addClass('is-invalid');
                $('.error_nama_alumni').html(response.error.nama_alumni);
              } else {
                $('#nama_alumni').removeClass('is-invalid')
              }
              if (response.error.jabatan_alumni) {
                $('#jabatan_alumni').addClass('is-invalid');
                $('.error_jabatan_alumni').html(response.error.jabatan_alumni);
              } else {
                $('#jabatan_alumni').removeClass('is-invalid')
              }
              if (response.error.testimoni_alumni) {
                $('#testimoni_alumni').addClass('is-invalid');
                $('.error_testimoni_alumni').html(response.error.testimoni_alumni);
              } else {
                $('#testimoni_alumni').removeClass('is-invalid')
              }
              if (response.error.foto_alumni) {
                $('#foto_alumni').addClass('is-invalid');
                $('.error_foto_alumni').html(response.error.foto_alumni);
              } else {
                $('#foto_alumni').removeClass('is-invalid')
              }
            } else {
              // Success SWAL
              swal({
                title: 'Berhasil',
                text: response.success,
                type: 'success',
                confirmButtonClass: 'btn btn-success',
              })

              // Close Modal after create data
              $('#modal_tambah_data_alumni').modal('hide');
              // Run Function == refresh
              data_alumni();
            }
          }
        });

      })
      return false;

    })

  })
</script>