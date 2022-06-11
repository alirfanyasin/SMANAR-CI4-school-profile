<?php
$db = \Config\Database::connect();
$ta = $db->table('tbl_pendaftaran')->get()->getRowArray();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?= $this->include('layout_front/header') ?>
  <!-- Loader -->
  <style>
    #loader {
      background-color: #fff;
      height: 100vh;
      width: 100%;
      z-index: 999;
      position: fixed;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #loader img {
      width: 100px;

    }
  </style>

</head>

<body>

  <!-- Preloader -->
  <div id="loader"><img src="<?= base_url('Front/assets/img/loading.gif') ?>" alt=""></div>


  <script>
    $(window).on('load', function() {
      $('#loader').fadeOut(1500, function() {
        $(this).hide();
      });
    })
  </script>

  <!-- ======= Header ======= -->
  <?= $this->include('layout_front/navbar') ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <?= $this->renderSection('content_front') ?>


  <!-- ======= Footer ======= -->
  <?= $this->include('layout_front/footer') ?>

  <script>
    let btndaftar = document.querySelector('.btn-daftar');
    btndaftar.addEventListener('click', function() {

      swal({
        title: 'Opss...!',
        text: 'Pendaftaran Tahun Ajaran <?= $ta['tahun_ajaran_pendaftaran']; ?> Sudah di Tutup',
        type: 'error',
        confirmButtonClass: 'btn btn-success',
      })
    })
    let btnayodaftar = document.querySelector('.btn-ayo-daftar');
    btnayodaftar.addEventListener('click', function() {

      swal({
        title: 'Opss...!',
        text: 'Pendaftaran <?= $ta['tahun_ajaran_pendaftaran']; ?> Sudah di Tutup',
        type: 'error',
        confirmButtonClass: 'btn btn-success',
      })
    })

    let btnPengum = document.querySelector('.btn-pengumuman');
    btnPengum.addEventListener('click', function() {

      swal({
        title: 'Opss...!',
        text: 'Pengumuman PPDB belum di buka',
        type: 'warning',
        confirmButtonClass: 'btn btn-success',
      })
    })
  </script>

  <script>
    // AJAX GET KEPALA SEKOLAH
    function get_data_kepsek() {
      $.ajax({
        type: "get",
        url: "<?= base_url('Home/get_kepsek') ?>",
        dataType: "json",
        success: function(response) {
          $('.data_kepsek').html(response)
        }
      })
    }
    // AJAX GET WAKIL KEPALA SEKOLAH
    function get_data_waksek() {
      $.ajax({
        type: "get",
        url: "<?= base_url('Home/get_wakasek') ?>",
        dataType: "json",
        success: function(response) {
          $('.data_wakasek').html(response)
        }
      })
    }
    // AJAX GET JUMLAH PENGHUNI SEKOLAH
    function get_data_jumpeng() {
      $.ajax({
        type: "get",
        url: "<?= base_url('Home/get_jml_penghuni') ?>",
        dataType: "json",
        success: function(response) {
          $('.data_jml_penghuni').html(response)
        }
      })
    }
    // AJAX GET GALLERY
    function get_data_gallery() {
      $.ajax({
        type: "get",
        url: "<?= base_url('Home/get_gallery') ?>",
        dataType: "json",
        success: function(response) {
          $('.data_gallery').html(response)
        }
      })
    }

    // AJAX GET WAKIL KEPALA SEKOLAH
    function get_data_blog() {
      $.ajax({
        type: "get",
        url: "<?= base_url('Home/get_blog') ?>",
        dataType: "json",
        success: function(response) {
          $('.view-data-blog').html(response)
        }
      })
    }

    $(document).ready(function() {
      get_data_kepsek();
      get_data_waksek();
      get_data_jumpeng();
      get_data_gallery();
      get_data_blog();



      $('.form_feedback').submit(function(e) {
        e.preventDefault();

        $.ajax({
          type: "post",
          url: $(this).attr('action'),
          data: $(this).serialize(),
          dataType: "json",
          beforeSend: function() {
            $('.btn-kirim').attr('disable', 'disabled')
            $('.btn-kirim').html('Loading...')
          },
          complete: function() {
            $('.btn-kirim').removeAttr('disable')
            $('.btn-kirim').html('Kirim Pesan')
          },
          success: function(response) {
            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })


          }
        });
      })

    })
  </script>



</body>

</html>