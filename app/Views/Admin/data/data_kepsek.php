<?php foreach ($kepsek as $kep) : ?>
  <form action="<?= base_url('Admin_smanar/Tampilan/update_kepsek') ?>" method="POST" class="form-edit-kepsek" enctype="multipart/form-data">
    <div class="row">
      <div class="col-xl-4 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="img">
              <div class="demo-image-croopie">
                <img src="<?= base_url('Front/assets/img/team/kepsek/' . $kep['foto_kepsek']) ?>" id="image_demo" style="width: 100%;" alt="" class="mb-3">
              </div>
              <input type="file" class="form-control " id="browse_image" name="foto_kepsek" accept='image/*'>
              <div class="invalid-feedback error_foto_kepsek "></div>
              <button type="button" id="btn-update" class="btn btn-block text-white mt-3" style="background-color: #3fa400;">Update</button>
            </div>

          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <div class="card">
          <div class="cord-body">
            <div class="row">
              <div class="col-6">
                <div class="profile">
                  <label for="">Nama Lengkap & Jabatan</label>
                  <input type="text" name="nama_kepsek" id="nama_kepsek" class="form-control mb-3" placeholder="Drs. Username, M. Pd" value="<?= $kep['nama_kepsek'] ?>">
                  <label for="">Alamat</label>
                  <input type="text" name="alamat_kepsek" id="alamat_kepsek" class="form-control mb-3" placeholder="Alamat saat ini" value="<?= $kep['alamat_kepsek'] ?>">
                  <label for="">NIP</label>
                  <input type=" number" name="nip_kepsek" id="nip_kepsek" class="form-control mb-3" placeholder="NIP" value="<?= $kep['nip_kepsek'] ?>">
                  <label for="">Email</label>
                  <input type=" email" name="email_kepsek" id="email_kepsek" class="form-control mb-3" placeholder="Alamat Email" value="<?= $kep['email_kepsek'] ?>">
                </div>
              </div>
              <div class=" col-6">
                <div class="profile">
                  <label for="sambutan">Kata Sambutan</label>
                  <textarea name="sambutan_kepsek" id="sambutan" class="form-control" cols="70" rows="12"><?= $kep['sambutan_kepsek'] ?></textarea>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </form>
<?php endforeach; ?>


<script>
  $(document).ready(function() {

    // Croopie
    $image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 200,
        height: 250,
        type: 'square'
      },
      boundary: {
        width: 290,
        height: 290
      }
    });
    $('#browse_image').on('change', function() {
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

    $('#btn-update').click(function() {
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(image) {
        var nama_kepsek = $('#nama_kepsek').val();
        var alamat_kepsek = $('#alamat_kepsek').val();
        var nip_kepsek = $('#nip_kepsek').val();
        var email_kepsek = $('#email_kepsek').val();
        var sambutan = $('#sambutan').val();
        $.ajax({
          type: "post",
          url: "<?= base_url('Admin_smanar/Tampilan/update_kepsek') ?>",
          data: {
            "foto_kepsek": image,
            "nama_kepsek": nama_kepsek,
            "alamat_kepsek": alamat_kepsek,
            "nip_kepsek": nip_kepsek,
            "email_kepsek": email_kepsek,
            "sambutan": sambutan,
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

          },
          error: function(xhr, ajaxOptions, throwError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError)
          }
        });

      })
    })


  })
</script>