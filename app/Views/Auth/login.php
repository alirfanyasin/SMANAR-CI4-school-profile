<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>

  <link rel="shortcut icon" href="<?= base_url('Front') ?>/assets/img/logo-smanar.png">

  <!-- JQuery -->
  <script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/jquery.min.js"></script>
  <!-- Sweet Alert -->
  <link href="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('Back-end/Admin-template') ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?= base_url('Front/assets/css/login.css') ?>">

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <div class="card-body ">
            <form action="<?= base_url('Auth/Login/check_auth') ?>" method="POST">
              <div class="form-group"><img src="<?= base_url('Front/assets/img/logo-smanar.png') ?>" class="d-block mb-1" alt="SMANAR" width="100px" height="100px">
                <h2>SMANAR</h2>
                <small>SMA NEGERI 1 ARJASA</small>
              </div>



              <?= (session()->get('validation_wrong')) ? '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email atau Password Salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>' : '' ?>
              <div class="form-group mt-3">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" autofocus class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>" value="<?= old('email') ?>">
                <div class="invalid-feedback error_password"><?= $validation->getError('email') ?></div>

              </div>
              <?= csrf_field() ?>

              <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : '') ?>" value="<?= old('password') ?>">
                <div class="invalid-feedback error_password"><?= $validation->getError('password') ?></div>
              </div>
              <div class="form-group mt-3">
                <button type="submit" class="btn text-white btn-block" style="background-color: #3fa400;">LOGIN</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/bootstrap.min.js"></script>
  <!-- Sweet-Alert  -->
  <script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
  <script src="<?= base_url('Back-end/Admin-template') ?>/assets/pages/sweet-alert.init.js"></script>

  <!-- AUTH AJAX -->

</body>

</html>