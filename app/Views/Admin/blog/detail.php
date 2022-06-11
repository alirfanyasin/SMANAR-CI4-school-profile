<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php
$db = \Config\Database::connect();

$penulis = $db->table('tbl_admin')->get()->getRowArray();


?>
<div class="container-fluid">

  <div class="card mb-5 mt-3">
    <div class="btn-back">

      <a href="<?= base_url('Admin_smanar/blog') ?>" class="btn-arrow"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <a href="<?= base_url('Admin_smanar/Blog/delete_blog/' . $detail_blog['id_blog']) ?>" class="btn-hapus"><i class="fa fa-trash"></i></a>
    <img src="<?= base_url('Front/assets/img/blog/' . $detail_blog['thumbnail_blog'])  ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h2 class="card-title"><?= $detail_blog['judul_blog'] ?></h2>
      <ul class="keterangan">
        <li class="d-flex align-items-center mr-5"><i class="fa-regular fa-user mr-1">&nbsp;</i><?= $penulis['nama_admin'] ?></li>
        <li class="d-flex align-items-center mr-5"><i class="fa-regular fa-clock mr-1"></i>&nbsp;<?= $detail_blog['created_at'] ?></li>
        <li class="d-flex align-items-center mr-5"><i class="fa-solid fa-list"></i>&nbsp;<?= $detail_blog['kategori_blog'] ?></li>
      </ul>
      <p class="card-text"><?= $detail_blog['content_blog'] ?></p>
    </div>
  </div>

</div>
<style>
  .btn-back {
    width: 40px;
    height: 40px;
    border-radius: 100%;
    background-color: #3fa400;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    margin-top: 3%;
    margin-left: 3%;
    box-shadow: 0px 0px 20px black;
  }

  .btn-hapus {
    width: 40px;
    height: 40px;
    border-radius: 100%;
    background-color: #d9534f;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    margin-top: 3%;
    margin-left: 8%;
    box-shadow: 0px 0px 20px black;
  }

  .btn-back a {
    color: white;
    font-size: 18pt;
  }

  .btn-hapus {
    color: white;
  }

  .btn-back:hover,
  .btn-back:hover a {
    background-color: white;
    color: #3fa400;

  }

  .btn-hapus:hover,
  .btn-hapus:hover a {
    background-color: white;
    color: #3fa400;

  }

  ul.keterangan {
    display: flex;
    margin-left: -35px;
    justify-content: left;
  }

  /* .keterangan li */

  ul.keterangan li i {
    margin-right: 10px;
  }
</style>
<?= $this->endSection() ?>