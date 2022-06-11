<?= $this->extend('layout_front/template') ?>

<?= $this->section('content_front') ?>
<?php

$db = \Config\Database::connect();

$TA = $db->table('tbl_pendaftaran')->get()->getRowArray();
$formulir = $db->table('tbl_input')->get()->getResultArray();

if (base_url('ppdb/formulir_pendaftaran')) {
  if ($TA['status_pendaftaran'] == 'Sudah di buka') {
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    return redirect()->to(base_url('/'));
  }
}
?>
<div class="container" style="padding-top: 150px; padding-bottom: 100px;">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8 col-md-12 col-12">
      <header class="text-center">
        <h2 style="font-weight: 900;" class="mb-4">FORMULIR PENDAFTARAN</h2>
      </header>
      <div class="card">
        <div class="card-body ">
          <div class="button-scrole d-flex justify-content-center">
            <ul class="nav nav-pills  mb-3" id="pills-tab" role="tablist" aria-disabled="true">
              <li class="nav-item " role="presentation">
                <a class="nav-link active biodata nav-biodata" id="" data-toggle="pill" href="#" role="tab" aria-controls="pills-home" aria-selected="true">Biodata</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link  data-ayah nav-data-ayah" id="" data-toggle="pill" href="#" role="tab" aria-controls="pills-profile" aria-selected="false">Data Ayah</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link nav-data-ibu" id="" data-toggle="pill" href="#" role="tab" aria-controls="pills-contact" aria-selected="false">Data Ibu</a>
              </li>
              <li class="nav-item " role="presentation">
                <a class="nav-link nav-finalisasi" id="" data-toggle="pill" href="#" role="tab" aria-controls="finalisasi" aria-selected="false">Finalisasi</a>
              </li>
            </ul>
          </div>


          <div class="tab-content " id="pills-tabContent">
            <form action="<?= base_url('ppdb/simpan_biodata') ?>" method="POST" enctype="multipart/form-data" class="form-biodata">
              <?= csrf_field() ?>
              <div class="tab-pane fade biodata-show-form show active" id="biodata" role="tabpanel" aria-labelledby="pills-home-tab">
                <!-- Input Start Biodata -->
                <div class="row mt-5">
                  <div class="col-md-6 ">
                    <div class="form-group  mb-3">

                      <label for="nama_lengkap"><b>Nama Lengkap<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap">
                      <div class="invalid-feedback nama_lengkap_error"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="nik"><b>NIK<sup class="text-danger">*</sup></b></label>
                      <input type="number" name="nik" class="form-control" id="nik" placeholder="Sesuaikan dengan KK">
                      <div class="invalid-feedback nik_error"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tempat_lahir"><b>Tempat Lahir<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
                      <div class="invalid-feedback error_tempat_lahir"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tanggal_lahir"><b>Tanggal Lahir<sup class="text-danger">*</sup></b></label>
                      <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                      <div class="invalid-feedback error_tanggal_lahir"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="jenis_kelamin"><b>Jenis Kelamin<sup class="text-danger">*</sup></b></label>
                      <select name="jenis_kelamin" class="select form-control" id="jenis_kelamin">
                        <option value="" selected disabled> -- Pilih --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <div class="invalid-feedback error_jenis_kelamin"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="agama"><b>Agama<sup class="text-danger">*</sup></b></label>
                      <select name="agama" class="select form-control" id="agama">
                        <option value="" selected disabled> -- Pilih --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                      <div class="invalid-feedback error_agama"></div>
                    </div>



                  </div>


                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="nis"><b>NIS<sup class="text-danger">*</sup></b></label>
                      <input type="number" name="nis" class="form-control" id="nis">
                      <div class="invalid-feedback error_nis"></div>
                    </div>


                    <div class="form-group mb-3">
                      <label for="nisn"><b>NISN<sup class="text-danger">*</sup></b></label>
                      <input type="number" name="nisn" class="form-control" id="nisn">
                      <div class="invalid-feedback error_nisn"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="alamat"><b>Alamat<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Sesuaikan dengan KK">
                      <div class="invalid-feedback error_alamat"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="asal_sekolah"><b>Asal Sekolah<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah">
                      <div class="invalid-feedback error_asal_sekolah"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="nomor_telepon"><b>Nomor Telepon (WA)<sup class="text-danger">*</sup></b></label>
                      <input type="number" name="nomor_telepon" class="form-control" id="nomor_telepon">
                      <div class="invalid-feedback error_nomor_telepon"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="jurusan"><b>Jurusan <sup class="text-danger">*</sup></b> </label>
                      <select name="jurusan" class="select form-control" id="jurusan">
                        <option value="" selected disabled> -- Pilih --</option>
                        <option value="IPA">IPA</option>
                        <option value="IPS">IPS</option>
                      </select>
                      <div class="invalid-feedback error_jurusan"></div>
                    </div>

                  </div>
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-4 col-6">
                      <div class="form-group mb-3">
                        <label for="foto_siswa"><b>Foto Siswa<sup class="text-danger">*</sup></b> <i>(Ukuran 3 x 4)</i></label>
                        <div class="bingkai mb-2">
                          <img src="<?= base_url('Front/assets/img/no-photo-user.jpg') ?>" alt="" width="100%" id="output">
                        </div>
                        <input type="file" name="foto_siswa" class="form-control" accept="image/*" id="foto_siswa" onchange="openFile(event)">
                        <div class="invalid-feedback foto_siswa_error"></div>

                      </div>
                    </div>
                  </div>


                </div>
                <!-- Input End Biodata-->
                <div class="button-nex-previous d-flex justify-content-end">
                  <button type="submit" class="btn text-white btn-next-biodata" style="background-color: #3fa400;">Lanjutkan</button>
                </div>
              </div>
            </form>


            <script>
              $(document).ready(function() {


                $('.form-biodata').submit(function(e) {
                  e.preventDefault();

                  var form = $('.form-biodata')[0];
                  var data = new FormData(form);

                  $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: data,
                    processData: false,
                    cache: false,
                    contentType: false,
                    dataType: "json",
                    beforeSend: function() {
                      $('.btn-next-biodata').attr('disable', 'disabled')
                      $('.btn-next-biodata').html('<i class="fa fa-spin fa-spinner"></i>')

                    },
                    complete: function() {
                      $('.btn-next-biodata').removeAttr('disable')
                      $('.btn-next-biodata').html('Lanjutkan')
                    },
                    success: function(response) {

                      if (response.error) {
                        if (response.error.nama_lengkap) {
                          $('#nama_lengkap').addClass('is-invalid');
                          $('.nama_lengkap_error').html(response.error.nama_lengkap)
                        } else {
                          $('#nama_lengkap').removeClass('is-invalid')
                        }
                        if (response.error.nik) {
                          $('#nik').addClass('is-invalid');
                          $('.nik_error').html(response.error.nik)
                        } else {
                          $('#nik').removeClass('is-invalid')
                        }
                        if (response.error.foto_siswa) {
                          $('#foto_siswa').addClass('is-invalid');
                          $('.foto_siswa_error').html(response.error.foto_siswa)
                        } else {
                          $('#foto_siswa').removeClass('is-invalid')
                        }
                        if (response.error.tempat_lahir) {
                          $('#tempat_lahir').addClass('is-invalid');
                          $('.error_tempat_lahir').html(response.error.tempat_lahir)
                        } else {
                          $('#tempat_lahir').removeClass('is-invalid')
                        }
                        if (response.error.tanggal_lahir) {
                          $('#tanggal_lahir').addClass('is-invalid');
                          $('.error_tanggal_lahir').html(response.error.tanggal_lahir)
                        } else {
                          $('#tanggal_lahir').removeClass('is-invalid')
                        }
                        if (response.error.jenis_kelamin) {
                          $('#jenis_kelamin').addClass('is-invalid');
                          $('.error_jenis_kelamin').html(response.error.jenis_kelamin)
                        } else {
                          $('#jenis_kelamin').removeClass('is-invalid')
                        }
                        if (response.error.agama) {
                          $('#agama').addClass('is-invalid');
                          $('.error_agama').html(response.error.agama)
                        } else {
                          $('#agama').removeClass('is-invalid')
                        }
                        if (response.error.nis) {
                          $('#nis').addClass('is-invalid');
                          $('.error_nis').html(response.error.nis)
                        } else {
                          $('#nis').removeClass('is-invalid')
                        }
                        if (response.error.nisn) {
                          $('#nisn').addClass('is-invalid');
                          $('.error_nisn').html(response.error.nisn)
                        } else {
                          $('#nisn').removeClass('is-invalid')
                        }
                        if (response.error.alamat) {
                          $('#alamat').addClass('is-invalid');
                          $('.error_alamat').html(response.error.alamat)
                        } else {
                          $('#alamat').removeClass('is-invalid')
                        }
                        if (response.error.asal_sekolah) {
                          $('#asal_sekolah').addClass('is-invalid');
                          $('.error_asal_sekolah').html(response.error.asal_sekolah)
                        } else {
                          $('#asal_sekolah').removeClass('is-invalid')
                        }
                        if (response.error.nomor_telepon) {
                          $('#nomor_telepon').addClass('is-invalid');
                          $('.error_nomor_telepon').html(response.error.nomor_telepon)
                        } else {
                          $('#nomor_telepon').removeClass('is-invalid')
                        }
                        if (response.error.jurusan) {
                          $('#jurusan').addClass('is-invalid');
                          $('.error_jurusan').html(response.error.jurusan)
                        } else {
                          $('#jurusan').removeClass('is-invalid')
                        }
                      } else {
                        // Remove Validation
                        $('#nama_lengkap').removeClass('is-invalid')
                        $('#foto_siswa').removeClass('is-invalid')
                        $('#nik').removeClass('is-invalid')
                        $('#foto_siswa').removeClass('is-invalid')
                        $('#tempat_lahir').removeClass('is-invalid')
                        $('#tanggal_lahir').removeClass('is-invalid')
                        $('#jenis_kelamin').removeClass('is-invalid')
                        $('#agama').removeClass('is-invalid')
                        $('#nis').removeClass('is-invalid')
                        $('#nisn').removeClass('is-invalid')
                        $('#alamat').removeClass('is-invalid')
                        $('#asal_sekolah').removeClass('is-invalid')
                        $('#nomor_telepon').removeClass('is-invalid')
                        $('#jurusan').removeClass('is-invalid')

                        // Transition Btn-Lanjutkan
                        $('.nav-data-ayah').addClass('active');
                        $('.nav-data-ayah').attr('aria-selected', 'true');
                        $('.nav-biodata').removeClass('active');
                        $('.nav-biodata').attr('aria-selected', 'false');

                        $('#biodata').removeClass('show');
                        $('#biodata').removeClass('active');
                        $('#biodata').addClass('d-none');
                        $('#data-ayah').addClass('show');
                        $('#data-ayah').addClass('active');
                      }
                    }
                  });


                })
              })
            </script>



            <div class="tab-pane fade " id="data-ayah" role="tabpanel" aria-labelledby="pills-data-ayah-tab">
              <form action="<?= base_url('ppdb/simpan_data_ayah') ?>" method="POST" class="form-data-ayah">
                <?= csrf_field() ?>

                <!-- Input Start Data Ayah-->
                <div class="row mt-5">
                  <div class="col-md-6 ">
                    <div class="form-group  mb-3">

                      <label for="nama_ayah"><b>Nama Ayah<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="nama_ayah" class="form-control" id="nama_ayah">
                      <div class="invalid-feedback error_nama_ayah"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="alamat_ayah"><b>Alamat<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="alamat_ayah" class="form-control" id="alamat_ayah" placeholder="Sesuaikan dengan KK">
                      <div class="invalid-feedback error_alamat_ayah"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tempat_lahir_ayah"><b>Tempat Lahir<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="tempat_lahir_ayah" class="form-control" id="tempat_lahir_ayah">
                      <div class="invalid-feedback error_tempat_lahir_ayah"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tanggal_lahir_ayah"><b>Tanggal Lahir<sup class="text-danger">*</sup></b></label>
                      <input type="date" name="tanggal_lahir_ayah" class="form-control" id="tanggal_lahir_ayah">
                      <div class="invalid-feedback error_tanggal_lahir_ayah"></div>
                    </div>


                  </div>


                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="nomor_telepon_ayah"><b>Nomor Telepon (WA)<sup class="text-danger">*</sup></b></label>
                      <input type="number" name="nomor_telepon_ayah" class="form-control" id="nomor_telepon_ayah">
                      <div class="invalid-feedback error_nomor_telepon_ayah"></div>
                    </div>

                    <div class="form-group mb-3">
                      <label for="agama"><b>Agama<sup class="text-danger">*</sup></b></label>
                      <select name="agama_ayah" class="select form-control" id="agama_ayah">
                        <option value="" selected disabled> -- Pilih --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                      <div class="invalid-feedback error_agama_ayah"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="pekerjaan_ayah"><b>Pekerjaan<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah">
                      <div class="invalid-feedback error_pekerjaan_ayah"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="penghasilan_ayah"><b>Penghasilan<sup class="text-danger">*</sup></b></label>
                      <input type="number" name="penghasilan_ayah" class="form-control" id="penghasilan_ayah" placeholder="Rp.">
                      <div class="invalid-feedback error_penghasilan_ayah"></div>
                    </div>
                  </div>

                </div>
                <!-- Input End Data Ayah-->
                <div class="button-nex-previous d-flex justify-content-between">

                  <button type="button" class="btn text-white btn-previous-data-ayah" style="background-color: #3fa400;">Kembali</button>
                  <button type="submit" class="btn text-white btn-next-data-ayah" style="background-color: #3fa400;">Lanjutkan</button>
                </div>
              </form>
            </div>

            <script>
              $(document).ready(function() {
                $('.form-data-ayah').submit(function(e) {
                  e.preventDefault();

                  $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                      $('.btn-next-data-ayah').attr('disable', 'disabled')
                      $('.btn-next-data-ayah').html('<i class="fa fa-spin fa-spinner"></i>')
                    },
                    complete: function() {
                      $('.btn-next-data-ayah').removeAttr('disable')
                      $('.btn-next-data-ayah').html('Lanjutkan')
                    },
                    success: function(response) {
                      if (response.error) {
                        if (response.error.nama_ayah) {
                          $('#nama_ayah').addClass('is-invalid');
                          $('.error_nama_ayah').html(response.error.nama_ayah);
                        } else {
                          $('#nama_ayah').removeClass('is-invalid');
                        }
                        if (response.error.alamat_ayah) {
                          $('#alamat_ayah').addClass('is-invalid');
                          $('.error_alamat_ayah').html(response.error.alamat_ayah);
                        } else {
                          $('#alamat_ayah').removeClass('is-invalid');
                        }
                        if (response.error.tempat_lahir_ayah) {
                          $('#tempat_lahir_ayah').addClass('is-invalid');
                          $('.error_tempat_lahir_ayah').html(response.error.tempat_lahir_ayah);
                        } else {
                          $('#tempat_lahir_ayah').removeClass('is-invalid');
                        }
                        if (response.error.tanggal_lahir_ayah) {
                          $('#tanggal_lahir_ayah').addClass('is-invalid');
                          $('.error_tanggal_lahir_ayah').html(response.error.tanggal_lahir_ayah);
                        } else {
                          $('#tanggal_lahir_ayah').removeClass('is-invalid');
                        }
                        if (response.error.nomor_telepon_ayah) {
                          $('#nomor_telepon_ayah').addClass('is-invalid');
                          $('.error_nomor_telepon_ayah').html(response.error.nomor_telepon_ayah);
                        } else {
                          $('#nomor_telepon_ayah').removeClass('is-invalid');
                        }
                        if (response.error.agama_ayah) {
                          $('#agama_ayah').addClass('is-invalid');
                          $('.error_agama_ayah').html(response.error.agama_ayah);
                        } else {
                          $('#agama_ayah').removeClass('is-invalid');
                        }
                        if (response.error.pekerjaan_ayah) {
                          $('#pekerjaan_ayah').addClass('is-invalid');
                          $('.error_pekerjaan_ayah').html(response.error.pekerjaan_ayah);
                        } else {
                          $('#pekerjaan_ayah').removeClass('is-invalid');
                        }
                        if (response.error.penghasilan_ayah) {
                          $('#penghasilan_ayah').addClass('is-invalid');
                          $('.error_penghasilan_ayah').html(response.error.penghasilan_ayah);
                        } else {
                          $('#penghasilan_ayah').removeClass('is-invalid');
                        }
                      } else {
                        // Validation
                        $('#nama_ayah').removeClass('is-invalid');
                        $('#alamat_ayah').removeClass('is-invalid');
                        $('#tempat_lahir_ayah').removeClass('is-invalid');
                        $('#tanggal_lahir_ayah').removeClass('is-invalid');
                        $('#nomor_telepon_ayah').removeClass('is-invalid');
                        $('#agama_ayah').removeClass('is-invalid');
                        $('#pekerjaan_ayah').removeClass('is-invalid');
                        $('#penghasilan_ayah').removeClass('is-invalid');



                        $('.nav-data-ibu').addClass('active');
                        $('.nav-data-ibu').attr('aria-selected', 'true');
                        $('.nav-data-ayah').removeClass('active');
                        $('.nav-data-ayah').attr('aria-selected', 'false');

                        $('#data-ayah').removeClass('active');
                        $('#data-ayah').removeClass('show');
                        $('#data-ayah').addClass('d-none');
                        $('#pills-contact').addClass('show');
                        $('#pills-contact').addClass('active');
                      }
                    }
                  })


                })
              })

              $('.btn-previous-data-ayah').on('click', function(e) {
                e.preventDefault();
                $('.nav-biodata').addClass('active');
                $('.nav-biodata').attr('aria-selected', 'true');
                $('.nav-data-ayah').removeClass('active');
                $('.nav-data-ayah').attr('aria-selected', 'false');

                if ($('.nav-biodata').addClass('active')) {
                  $('#data-ayah').removeClass('active');
                  $('#data-ayah').removeClass('show');
                  $('#biodata').removeClass('d-none');
                  $('#biodata').addClass('show');
                  $('#biodata').addClass('active');
                }
              })
            </script>





            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <form action="<?= base_url('ppdb/simpan_data_ibu') ?>" method="POST" class="form-data-ibu">
                <?= csrf_field() ?>

                <!-- Input Start Data Ibu-->
                <div class="row mt-5">
                  <div class="col-md-6 ">
                    <div class="form-group  mb-3">
                      <label for="nama_ibu"><b>Nama Ibu<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="nama_ibu" class="form-control" id="nama_ibu">
                      <div class="invalid-feedback error_nama_ibu"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="alamat_ibu"><b>Alamat<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="alamat_ibu" class="form-control" id="alamat_ibu" placeholder="Sesuaikan dengan KK">
                      <div class="invalid-feedback error_alamat_ibu"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tempat_lahir_ibu"><b>Tempat Lahir<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="tempat_lahir_ibu" class="form-control" id="tempat_lahir_ibu">
                      <div class="invalid-feedback error_tempat_lahir_ibu"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tanggal_lahir_ibu"><b>Tanggal Lahir<sup class="text-danger">*</sup></b></label>
                      <input type="date" name="tanggal_lahir_ibu" class="form-control" id="tanggal_lahir_ibu">
                      <div class="invalid-feedback error_tanggal_lahir_ibu"></div>
                    </div>


                  </div>


                  <div class="col-md-6">

                    <div class="form-group mb-3">
                      <label for="nomor_telepon_ibu"><b>Nomor Telepon (WA)<sup class="text-danger">*</sup></b></label>
                      <input type="number" name="nomor_telepon_ibu" class="form-control" id="nomor_telepon_ibu">
                      <div class="invalid-feedback error_nomor_telepon_ibu"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="agama"><b>Agama<sup class="text-danger">*</sup></b></label>
                      <select name="agama_ibu" class="select form-control" id="agama_ibu">
                        <option value="" selected disabled> -- Pilih --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                      <div class="invalid-feedback error_agama_ibu"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="pekerjaan_ibu"><b>Pekerjaan<sup class="text-danger">*</sup></b></label>
                      <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu">
                      <div class="invalid-feedback error_pekerjaan_ibu"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label for="penghasilan_ibu"><b>Penghasilan<sup class="text-danger">*</sup></b></label>
                      <input type="number" name="penghasilan_ibu" class="form-control" id="penghasilan_ibu" placeholder="Rp.">
                      <div class="invalid-feedback error_penghasilan_ibu"></div>
                    </div>
                  </div>

                </div>
                <!-- Input End Data Ibu-->

                <div class="button-nex-previous d-flex justify-content-between">

                  <button type="button" class="btn text-white btn-previous-data-ibu" style="background-color: #3fa400;">Kembali</button>
                  <button type="submit" class="btn text-white btn-next-data-ibu" style="background-color: #3fa400;">Lanjutkan</button>
                </div>

              </form>
            </div>

            <script>
              $(document).ready(function() {
                $('.form-data-ibu').submit(function(e) {
                  e.preventDefault();

                  $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                      $('.btn-next-data-ibu').attr('disable', 'disabled')
                      $('.btn-next-data-ibu').html('<i class="fa fa-spin fa-spinner"></i>')
                    },
                    complete: function() {
                      $('.btn-next-data-ibu').removeAttr('disable')
                      $('.btn-next-data-ibu').html('Lanjutkan')
                    },
                    success: function(response) {

                      if (response.error) {
                        if (response.error.nama_ibu) {
                          $('#nama_ibu').addClass('is-invalid');
                          $('.error_nama_ibu').html(response.error.nama_ibu)
                        } else {
                          $('#nama_ibu').removeClass('is-invalid');
                        }
                        if (response.error.alamat_ibu) {
                          $('#alamat_ibu').addClass('is-invalid');
                          $('.error_alamat_ibu').html(response.error.alamat_ibu);
                        } else {
                          $('#alamat_ibu').removeClass('is-invalid');
                        }
                        if (response.error.tempat_lahir_ibu) {
                          $('#tempat_lahir_ibu').addClass('is-invalid');
                          $('.error_tempat_lahir_ibu').html(response.error.tempat_lahir_ibu);
                        } else {
                          $('#tempat_lahir_ibu').removeClass('is-invalid');
                        }
                        if (response.error.tanggal_lahir_ibu) {
                          $('#tanggal_lahir_ibu').addClass('is-invalid');
                          $('.error_tanggal_lahir_ibu').html(response.error.tanggal_lahir_ibu);
                        } else {
                          $('#tanggal_lahir_ibu').removeClass('is-invalid');
                        }
                        if (response.error.nomor_telepon_ibu) {
                          $('#nomor_telepon_ibu').addClass('is-invalid');
                          $('.error_nomor_telepon_ibu').html(response.error.nomor_telepon_ibu);
                        } else {
                          $('#nomor_telepon_ibu').removeClass('is-invalid');
                        }
                        if (response.error.agama_ibu) {
                          $('#agama_ibu').addClass('is-invalid');
                          $('.error_agama_ibu').html(response.error.agama_ibu);
                        } else {
                          $('#agama_ibu').removeClass('is-invalid');
                        }
                        if (response.error.pekerjaan_ibu) {
                          $('#pekerjaan_ibu').addClass('is-invalid');
                          $('.error_pekerjaan_ibu').html(response.error.pekerjaan_ibu);
                        } else {
                          $('#pekerjaan_ibu').removeClass('is-invalid');
                        }
                        if (response.error.penghasilan_ibu) {
                          $('#penghasilan_ibu').addClass('is-invalid');
                          $('.error_penghasilan_ibu').html(response.error.penghasilan_ibu);
                        } else {
                          $('#penghasilan_ibu').removeClass('is-invalid');
                        }
                      } else {
                        // Validation
                        $('#nama_ibu').removeClass('is-invalid');
                        $('#alamat_ibu').removeClass('is-invalid');
                        $('#tempat_lahir_ibu').removeClass('is-invalid');
                        $('#tanggal_lahir_ibu').removeClass('is-invalid');
                        $('#nomor_telepon_ibu').removeClass('is-invalid');
                        $('#agama_ibu').removeClass('is-invalid');
                        $('#pekerjaan_ibu').removeClass('is-invalid');
                        $('#penghasilan_ibu').removeClass('is-invalid');

                        $('.nav-finalisasi').addClass('active');
                        $('.nav-finalisasi').attr('aria-selected', 'true');
                        $('.nav-data-ibu').removeClass('active');
                        $('.nav-data-ibu').attr('aria-selected', 'false');

                        $('#pills-contact').removeClass('active');
                        $('#pills-contact').removeClass('show');
                        $('#pills-contact').removeClass('d-none');
                        $('#finalisasi').addClass('show');
                        $('#finalisasi').addClass('active');
                      }

                    }
                  })


                })
              })
              $('.btn-previous-data-ibu').on('click', function(e) {
                e.preventDefault();
                $('.nav-data-ayah').addClass('active');
                $('.nav-data-ayah').attr('aria-selected', 'true');
                $('.nav-data-ibu').removeClass('active');
                $('.nav-data-ibu').attr('aria-selected', 'false');

                if ($('.nav-data-ayah').addClass('active')) {
                  $('#pills-contact').removeClass('active');
                  $('#pills-contact').removeClass('show');
                  $('#data-ayah').removeClass('d-none');
                  $('#data-ayah').addClass('show');
                  $('#data-ayah').addClass('active');
                }
              })
            </script>





            <div class="tab-pane fade" id="finalisasi" role="tabpanel" aria-labelledby="finalisasi-tab">
              <form action="<?= base_url('ppdb/simpan_prestasi') ?>" method="POST" enctype="multipart/form-data" class="form-data-prestasi">
                <?= csrf_field() ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                      Disarankan mengunggah bukti prestasi bagi yang mempunyai!
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="accordion" id="accordionGroup">
                      <div class="card mb-3">
                        <a class="card-link collapsed" id="presOne" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <div class="card-header" id="headingOne">
                            Prestasi 1
                          </div>
                        </a>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionGroup">
                          <div class="card-body">
                            <div class="row ">
                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                  <label for="prestasiOne" class="d-block mb-2"><b>Bukti Prestasi 1</b></label>
                                  <div class="bingkai-pres1 d-flex justify-content-center">
                                    <img src="<?= base_url('Front/assets/img/icon-pdf.png') ?>" class="mb-4 " alt="" width="50%">
                                  </div>
                                  <input type="file" class="form-control" name="bukti_prestasi_1" accept=".pdf" id="prestasiOne">
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group mb-3">
                                  <label for="judul_prestasi"><b>Judul Prestasi 1</b></label>
                                  <input type="text" name="judul_prestasi_1" class="form-control" id="judul_prestasi">
                                </div>
                                <div class="form-group mb-3">
                                  <label for="tingkat_pres_1"><b>Tingkat</b></label>
                                  <select name="tingkat_prestasi_1" class="select form-control" id="tingkat_pres_1">
                                    <option value="" selected disabled> -- Pilih --</option>
                                    <option value="Tingkat Sekolah">Tingkat Sekolah</option>
                                    <option value="Tingkat Kecamatan">Tingkat Kecamatan</option>
                                    <option value="Tingkat Kabupaten">Tingkat Kabupaten</option>
                                    <option value="Tingkat Provinsi">Tingkat Provinsi</option>
                                    <option value="Tingkat Nasional">Tingkat Nasional</option>

                                  </select>
                                </div>
                                <div class="form-group mb-3">
                                  <label for="penyelenggara"><b>Penyelenggara</b></label>
                                  <input type="text" name="penyelenggara_1" class="form-control" id="penyelenggara">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-3">
                        <a class="card-link collapsed" id="presTwo" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <div class="card-header" id="headingTwo">
                            Prestasi 2
                          </div>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionGroup">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                  <label for="prestasiTwo" class="d-block mb-2"><b>Bukti Prestasi 2</b></label>
                                  <div class="bingkai-pres1 d-flex justify-content-center">
                                    <img src="<?= base_url('Front/assets/img/icon-pdf.png') ?>" class="mb-4 " alt="" width="50%">
                                  </div>
                                  <input type="file" class="form-control" name="bukti_prestasi_2" accept=".pdf" id="prestasiTwo">
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group mb-3">
                                  <label for="judul_prestasi_2"><b>Judul Prestasi 2</b></label>
                                  <input type="text" name="judul_prestasi_2" class="form-control" id="judul_prestasi_2">
                                </div>
                                <div class="form-group mb-3">
                                  <label for="tingkat_pres_2"><b>Tingkat</b></label>
                                  <select name="tingkat_prestasi_2" class="select form-control" id="tingkat_pres_2">
                                    <option value="" selected disabled> -- Pilih --</option>
                                    <option value="Tingkat Sekolah">Tingkat Sekolah</option>
                                    <option value="Tingkat Kecamatan">Tingkat Kecamatan</option>
                                    <option value="Tingkat Kabupaten">Tingkat Kabupaten</option>
                                    <option value="Tingkat Provinsi">Tingkat Provinsi</option>
                                    <option value="Tingkat Nasional">Tingkat Nasional</option>

                                  </select>
                                </div>
                                <div class="form-group mb-3">
                                  <label for="penyelenggara"><b>Penyelenggara</b></label>
                                  <input type="text" name="penyelenggara_2" class="form-control" id="penyelenggara">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="button-nex-previous d-flex justify-content-between">

                    <button type="button" class="btn text-white btn-previous-finalisasi" style="background-color: #3fa400;">Kembali</button>
                    <button type="submit" class="btn text-white btn-next-finalisasi" style="background-color: #3fa400;">Daftar</button>
                  </div>
                </div>
              </form>
            </div>
            <script>
              $('.btn-previous-finalisasi').on('click', function(e) {
                e.preventDefault();
                $('.nav-data-ibu').addClass('active');
                $('.nav-data-ibu').attr('aria-selected', 'true');
                $('.nav-finalisasi').removeClass('active');
                $('.nav-finalisasi').attr('aria-selected', 'false');

                if ($('.nav-data-ibu').addClass('active')) {
                  $('#finalisasi').removeClass('active');
                  $('#finalisasi').removeClass('show');
                  $('#pills-contact').addClass('show');
                  $('#pills-contact').addClass('active');
                }
              })
            </script>


          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // library

    $('#pills-tab a').on('click', function(event) {
      event.preventDefault()
      $(this).tab('show')

    });

    $("#presOne").on('click', e => {
      e.preventDefault();
      $('#collapseTwo').removeClass('show');

      $('#collapseOne').addClass('show');
    });
    $("#presTwo").on('click', e => {
      e.preventDefault();
      $('#collapseOne').removeClass('show');

      $('#collapseTwo').addClass('show');
    });




  })


  // File Reader
  var openFile = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function() {
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
</script>
<style>
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #3fa400;
  }

  .nav-pills .nav-link {
    background: 0 0;
    border: 0;
    color: gray;
    border-radius: 0.25rem;
  }


  .form-group input:focus {
    box-shadow: 0 0 5px #3fa400;
    border: 2px solid #3fa400;
  }

  .form-group select:focus {
    box-shadow: 0 0 5px #3fa400;
    border: 2px solid #3fa400;
  }

  /* .form-group option::selection {
    background-color: #3fa400;
    color: white;
  } */

  .form-group textarea:focus {
    box-shadow: 0 0 5px #3fa400;
    border: 2px solid #3fa400;
  }
</style>
<?= $this->endSection() ?>