<!-- Modal Biodata-->
<div class="modal fade" id="modal-biodata-siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Biodata Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Admin_smanar/PPDB/action_siswa_baru_terima') ?>" method="POST" class="biodata_siswa_action">

        <?= csrf_field(); ?>
        <input type="hidden" name="id_siswa_baru" value="<?= $id_siswa_baru ?>" id="">
        <div class="modal-body">
          <div class="container p-3">
            <div class="row ">
              <div class="col-md-4 ">
                <div class="image">
                  <img src="<?= base_url('Front/assets/img/siswa_baru/foto/' . $foto_siswa) ?>" height="100%" width="100%" alt="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="" class="d-block">Nama Lengkap</label>
                  <p><?= $nama_lengkap ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">NIK</label>
                  <p><?= $nik ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Tempat Tanggal Lahir</label>
                  <p><?= $tempat_lahir . ', ' . $tanggal_lahir ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Jenis Kelamin</label>
                  <p><?= $jenis_kelamin ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Agama</label>
                  <p><?= $agama ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Jurusan</label>
                  <p><?= ($agama = 'IPA') ? 'Ilmu Pengetahuan Alam' : 'Ilmu Pengetahuan Sosial' ?></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="" class="d-block">NIS</label>
                  <p><?= $nis ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">NISN</label>
                  <p><?= $nisn ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Alamat</label>
                  <p><?= $alamat ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Asal Sekolah</label>
                  <p><?= $asal_sekolah ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Nomor Telepon</label>
                  <p><?= $nomor_telepon ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Kode Pendaftaran</label>
                  <p><?= $kode_pendaftaran ?></p>
                </div>
              </div>
            </div>
            <hr>
            <div class="row mt-3">


              <div class="col-md-6">
                <h3>Data Ayah</h3>
                <div class="form-group">
                  <label for="" class="d-block">Nama Ayah</label>
                  <p><?= $nama_ayah ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Alamat</label>
                  <p><?= $alamat_ayah ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Tempat Tanggal Lahir</label>
                  <p><?= $tempat_lahir_ayah . ', ' . $tanggal_lahir_ayah ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Agama</label>
                  <p><?= $agama_ayah ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Nomor Telepon</label>
                  <p><?= $nomor_telepon_ayah ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Pekerjaan</label>
                  <p><?= $pekerjaan_ayah ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Penghsilan</label>
                  <p><?= $penghasilan_ayah ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <h3>Data Ibu</h3>
                <div class="form-group">
                  <label for="" class="d-block">Nama Ibu</label>
                  <p><?= $nama_ibu ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Alamat</label>
                  <p><?= $alamat_ibu ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Tempat Tanggal Lahir</label>
                  <p><?= $tempat_lahir_ibu . ', ' . $tanggal_lahir_ibu ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Agama</label>
                  <p><?= $agama_ibu ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Nomor Telepon</label>
                  <p><?= $nomor_telepon_ibu ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Pekerjaan</label>
                  <p><?= $pekerjaan_ibu ?></p>
                </div>
                <div class="form-group">
                  <label for="" class="d-block">Penghsilan</label>
                  <p><?= $penghasilan_ibu ?></p>
                </div>
              </div>
            </div>

            <?php if ($bukti_prestasi_1 !== NULL) : ?>
              <div class="row mt-3">
                <div class="col-md-6">
                  <h3>Prestasi 1</h3>
                  <div class="form-group">
                    <label for="" class="d-block">Prestasi 1</label>
                    <p><a href="<?= base_url('Front/assets/img/siswa_baru/prestasi/' . $bukti_prestasi_1) ?>"><img src="<?= base_url('Front/assets/img/icon-pdf.png') ?>" width="200px" alt=""></a></p>
                  </div>
                  <div class="form-group">
                    <label for="" class="d-block">Judul</label>
                    <p><?= $judul_prestasi_1 ?></p>
                  </div>
                  <div class="form-group">
                    <label for="" class="d-block">Tingkat</label>
                    <p><?= $tingkat_prestasi_1 ?></p>
                  </div>
                  <div class="form-group">
                    <label for="" class="d-block">Penyelenggara</label>
                    <p><?= $penyelenggara_1 ?></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <h3>Prestasi 2</h3>
                  <div class="form-group">
                    <label for="" class="d-block">Prestasi 2</label>
                    <p><a href="<?= base_url('Front/assets/img/siswa_baru/prestasi/' . $bukti_prestasi_2) ?>"><img src="<?= base_url('Front/assets/img/icon-pdf.png') ?>" width="200px" alt=""></a></p>
                  </div>
                  <div class="form-group">
                    <label for="" class="d-block">Judul</label>
                    <p><?= $judul_prestasi_2 ?></p>
                  </div>
                  <div class="form-group">
                    <label for="" class="d-block">Tingkat</label>
                    <p><?= $tingkat_prestasi_2 ?></p>
                  </div>
                  <div class="form-group">
                    <label for="" class="d-block">Penyelenggara</label>
                    <p><?= $penyelenggara_2 ?></p>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="modal-footer">
          <span>Status</span>
          <span class="badge <?= ($status === '0' || $status === NULL) ? 'badge-warning' : '' ?><?= ($status === '1') ? 'badge-success' : '' ?><?= ($status === '2') ? 'badge-danger' : '' ?>"><?= ($status === '0' || $status === NULL) ? 'Belum Dikonfirmasi' : '' ?>
            <?= ($status === '1') ? 'Diterima' : '' ?>
            <?= ($status === '2') ? 'Ditolak' : '' ?></span>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="btn-tolak">Tolak</button>
          <button type="button" class="btn btn-success" id="btn-terima">Terima</button>
          <!-- <input type="button" class="btn btn-success" name="terima" value="1" id="btn-terima"> -->
        </div>

      </form>

    </div>
  </div>
</div>

<style>
  * {
    font-family: Roboto;
  }

  label {

    font-size: 13px;
    color: gray;
  }

  p {
    font-size: 17px;
    font-weight: 800;
    margin-top: -10px;
  }
</style>

<script>
  $('#btn-terima').click(function(e) {
    e.preventDefault();
    var data = $('.biodata_siswa_action')
    $.ajax({
      type: "post",
      url: "<?= base_url('Admin_smanar/PPDB/action_siswa_baru_terima') ?>",
      data: data.serialize(),
      dataType: "json",
      beforeSend: function() {
        $('#btn-terima').attr('disable', 'disabled')
        $('#btn-terima').html('<i class="fa fa-spin fa-spinner"></i>')
      },
      complete: function() {
        $('#btn-terima').removeAttr('disable')
        $('#btn-terima').html('Terima')
      },
      success: function(response) {
        swal({
          title: 'Berhasil',
          text: response.success,
          type: 'success',
          confirmButtonClass: 'btn btn-success',
        })

        $('#modal-biodata-siswa').modal('hide');

        get_siswa();
      }



    });
    return false;
  })



  $('#btn-tolak').click(function(e) {
    e.preventDefault();
    var data = $('.biodata_siswa_action')
    $.ajax({
      type: "post",
      url: "<?= base_url('Admin_smanar/PPDB/action_siswa_baru_tolak') ?>",
      data: data.serialize(),
      dataType: "json",
      beforeSend: function() {
        $('#btn-tolak').attr('disable', 'disabled')
        $('#btn-tolak').html('<i class="fa fa-spin fa-spinner"></i>')
      },
      complete: function() {
        $('#btn-tolak').removeAttr('disable')
        $('#btn-tolak').html('Tolak')
      },
      success: function(response) {
        swal({
          title: 'Berhasil',
          text: response.success,
          type: 'success',
          confirmButtonClass: 'btn btn-success',
        })

        $('#modal-biodata-siswa').modal('hide');
        get_siswa();
      }


    });
    return false;

  })


  //   // Library
  //   $("#presOne").on('click', e => {
  //     e.preventDefault();
  //     $('#collapseTwo').removeClass('show');

  //     $('#collapseOne').addClass('show');
  //   });
  //   $("#presTwo").on('click', e => {
  //     e.preventDefault();
  //     $('#collapseOne').removeClass('show');

  //     $('#collapseTwo').addClass('show');
  //   });
  // })
</script>