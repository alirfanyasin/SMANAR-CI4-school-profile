<!-- Modal -->
<div class="modal fade" id="modal_edit_data_ekskul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Admin_smanar/Tampilan/update_data_ekskul') ?>" method="POST" enctype="multipart/form-data" class="form_edit_data_ekskul">
        <?= csrf_field(); ?>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_ekskul">Nama Ekskul</label>
                <input type="hidden" name="id_ekskul" id="id_ekskul" value="<?= $id_ekskul ?>">
                <input type="text" name="nama_ekskul" class="form-control" id="nama_ekskul" value="<?= $nama_ekskul ?>">

              </div>

              <div class="form-group">
                <label for="pembina_ekskul">Pembina</label>
                <input type="text" class="form-control" id="pembina_ekskul" name="pembina_ekskul" value="<?= $pembina_ekskul ?>">
              </div>
              <div class="form-group">
                <label for="pengikut_ekskul">Pengikut</label>
                <input type="number" class="form-control" id="pengikut_ekskul" name="pengikut_ekskul" value="<?= $pengikut_ekskul ?>">
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="foto_ekskul">Foto</label>
                <div class="image_demo_croppie">
                  <img src="<?= base_url('Front/assets/img/team/ekskul/' . $foto_ekskul) ?>" id="image_demo" width="100%" class="mb-4" alt="">
                </div>
                <input type="file" class="form-control" id="foto_ekskul" name="foto_ekskul" accept="image/*">

              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="btn-update" style="background-color: #3fa400;">Update</button>
        </div>

      </form>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {

    // Croopie JS
    $image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 330,
        height: 220,
        type: 'square'
      },
      boundary: {
        width: 350,
        height: 250
      }
    });
    // File Reader
    $('#foto_ekskul').on('change', function() {
      var reader = new FileReader();
      reader.onload = function(event) {
        $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function() {
          console.log('Jquery bind complete')
        })
      }
      reader.readAsDataURL(this.files[0]);

    })


    // Ajax Insert
    $('#btn-update').click(function() {
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(image) {
        var id_ekskul = $('#id_ekskul').val();
        var nama_ekskul = $('#nama_ekskul').val();
        var pembina_ekskul = $('#pembina_ekskul').val();
        var pengikut_ekskul = $('#pengikut_ekskul').val();

        $.ajax({
          type: "post",
          url: "<?= base_url('Admin_smanar/Tampilan/update_data_ekskul') ?>",
          data: {
            "foto_ekskul": image,
            "nama_ekskul": nama_ekskul,
            "pembina_ekskul": pembina_ekskul,
            "pengikut_ekskul": pengikut_ekskul,
            "id_ekskul": id_ekskul,

          },
          dataType: "json",
          beforeSend: function() {
            $('#btn-update').attr('disable', 'disabled')
            $('#btn-update').html('<i class="fa fa-spin fa-spinner"></i>')
          },
          complete: function() {
            $('#btn-update').removeAttr('disable')
            $('#btn-update').html('Update')
          },
          success: function(response) {


            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })

            $('#modal_edit_data_ekskul').modal('hide');
            data_ekskul();


          },
          error: function(xhr, ajaxOptions, throwError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError)
          }
        });

      })
      return false;

    })

  })
</script>