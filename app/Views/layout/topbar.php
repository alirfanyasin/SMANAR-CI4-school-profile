<?php
$db = \Config\Database::connect();

$nama_admin = $db->table('tbl_admin')->get()->getRowArray();


?>

<div class="topbar">

  <nav class="navbar-custom">

    <ul class="list-inline float-right mb-0">


      <li class="list-inline-item dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          <str class="text-white mr-2"><span style="font-weight: 700;">Welcome, </span><?= $nama_admin['nama_admin'] ?> </str>
          <img src="<?= base_url('Front/assets/img/team/foto_profile/' . $nama_admin['foto_profile']) ?>" alt="user" class="rounded-circle img-thumbnail">

        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
          <!-- item-->
          <div class="dropdown-item noti-title">
            <h5>Welcome</h5>
          </div>
          <a class="dropdown-item" href="<?= base_url('Admin_smanar/profile_admin') ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>

          <a href="<?= base_url('Auth/Login/logout') ?>" class="dropdown-item" onclick="logout()"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
        </div>
      </li>

    </ul>
    <ul class="list-inline menu-left mb-0">
      <li class="float-left">
        <button class="button-menu-mobile open-left waves-light waves-effect">
          <i class="mdi mdi-menu"></i>
        </button>
      </li>
    </ul>
    <script>
      function logout() {
        swal({
          title: 'Apakah  Anda Yakin?',
          text: "Logout Page",
          type: 'warning',
          showCancelButton: true,
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger m-l-10',
          cancelButtonText: 'Tidak',
          confirmButtonText: 'Ya, Hapus!'
        }).then(function() {

          <?= base_url('Auth/Login/logout') ?>


        })
      }
    </script>

    <div class="clearfix"></div>

  </nav>

</div>