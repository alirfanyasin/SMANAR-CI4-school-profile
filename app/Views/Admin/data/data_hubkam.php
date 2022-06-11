<?php foreach ($hubkam as $data_hubkam) : ?>
  <form action="<?= base_url('Admin_smanar/Tampilan/update_hubkam') ?>" method="POST" class="form-edit-hubkam">
    <div class="card" style="margin-bottom: 100px;">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <input type="hidden" name="id_hubkam" value="<?= $data_hubkam['id_hubkam'] ?>">
            <div class="form-group">
              <label for="Email">Alamat Email</label>
              <input type="email" class="form-control" name="email_hubkam" id="Email" placeholder="Masukkan Alamat Email" value="<?= $data_hubkam['email_hubkam'] ?>">
              <div class="invalid-feedback error_email_hubkam"></div>
            </div>
            <div class="form-group">
              <label for="kontak_1">Kontak 1</label>
              <input type="number" class="form-control" name="kontak1_hubkam" id="kontak_1" placeholder="0878 **** ****" value="<?= $data_hubkam['kontak1_hubkam'] ?>">
              <div class="invalid-feedback error_kontak1_hubkam"></div>

            </div>
            <div class="form-group">
              <label for="kontak_2">Kontak 2</label>
              <input type="number" class="form-control" name="kontak2_hubkam" id="kontak_2" placeholder="0829 **** ****" value="<?= $data_hubkam['kontak2_hubkam'] ?>">
              <div class="invalid-feedback error_kontak2_hubkam"></div>

            </div>
            <div class="form-group">
              <label for="alamat_sekolah">Alamat Sekolah</label>
              <input type="text" class="form-control" name="alamat_hubkam" id="alamat_sekolah" value="<?= $data_hubkam['alamat_hubkam'] ?>">
              <div class="invalid-feedback error_alamat_hubkam"></div>

            </div>
            <div class="form-group">
              <label for="operasional_sekolah">Operasional Sekolah</label><br>

              Dari Jam<input type="time" class="form-control" name="dari_jam_hubkam" id="dari" placeholder="07.00" value="<?= $data_hubkam['dari_jam_hubkam'] ?>">
              <div class="invalid-feedback error_dari_jam_hubkam"></div>

              Sampai Jam<input type="time" class="form-control" name="sampai_jam_hubkam" id="sampai" placeholder="12.00" value="<?= $data_hubkam['sampai_jam_hubkam'] ?>">
              <div class="invalid-feedback error_sampai_jam_hubkam"></div>

            </div>

          </div>
          <div class="col-md-6">

            <div class="form-group">
              <label for="Whatsapp">Whatsapp</label>
              <input type="number" class="form-control" name="wa_hubkam" id="whatsapp" placeholder="0878 **** ****" value="<?= $data_hubkam['wa_hubkam'] ?>">
              <div class="invalid-feedback error_wa_hubkam"></div>

            </div>
            <div class="form-group">
              <label for="Instagram">Instagram</label>
              <input type="text" class="form-control" name="ig_hubkam" id="Instagram" placeholder="Example" value="<?= $data_hubkam['ig_hubkam'] ?>">
            </div>
            <div class="form-group">
              <label for="facebook">Facebook</label>
              <input type="text" class="form-control" name="fb_hubkam" id="facebook" placeholder="Example" value="<?= $data_hubkam['fb_hubkam'] ?>">
            </div>
            <div class="form-group">
              <label for="youtube">Youtube</label>
              <input type="text" class="form-control" name="yt_hubkam" id="youtube" placeholder="Example" value="<?= $data_hubkam['yt_hubkam'] ?>">
            </div>
            <div class="form-group">
              <label for="Twitter">Twitter</label>
              <input type="text" class="form-control" name="tw_hubkam" id="Twitter" placeholder="Example" value="<?= $data_hubkam['tw_hubkam'] ?>">
            </div>


          </div>

          <button type="submit" class="btn text-white btn-block" id="btn-update-hubkam" style="background-color: #3fa400;">Update</button>

        </div>
      </div>


    </div>
  </form>

<?php endforeach; ?>

<script>
  $(document).ready(function() {

    $('.form-edit-hubkam').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
          $('#btn-update-hubkam').attr('disable', 'disabled')
          $('#btn-update-hubkam').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        complete: function() {
          $('#btn-update-hubkam').removeAttr('disable')
          $('#btn-update-hubkam').html('Update')
        },
        success: function(response) {
          if (response.error) {
            if (response.error.email_hubkam) {
              $('#Email').addClass('is-invalid');
              $('.error_email_hubkam').html(response.error.email_hubkam);
            } else {
              $('#Email').removeClass('is-invalid');
            }
            if (response.error.kontak1_hubkam) {
              $('#kontak_1').addClass('is-invalid');
              $('.error_kontak1_hubkam').html(response.error.kontak1_hubkam);
            } else {
              $('#kontak_1').removeClass('is-invalid');
            }
            if (response.error.kontak2_hubkam) {
              $('#kontak_2').addClass('is-invalid');
              $('.error_kontak2_hubkam').html(response.error.kontak2_hubkam);
            } else {
              $('#kontak_2').removeClass('is-invalid');
            }
            if (response.error.alamat_hubkam) {
              $('#alamat_sekolah').addClass('is-invalid');
              $('.error_alamat_hubkam').html(response.error.alamat_hubkam);
            } else {
              $('#alamat_sekolah').removeClass('is-invalid');
            }
            if (response.error.dari_jam_hubkam) {
              $('#dari').addClass('is-invalid');
              $('.error_dari_jam_hubkam').html(response.error.dari_jam_hubkam);
            } else {
              $('#dari').removeClass('is-invalid');
            }
            if (response.error.sampai_jam_hubkam) {
              $('#sampai').addClass('is-invalid');
              $('.error_sampai_jam_hubkam').html(response.error.sampai_jam_hubkam);
            } else {
              $('#sampai').removeClass('is-invalid');
            }
            if (response.error.wa_hubkam) {
              $('#whatsapp').addClass('is-invalid');
              $('.error_wa_hubkam').html(response.error.wa_hubkam);
            } else {
              $('#whatsapp').removeClass('is-invalid');
            }
          } else {

            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })

            getHubkam();


          }
        }
      });


    })

  })
</script>