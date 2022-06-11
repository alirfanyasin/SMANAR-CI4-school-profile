<div class="left side-menu">
  <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
    <i class="ion-close"></i>
  </button>

  <!-- LOGO -->
  <div class="topbar-left">
    <div class="text-center">
      <a href="<?= base_url('admin_smanar/dashboard') ?>" class="logo"><img src="<?= base_url('Front/assets/img/logo-smanar.png') ?>" height="34" style="margin-top: -7px;" alt="logo"></a>
      <a href="<?= base_url('admin_smanar/dashboard') ?>" class="logo"></i> SMANAR</a>
    </div>
  </div>

  <div class="sidebar-inner slimscrollleft">

    <div id="sidebar-menu">
      <ul>
        <li class="menu-title">Main</li>

        <li>
          <a href="<?= base_url('Admin_smanar/dashboard') ?>" class="waves-effect">
            <i class="mdi mdi-home"></i>
            <span> Dashboard</span>
          </a>
        </li>

        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Front End </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
          <ul class="list-unstyled">
            <li><a href="<?= base_url('Admin_smanar/kepala_sekolah') ?>">Kepala Sekolah</a></li>
            <li><a href="<?= base_url('Admin_smanar/wakasek') ?>">Wakasek</a></li>
            <li><a href="<?= base_url('Admin_smanar/jml_penghuni') ?>">Jumlah Penghuni</a></li>
            <li><a href="<?= base_url('Admin_smanar/ekskul') ?>">Ekstrakulikuler</a></li>
            <li><a href="<?= base_url('Admin_smanar/gallery') ?>">Gallery</a></li>
            <li><a href="<?= base_url('Admin_smanar/alumni') ?>">Testimoni Alumni</a></li>
            <li><a href="<?= base_url('Admin_smanar/hub_kam') ?>">Hubungi Kami</a></li>
          </ul>
        </li>
        <li>
          <a href="<?= base_url('Admin_smanar/blog') ?>" class="waves-effect"><i class="mdi mdi-file-document"></i><span> Blog </span></a>
          <a href="<?= base_url('Admin_smanar/Feedback') ?>" class="waves-effect"><i class="mdi mdi-message"></i><span> Feedback </span></a>
        </li>


        <li class="menu-title">PPDB</li>

        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-school"></i> <span> PPDB </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
          <ul class="list-unstyled">
            <li><a href="<?= base_url('Admin_smanar/ppdb/pendaftaran') ?>">Pendaftaran</a></li>
            <li><a href="<?= base_url('Admin_smanar/ppdb/pengumuman') ?>">Pengumuman</a></li>
            <li><a href="<?= base_url('Admin_smanar/ppdb/data_siswa') ?>">Data Siswa</a></li>
          </ul>
        </li>

        <!-- <li> -->
        <!-- <a href="<?= base_url('Admin_smanar/Form') ?>" class="waves-effect"><i class="mdi mdi-file-document"></i><span> Setting Form </span></a> -->
        <!-- </li> -->

      </ul>
    </div>
    <div class="clearfix"></div>
  </div> <!-- end sidebarinner -->
</div>