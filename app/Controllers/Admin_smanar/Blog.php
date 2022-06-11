<?php

namespace App\Controllers\Admin_smanar;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class Blog extends BaseController
{
  public function __construct()
  {
    $this->BlogModel = new BlogModel();
  }

  public function index()
  {
    $data = [
      'title' => 'SMANAR - Blog'
    ];
    return view('Admin/v_blog', $data);
  }

  public function get_blog()
  {
    $data = [
      'data_blog' => $this->BlogModel->get_data_blog_admin()
    ];

    $output = view('Admin/blog/data_blog', $data);
    echo json_encode($output);
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'SMANAR - Detail Blog',
      'detail_blog' => $this->BlogModel->where(['slug_blog' => $slug])->first()
    ];

    return view('Admin/blog/detail', $data);
  }


  public function add_blog()
  {
    $data = [
      'title' => 'SMANAR - Tambah Blog'
    ];
    return view('Admin/v_tambah_blog', $data);
  }


  public function delete_blog($id)
  {
    // $id_blog = $this->request->getVar($id);
    // $file_foto = $this->BlogModel->find($id_blog);
    // $nama_foto = $file_foto["tumbhnail_blog"];
    // $nama_foto = $this->request->getVar('thumbnail_blog');
    // unlink("Front/assets/img/blog/$nama_foto");


    $this->BlogModel->delete($id);
    return redirect()->to(base_url('Admin_smanar/Blog'));
  }

  // Summernote
  public function upload_image()
  {
    if ($this->request->getFile('file')) {
      $dataFile = $this->request->getFile('file');
      $namaFile = $dataFile->getRandomName();
      $dataFile->move('Front/assets/img/blog/image_content', $namaFile);
      echo base_url("Front/assets/img/blog/image_content/$namaFile");
    }
  }

  public function delete_image()
  {
    $src = $this->request->getVar('src');
    if ($src) {
      $namaFile = str_replace(base_url() . "/", "", $src);
      if (unlink($namaFile)) {
        echo "Image berhasil di hapus";
      }
    }
  }

  public function save_blog()
  {
    if ($this->request->isAJAX()) {


      // $validation = \Config\Services::validation();

      // $valid = $this->validate([
      //   'thumbnail_blog' => [
      //     'rules' => 'uploaded[tumbhnail_blog]|max_size[1024]|mime_in[image/jpg,image/png,image/jpeg]',
      //     'errors' => [
      //       'uploaded' => 'Wajib upload gambar',
      //       'max_size' => 'Ukuran file tidak boleh lebih 1 Mb',
      //       'mime_in' => 'Pastikan yang di upload gambar'
      //     ]
      //   ],
      //   'judul_blog' => [
      //     'rules' => 'required',
      //     'errors' => [
      //       'required' => 'Masukkan Judul Blog'
      //     ]
      //   ],
      //   'content_blog' => [
      //     'rules' => 'required',
      //     'errors' => [
      //       'required' => 'Wajib isi content'
      //     ]
      //   ]
      // ]);

      // if (!$valid) {
      //   $msg = [
      //     'error' => [
      //       'thumbnail_blog' => $validation->getError('thumbnail_blog'),
      //       'judul_blog' => $validation->getError('judul_blog'),
      //       'content_blog' => $validation->getError('content_blog'),
      //     ]
      //   ];
      // } else {

      $fileFoto = $_POST['image'];
      $judul = $_POST['judul'];
      $kategori = $_POST['kategori'];
      $content = $_POST['content'];

      $image_array_1 = explode(';', $fileFoto);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64 = base64_decode($image_array_2[1]);
      $namaFoto = time() . '.png';
      file_put_contents('Front/assets/img/blog/' . $namaFoto, $base64);



      $slug = url_title($judul, '-', true);

      $simpan_content = [
        'thumbnail_blog' => $namaFoto,
        'slug_blog' => $slug,
        'judul_blog' => $judul,
        'kategori_blog' => $kategori,
        'content_blog' => $content,
      ];

      $msg = $this->BlogModel->insert($simpan_content);
      $msg = [
        'success' => 'Blog Berhasil Di Upload'
      ];
      // }
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
}
