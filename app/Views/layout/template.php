<?= $this->include('layout/header') ?>


<body class="fixed-left">
  <div id="loader"><img src="<?= base_url('Front/assets/img/loading.gif') ?>" alt=""></div>



  <script>
    $(window).on('load', function() {
      $('#loader').fadeOut(1500, function() {
        $(this).hide();
      });
    })
  </script>


  <!-- Loader -->
  <!-- <div id="preloader">
    <div id="status">
      <div class="spinner"></div>
    </div>
  </div> -->

  <!-- Begin page -->
  <div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <?= $this->include('layout/sidebar') ?>
    <!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
      <!-- Start content -->
      <div class="content">

        <!-- Top Bar Start -->
        <?= $this->include('layout/topbar') ?>
        <!-- Top Bar End -->

        <div class="page-content-wrapper ">

          <?= $this->renderSection('content') ?>
          <!-- container -->


        </div> <!-- Page content Wrapper -->

      </div> <!-- content -->

      <?= $this->include('layout/footer') ?>