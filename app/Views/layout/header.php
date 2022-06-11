<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title><?= $title; ?></title>
  <meta content="Admin Dashboard" name="description" />
  <meta content="Mannatthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />


  <link rel="shortcut icon" href="<?= base_url('Front') ?>/assets/img/logo-smanar.png">

  <!-- jQuery  -->
  <script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/jquery.min.js"></script>

  <link href="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/morris/morris.css" rel="stylesheet">
  <!-- Sweet Alert -->
  <link href="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

  <!-- DataTables -->
  <!-- <link href="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" /> -->
  <!-- <link href="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" /> -->
  <!-- Responsive datatable examples -->
  <!-- <link href="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> -->
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- Styling DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>


  <link href="<?= base_url('Back-end/Admin-template') ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('Back-end/Admin-template') ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('Back-end/Admin-template/assets/css/style.css') ?>" rel="stylesheet" type="text/css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Summernote -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> -->



  <!-- Croppie JS -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.css"> -->

  <!-- Croppie JS -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.js"></script> -->

  <!-- Croppie JS -->
  <link rel="stylesheet" href="<?= base_url('Front/assets/Croppie-2.6.4/croppie.css') ?>">


  <!-- Quil Text Editor -->
  <!-- <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
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