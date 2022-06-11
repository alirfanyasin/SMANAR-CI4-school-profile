<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?= $bukti_pendaftaran['nisn'] . '-' . $bukti_pendaftaran['nama_lengkap'] ?></title>

  <style>
    * {
      font-family: Roboto;
    }



    section {
      margin: 2% auto;
    }

    .image img {
      width: 270px;
    }

    .card {
      border: 1px solid black;
      padding: 15px;
      margin-bottom: 15px;
    }



    .text-header {
      text-align: center;
      margin-top: -80px;

    }


    header .title h2 {
      font-weight: 900;
      font-size: 20pt;
    }

    header .title p {
      margin-top: -15px;
    }

    label {
      font-weight: 600;
      color: grey;
      font-size: small;
      margin-bottom: 0px;
    }

    .group p {
      margin-top: 7px;
    }

    .group {
      margin-bottom: 30px;
    }

    h2 {
      font-weight: 700;
    }



    .image {
      margin-top: -30px;
      margin-right: 30px;
    }

    .sman {
      margin-top: -5px;
    }

    .kode-pendaftaran p {
      text-align: center;
    }

    .kode-pendaftaran label {
      display: flex;
      justify-content: center;
    }

    .pernyataan {
      /* background-color: #0cc80c; */
      padding: 20px;
    }

    .image-logo img {
      width: 100px;
    }

    .kode_pendaftaran {
      text-align: center;
    }
  </style>
</head>

<body>


  <section class="justify-content-center">
    <div class="card mb-2 border border-dark">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <header class="title-header">
              <div class="image-logo">
                <img src="Front/assets/img/logo-smanar.png" width="100px" alt="">
              </div>
              <div class="title">
                <h2 class="text-center text-header">BUKTI PENDAFTARAN</h2>
                <p class="text-center text-header"><b>SEKOLAH MENENGAH ATAS NEGERI 1 ARJASA</b></p>
              </div>
              <div class=" hello "></div>
            </header>
          </div>
        </div>
      </div>
    </div>
    <div class="card border border-dark mb-2">
      <div class="card-body">
        <table>
          <tr>
            <td>
              <div class="col-4 image">
                <img src="<?= 'Front/assets/img/siswa_baru/foto/' . $bukti_pendaftaran['foto_siswa'] ?>" alt="">
              </div>
            </td>
            <td>
              <div class="row keterangan-kartu">
                <div class="col-4 ">
                  <div class="group mb-3 ">
                    <Label>NAMA LENGKAP</Label>
                    <p><b><?= strtoupper($bukti_pendaftaran['nama_lengkap']) ?></b></p>
                  </div>
                  <div class="group mb-3 ">
                    <Label>ALAMAT</Label>
                    <p><b><?= strtoupper($bukti_pendaftaran['alamat']) ?></b></p>
                  </div>

                  <div class="group mb-3 ">
                    <Label>NISN</Label>
                    <p><b><?= strtoupper($bukti_pendaftaran['nisn']) ?></b></p>
                  </div>
                  <div class="group mb-3 ">
                    <Label>TEMPAT TANGGAL LAHIR</Label>
                    <p><b><?= strtoupper($bukti_pendaftaran['tempat_lahir'] . ', ' . $bukti_pendaftaran['tanggal_lahir']) ?></b></p>
                  </div>
                  <div class="group mb-3 ">
                    <Label>JURUSAN</Label>
                    <p><b><?= strtoupper($bukti_pendaftaran['jurusan']) ?></b></p>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </table>



      </div>
    </div>


    <div class="card border border-dark mb-2">
      <div class="card-body ">
        <div class="row kode-pendaftaran">
          <!-- kETERANGAN KODE  -->
          <!-- HURUF PERTAMA NAMA -->
          <!-- 2 ANGKA DEPAN NISN -->
          <!-- TANGGAL LAHIR-->
          <!-- TANGGAL DAN BULAN DAN JAM DAFTAR DAN DETIK-->
          <label for="" class="kode_pendaftaran">KODE PENDAFTARAN</label>
          <p><?= $bukti_pendaftaran['kode_pendaftaran'] ?></p>

          <div class="pernyataan">
            <p><b>Kode Pendaftaran</b> bersifat rahasia, gunakan kode tersebut nanti pada saat ingin melihat pengumuman dengan waktu yang telah di tentukan!</p>
          </div>
        </div>

      </div>
    </div>


  </section>


</body>

</html>