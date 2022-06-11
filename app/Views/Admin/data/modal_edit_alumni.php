<!-- Modal -->
<div class="modal fade" id="modal_edit_data_alumni" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Admin_smanar/Tampilan/update_data_alumni') ?>" method="POST" enctype="multipart/form-data" class="form_edit_data_alumni">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label for="nama_alumni">Nama Alumni</label>
                <input type="hidden" name="id_alumni" id="id_alumni" value="<?= $id_alumni ?>">
                <input type="text" name="nama_alumni" class="form-control" id="nama_alumni" value="<?= $nama_alumni ?>">

              </div>

              <div class="form-group">
                <label for="jabatan_alumni">Jabatan</label>
                <input type="text" class="form-control" id="jabatan_alumni" name="jabatan_alumni" value="<?= $jabatan_alumni ?>">
              </div>
              <div class="form-group">
                <label for="testimoni_alumni">Testimoni</label>
                <textarea name="testimoni_alumni" class="form-control" maxlength="300" id="testimoni_alumni" aria-valuenow="<?= $testimoni_alumni ?>" cols="30" rows="7"><?= $testimoni_alumni ?></textarea>

              </div>

            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="foto_alumni">Foto</label>
                <div class="img">
                  <img src="<?= base_url('Front/assets/img/team/alumni/' . $foto_alumni) ?>" id="image_demo" width="100%" class="mb-4" alt="">
                </div>
                <input type="file" class="form-control" id="foto_alumni" name="foto_alumni" accept="image/*">
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn text-white" style="background-color: #3fa400;" id="btn-update">Update</button>
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
    $('#btn-update').click(function() {

      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(image) {
        // Get value input
        var nama_alumni = $('#nama_alumni').val();
        var jabatan_alumni = $('#jabatan_alumni').val();
        var testimoni_alumni = $('#testimoni_alumni').val();
        var id_alumni = $('#id_alumni').val();
        // Run AJAX
        $.ajax({
          type: "post",
          url: "<?= base_url('Admin_smanar/Tampilan/update_data_alumni') ?>",
          data: {
            "image": image,
            "nama_alumni": nama_alumni,
            "jabatan_alumni": jabatan_alumni,
            "testimoni_alumni": testimoni_alumni,
            "id_alumni": id_alumni,
          },
          dataType: "json",
          beforeSend: function() {
            $('#btn-update').attr('disable', 'disabled');
            $('#btn-update').html('<i class="fa fa-spin fa-spinner"></i>')
          },
          complete: function() {
            $('#btn-update').removeAttr('disable');
            $('#btn-update').html('Update');
          },
          success: function(response) {

            // Success SWAL
            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })

            // Close Modal after create data
            $('#modal_edit_data_alumni').modal('hide');
            // Run Function == refresh
            data_alumni();

          }
        });

      })

    })

  })
</script>