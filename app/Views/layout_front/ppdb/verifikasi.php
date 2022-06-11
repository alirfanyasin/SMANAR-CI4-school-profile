<?= $this->extend('layout_front/template') ?>

<?= $this->section('content_front') ?>

<div class="container view-verifikasi" style="padding-top: 200px; padding-bottom: 150px;">
  <div class="row d-flex justify-content-center">
    <div class="col-8">

      <form action="<?= base_url('ppdb/hasil_pengumuman') ?>" method="POST" class="form-verifikasi-kode-pendaftaran">
        <div class="row">
          <div class="col">
            <h3>Verifikasi Kode Pendaftaran</h3>
            <p>Silahkan masukkan kode pendaftaran untuk melihat hasil pengumuman</p>
            <div class="alert alert-danger d-none" role="alert">
              Kode yang anda masukkan salah!
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-10">
            <input type="text" class="form-control " name="kode_pendaftaran" id="kode_pendaftaran" placeholder="Masukkan Kode Disini">
            <div class="invalid-feedback error_kode"></div>
          </div>
          <div class="col-2">
            <button type="submit" class="btn text-white" id="btn-verifikasi" style="background-color: #3fa400;">Submit</button>
          </div>
        </div>
      </form>
      <!-- html -->
    </div>
  </div>
</div>
<div class="view-data-pengumuman"></div>

<script>
  $(document).ready(function() {
    $('.form-verifikasi-kode-pendaftaran').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
          $('#btn-verifikasi').attr('disable', 'disabled')
          $('#btn-verifikasi').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        complete: function() {
          $('#btn-verifikasi').removeAttr('disable')
          $('#btn-verifikasi').html('Submit')
        },
        success: function(response) {
          if (response.kode_salah) {
            $('#kode_pendaftaran').addClass('is-invalid');
            $('.error_kode').html(response.kode_salah);
          } else {
            $('#kode_pendaftaran').removeClass('is-invalid');
          }

          if (response.error) {
            if (response.error.kode_error) {
              $('#kode_pendaftaran').addClass('is-invalid');
              $('.error_kode').html(response.error.kode_error);

            } else {
              $('#kode_pendaftaran').removeClass('is-invalid');

            }
          }

          if (response.output) {
            $('.view-verifikasi').addClass('d-none');
            $('.view-data-pengumuman').html(response.output);
          }

        }
      });
    })
  })
</script>


<style>
  .row .col-10 input:focus {
    box-shadow: 0 0 5px #3fa400;
    border: 2px solid #3fa400;
  }
</style>

<?= $this->endSection() ?>