<!-- Modal -->
<div class="modal fade" id="modal_tambah_data_gallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Admin_smanar/Tampilan/simpan_data_gallery') ?>" method="POST" class="form_tambah_data_gallery" enctype="multipart/form-data">

        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="judul_image">Judul Image</label>
                <input type="text" name="judul_image" class="form-control" id="judul_gallery">
                <div class="invalid-feedback error_judul_image"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="kategori_gallery">Kategori</label>
                <select name="kategori" id="kategori_gallery" class="form-control">
                  <option value="Fasilitas">Fasilitas</option>
                  <option value="Prestasi">Prestasi</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <div class="invalid-feedback error_kategori"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="image">Image</label>
                <div class="image_demo_croppie">
                  <!-- <div id="image_demo" width="100%"></div> -->
                  <img src="<?= base_url('Front/assets/img/team/no-image.png') ?>" id="image_demo" width="100%" alt="">
                </div>
                <input type="file" class="form-control" id="thumb_gallery" name="thumb_gallery" accept="image/*">
                <div class="invalid-feedback error_image">

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" style="background-color: #3fa400;" id="btn-simpan">Simpan</button>
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
        width: 348,
        height: 248,
        type: 'square'
      },
      boundary: {
        width: 350,
        height: 250
      }
    });
    // File Reader
    $('#thumb_gallery').on('change', function() {
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
    $('#btn-simpan').click(function() {
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(image) {
        var judul_gallery = $('#judul_gallery').val();
        var kategori_gallery = $('#kategori_gallery').val();

        $.ajax({
          type: "post",
          url: "<?= base_url('Admin_smanar/Tampilan/simpan_data_gallery') ?>",
          data: {
            "thumb_gallery": image,
            "judul_gallery": judul_gallery,
            "kategori_gallery": kategori_gallery,
          },
          dataType: "json",
          beforeSend: function() {
            $('#btn-simpan').attr('disable', 'disabled')
            $('#btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>')
          },
          complete: function() {
            $('#btn-simpan').removeAttr('disable')
            $('#btn-simpan').html('Simpan')
          },
          success: function(response) {


            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })

            $('#modal_tambah_data_gallery').modal('hide');
            data_gallery();


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