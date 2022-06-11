<!-- Modal -->
<div class="modal fade" id="modal_tambah_data_ekskul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Admin_smanar/Tampilan/simpan_data_ekskul') ?>" method="POST" class="form_tambah_data_ekskul" enctype="multipart/form-data">

        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_ekskul">Nama Ekskul</label>
                <input type="text" name="nama_ekskul" class="form-control" id="nama_ekskul">
                <div class="invalid-feedback error_nama_ekskul">

                </div>
              </div>

              <div class="form-group">
                <label for="pembina_ekskul">Pembina</label>
                <input type="text" class="form-control" id="pembina_ekskul" name="pembina_ekskul">
              </div>
              <div class="form-group">
                <label for="pengikut_ekskul">Pengikut</label>
                <input type="number" class="form-control" id="pengikut_ekskul" name="pengikut_ekskul">
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="foto_ekskul">Foto</label>
                <div class="image_demo_croppie">
                  <div id="image_demo" width="100%"></div>
                </div>
                <input type="file" class="form-control" id="foto_ekskul" name="foto_ekskul" accept="image/*">
                <div class="invalid-feedback error_foto_ekskul">

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
  // File Reader
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
    $('#btn-simpan').click(function() {
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(image) {
        var nama_ekskul = $('#nama_ekskul').val();
        var pembina_ekskul = $('#pembina_ekskul').val();
        var pengikut_ekskul = $('#pengikut_ekskul').val();

        $.ajax({
          type: "post",
          url: "<?= base_url('Admin_smanar/Tampilan/simpan_data_ekskul') ?>",
          data: {
            "foto_ekskul": image,
            "nama_ekskul": nama_ekskul,
            "pembina_ekskul": pembina_ekskul,
            "pengikut_ekskul": pengikut_ekskul,

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

            $('#modal_tambah_data_ekskul').modal('hide');
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