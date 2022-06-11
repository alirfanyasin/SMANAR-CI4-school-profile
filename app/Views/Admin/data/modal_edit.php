<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Admin_smanar/Tampilan/update_data') ?>" method="POST" class="form_update_data" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="row">
            <input type="hidden" name="id_wakasek" id="id_wakasek" value="<?= $id_wakasek ?>">
            <div class="col-md-8">
              <div class="form-group">
                <input type="text" name="nama_wakasek" class="form-control" id="nama_wakasek" placeholder="Drs. Username, M. Pd" value="<?= $nama_wakasek ?>">
                <div class="invalid-feedback error_nama_wakasek">

                </div>
              </div>
              <div class="form-group">
                <label for="jabatan_wakasek">Jabatan</label>
                <select class="form-control" name="jabatan_wakasek" id="jabatan_wakasek">
                  <option value="Waka Kesiswaan" <?php if ($jabatan_wakasek == 'Waka Kesiswaan') echo "selected" ?>>Waka Kesiswaan</option>
                  <option value="Waka Kurikulum" <?php if ($jabatan_wakasek == 'Waka Kurikulum') echo "selected" ?>>Waka Kurikulum</option>
                  <option value="Waka Hubungan Masyarakat" <?php if ($jabatan_wakasek == 'Waka Hubungan Masyarakat') echo "selected" ?>>Waka Hubungan Masyarakat</option>
                  <option value="Waka Sarana & Prasarana" <?php if ($jabatan_wakasek == 'Waka Sarana & Prasarana') echo "selected" ?>>Waka Sarana & Prasarana</option>
                </select>
                <div class="invalid-feedback error_jabatan_wakasek">

                </div>
              </div>
              <div class="form-group">
                <label for="wa_wakasek">Whatsapp</label>
                <input type="number" class="form-control" id="wa_wakasek" name="wa_wakasek" placeholder="08..." value="<?= $wa_wakasek ?>">
              </div>
              <div class="form-group">
                <label for="fb_wakasek">Facebook</label>
                <input type="text" class="form-control" id="fb_wakasek" name="fb_wakasek" placeholder="username" value="<?= $fb_wakasek ?>">
              </div>
              <div class="form-group">
                <label for="ig_wakasek">Instagram</label>
                <input type="text" class="form-control" id="ig_wakasek" name="ig_wakasek" placeholder="username" value="<?= $ig_wakasek ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="foto_wakasek">Foto</label>
                <div class="image_demo_croppie">
                  <img src="<?= base_url('Front/assets/img/team/wakasek/' . $foto_wakasek) ?>" id="image_demo" width="100%" class="mb-4" alt="">
                </div>
                <input type="file" class="form-control" id="foto_wakasek" accept="image/*" name="foto_wakasek">

                <div class="invalid-feedback error_foto_wakasek">

                </div>
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
  // var openFile = function(event) {
  //   var input = event.target;

  //   var reader = new FileReader();
  //   reader.onload = function() {
  //     var dataURL = reader.result;
  //     var output = document.getElementById('output');
  //     output.src = dataURL;
  //   };
  //   reader.readAsDataURL(input.files[0]);
  // };

  $(document).ready(function() {

    // Croopie JS
    $image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 218,
        height: 268,
        type: 'square'
      },
      boundary: {
        width: 220,
        height: 270
      }
    });
    // File Reader
    $('#foto_wakasek').on('change', function() {
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

    // AJAX Update
    $('#btn-update').click(function() {
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(image) {
        var id_wakasek = $('#id_wakasek').val();
        var nama_wakasek = $('#nama_wakasek').val();
        var jabatan_wakasek = $('#jabatan_wakasek').val();
        var wa_wakasek = $('#wa_wakasek').val();
        var fb_wakasek = $('#fb_wakasek').val();
        var ig_wakasek = $('#ig_wakasek').val();
        $.ajax({
          type: "post",
          url: "<?= base_url('Admin_smanar/Tampilan/update_data') ?>",
          data: {
            "foto_wakasek": image,
            "nama_wakasek": nama_wakasek,
            "jabatan_wakasek": jabatan_wakasek,
            "wa_wakasek": wa_wakasek,
            "fb_wakasek": fb_wakasek,
            "ig_wakasek": ig_wakasek,
            "id_wakasek": id_wakasek,
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
            $('#modal-edit').modal('hide');
            dataWakasek();
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