<?php

namespace App\Controllers\Admin_smanar;

use App\Controllers\BaseController;
use App\Models\JumpengModel;
use App\Models\KepsekModel;
use App\Models\WakasekModel;
use App\Models\EkskulModel;
use App\Models\AlumniModel;
use App\Models\HubkamModel;
use App\Models\GalleryModel;
use Countable;

class Tampilan extends BaseController
{
  public function __construct()
  {

    $kepsek = $this->KepsekModel = new KepsekModel();
    $wakasek = $this->WakasekModel = new WakasekModel();
    $jumpeng = $this->JumpengModel = new JumpengModel();
    $ekskul = $this->EkskulModel = new EkskulModel();
    $alumni = $this->AlumniModel = new AlumniModel();
    $hubkam = $this->HubkamModel =  new HubkamModel();
    $gallery = $this->GalleryModel = new GalleryModel();
    $data_model = [$kepsek, $wakasek, $jumpeng, $ekskul, $alumni, $hubkam, $gallery];

    return $data_model;
  }

  // =======================================================
  //                DATA KEPSEK
  // =======================================================
  public function kepala_sekolah()
  {
    $data = [
      'title' => 'SMANAR - Kepala Sekolah',

    ];
    return view('Admin/v_kepala_sekolah', $data);
  }

  public function data_kepsek()
  {
    if ($this->request->isAJAX()) {

      $data = [
        'kepsek' => $this->KepsekModel->findAll()
      ];

      $output = view('Admin/data/data_kepsek', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function update_kepsek()
  {
    if ($this->request->isAJAX()) {

      $foto_kepsek = $_POST['foto_kepsek'];
      $nama_kepsek = $_POST['nama_kepsek'];
      $alamat_kepsek = $_POST['alamat_kepsek'];
      $nip_kepsek = $_POST['nip_kepsek'];
      $email_kepsek = $_POST['email_kepsek'];
      $sambutan = $_POST['sambutan'];


      $image_array_1 = explode(';', $foto_kepsek);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64_image = base64_decode($image_array_2[1]);
      $namaImage = time() . '.png';
      file_put_contents('Front/assets/img/team/kepsek/' . $namaImage, $base64_image);

      $fotoLama = $this->KepsekModel->where(['id_kepsek' => 1])->first();

      $update_data = [
        'foto_kepsek' => $namaImage,
        'nama_kepsek' => $nama_kepsek,
        'alamat_kepsek' => $alamat_kepsek,
        'nip_kepsek' => $nip_kepsek,
        'email_kepsek' => $email_kepsek,
        'sambutan_kepsek' => $sambutan,
      ];
      $msg = $this->KepsekModel->update(1, $update_data);

      unlink('Front/assets/img/team/kepsek/' . $fotoLama['foto_kepsek']);
      $msg = [
        'success' => 'Data berhasil di update'
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }



  // =======================================================
  //                DATA WAKASEK
  // =======================================================

  public function wakasek()
  {
    $data = [
      'title' => 'SMANAR - Wakil Kepala Sekolah'
    ];
    return view('Admin/v_wakasek', $data);
  }


  public function data_wakasek()
  {
    if ($this->request->isAJAX()) {

      $data = [
        'wakasek' => $this->WakasekModel->findAll()
      ];
      $output = view('Admin/data/data-wakasek', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function tambah_data_wakasek()
  {

    if ($this->request->isAJAX()) {
      $msg = [
        'data' => view('Admin/data/modal_tambah')
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function simpan_data()
  {
    if ($this->request->isAJAX()) {

      $foto_wakasek = $_POST['foto_wakasek'];
      $nama_wakasek = $_POST['nama_wakasek'];
      $jabatan_wakasek = $_POST['jabatan_wakasek'];
      $wa_wakasek = $_POST['wa_wakasek'];
      $fb_wakasek = $_POST['fb_wakasek'];
      $ig_wakasek = $_POST['ig_wakasek'];



      $image_array_1 = explode(';', $foto_wakasek);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64_image = base64_decode($image_array_2[1]);
      $namaImage = time() . '.png';
      file_put_contents('Front/assets/img/team/wakasek/' . $namaImage, $base64_image);



      // Ambil nama 
      $simpan_data = [
        'foto_wakasek' => $namaImage,
        'nama_wakasek' => $nama_wakasek,
        'jabatan_wakasek' => $jabatan_wakasek,
        'wa_wakasek' => $wa_wakasek,
        'fb_wakasek' => $fb_wakasek,
        'ig_wakasek' => $ig_wakasek,
      ];

      $wakasek = $this->WakasekModel->insert($simpan_data);
      $wakasek = [
        'success' => 'Data berhasil di tambahkan'
      ];
      echo json_encode($wakasek);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  // Mutiple Tambah Data Wakasek
  public function form_multiple_tambah_wakasek()
  {
    if ($this->request->isAJAX()) {
      $msg = [
        'multiple_tambah' => view('Admin/data/multiple_tambah_wakasek')
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }



  // Multiple Simpan data wakasek
  public function multiple_tambah_wakasek()
  {
    if ($this->request->isAJAX()) {


      $validation = \Config\Services::validation();

      $valid = $this->validate([
        'foto_wakasek' => [
          'rules' => 'uploaded[foto_wakasek]|max_size[foto_wakasek,1024]|mime_in[foto_wakasek,image/png,image/jpg,image/jpeg]',
          'errors' => [
            'uploaded' => 'Wajib upload foto',
            'max_size' => 'Ukuran file tdk boleh lebih 1 Mb',
            'mime_in' => 'Upload file jpg/png/jpeg'
          ]
        ]
      ]);
      if (!$valid) {
        $msg = [
          'error' => [
            'foto_wakasek' => $validation->getError('foto_wakasek')
          ]
        ];
      } else {

        // Get File
        $file_foto = $this->request->getFile('foto_wakasek');
        // $file_foto->move('Front/assets/img/team/wakasek');
        $file_foto->move('Front/assets/img/team/wakasek');

        $nama_foto = $file_foto->getName();



        $foto_wakasek = $nama_foto;
        $nama_wakasek = $this->request->getVar('nama_wakasek');
        $jabatan_wakasek = $this->request->getVar('jabatan_wakasek');


        $jmldata = count($nama_wakasek);

        for ($i = 0; $i < $jmldata; $i++) {
          $this->WakasekModel->insert([
            'foto_wakasek' => $foto_wakasek[$i],
            'nama_wakasek' => $nama_wakasek[$i],
            'jabatan_wakasek' => $jabatan_wakasek[$i]
          ]);
        }
      }

      $msg = [
        'success' => 'Data berhasil di tambahkan'
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  // mutiple Delete
  public function multiple_hapus_wakasek()
  {
    if ($this->request->isAJAX()) {

      $id_wakasek = $this->request->getVar('id_wakasek');
      $jmldata = count($id_wakasek);

      for ($i = 0; $i < $jmldata; $i++) {
        $this->WakasekModel->delete($id_wakasek[$i]);
      }

      $msg = [
        $jmldata . ' Data berhasil di hapus'
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }





  public function modal_edit()
  {
    if ($this->request->isAJAX()) {

      $id_wakasek = $this->request->getVar('id_wakasek');
      $row = $this->WakasekModel->find($id_wakasek);
      $data = [
        'id_wakasek' => $row['id_wakasek'],
        'foto_wakasek' => $row['foto_wakasek'],
        'nama_wakasek' => $row['nama_wakasek'],
        'jabatan_wakasek' => $row['jabatan_wakasek'],
        'wa_wakasek' => $row['wa_wakasek'],
        'fb_wakasek' => $row['fb_wakasek'],
        'ig_wakasek' => $row['ig_wakasek'],
      ];

      $msg = [
        'success' => view('Admin/data/modal_edit', $data)
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }




  public function update_data()
  {
    if ($this->request->isAJAX()) {

      $id_wakasek = $_POST['id_wakasek'];


      $foto_wakasek = $_POST['foto_wakasek'];
      $nama_wakasek = $_POST['nama_wakasek'];
      $jabatan_wakasek = $_POST['jabatan_wakasek'];
      $wa_wakasek = $_POST['wa_wakasek'];
      $fb_wakasek = $_POST['fb_wakasek'];
      $ig_wakasek = $_POST['ig_wakasek'];



      $image_array_1 = explode(';', $foto_wakasek);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64_image = base64_decode($image_array_2[1]);
      $namaImage = time() . '.png';
      file_put_contents('Front/assets/img/team/wakasek/' . $namaImage, $base64_image);

      $fotoLama = $this->WakasekModel->where(['id_wakasek' => $id_wakasek])->first();

      // Ambil nama 
      $update_data = [
        'foto_wakasek' => $namaImage,
        'nama_wakasek' => $nama_wakasek,
        'jabatan_wakasek' => $jabatan_wakasek,
        'wa_wakasek' => $wa_wakasek,
        'fb_wakasek' => $fb_wakasek,
        'ig_wakasek' => $ig_wakasek,
      ];

      $wakasek = $this->WakasekModel->update($id_wakasek, $update_data);
      unlink('Front/assets/img/team/wakasek/' . $fotoLama['foto_wakasek']);
      $wakasek = [
        'success' => 'Data berhasil di update'
      ];

      echo json_encode($wakasek);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }







  public function hapus()
  {
    if ($this->request->isAJAX()) {

      $id_wakasek = $this->request->getVar('id_wakasek');
      $file_foto = $this->WakasekModel->find($id_wakasek);
      $nama_foto = $file_foto['foto_wakasek'];
      unlink('Front/assets/img/team/wakasek/' . $nama_foto);

      $wakasek = $this->WakasekModel->delete($id_wakasek);
      $wakasek = [
        'success' => 'Data berhasil di hapus'
      ];

      echo json_encode($wakasek);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }



  // =======================================================
  //                DATA JUMLAH PENGHUNI
  // =======================================================


  public function jml_penghuni()
  {
    $data = [
      'title' => 'SMANAR - Jumlah Penghuni',
    ];

    return view('Admin/v_jml_penghuni', $data);
  }

  public function data_penghuni()
  {
    if ($this->request->isAJAX()) {

      $data = [
        'jml_data' => $this->JumpengModel->findAll()
      ];
      $output = view('Admin/data/data_jumpeng', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function modal_edit_jumpeng()
  {
    if ($this->request->isAJAX()) {

      $id_jumpeng = $this->request->getVar('id_jumpeng');
      $row = $this->JumpengModel->find($id_jumpeng);
      $data = [
        'id_jumpeng' => $row['id_jumpeng'],
        'penghuni' => $row['penghuni'],
        'jumlah' => $row['jumlah'],

      ];

      $msg = [
        'success' => view('Admin/data/modal_edit_jumpeng', $data)
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update_data_jumpeng()
  {
    if ($this->request->isAJAX()) {
      $update_data = [
        'penghuni' => $this->request->getVar('penghuni'),
        'jumlah' => $this->request->getVar('jumlah'),
      ];

      $id_jumpeng = $this->request->getVar('id_jumpeng');
      $send_jumpeng = $this->JumpengModel->update($id_jumpeng, $update_data);
      $send_jumpeng = [
        'success' => 'Data berhasil di update'
      ];

      echo json_encode($send_jumpeng);
    }
  }




  // =======================================================
  //                DATA EKSTRAKULIKULER
  // =======================================================
  public function ekskul()
  {
    $data = [
      'title' => 'SMANAR - Ekstrakulikuler'
    ];
    return view('Admin/v_ekskul', $data);
  }


  public function data_ekskul()
  {
    if ($this->request->isAJAX()) {

      $data = [
        'data_ekskul' => $this->EkskulModel->findAll()
      ];

      $output = view('Admin/data/data_ekskul', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function modal_tambah_data_ekskul()
  {
    if ($this->request->isAJAX()) {
      $msg = [
        'open_modal' => view('Admin/data/modal_tambah_ekskul')
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function simpan_data_ekskul()
  {

    if ($this->request->isAJAX()) {


      $foto_ekskul = $_POST['foto_ekskul'];
      $nama_ekskul = $_POST['nama_ekskul'];
      $pembina_ekskul = $_POST['pembina_ekskul'];
      $pengikut_ekskul = $_POST['pengikut_ekskul'];


      $image_array_1 = explode(';', $foto_ekskul);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64_image = base64_decode($image_array_2[1]);
      $namaImage = time() . '.png';
      file_put_contents('Front/assets/img/team/ekskul/' . $namaImage, $base64_image);



      $simpan_data = [
        'foto_ekskul' => $namaImage,
        'nama_ekskul' => $nama_ekskul,
        'pembina_ekskul' => $pembina_ekskul,
        'pengikut_ekskul' => $pengikut_ekskul,
      ];

      $msg = $this->EkskulModel->insert($simpan_data);
      $msg = [
        'success' => 'Data berhasil di tambahkan'
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }






  // Multiple Tambah Data Ekskul View
  public function form_multiple_tambah_ekskul()
  {
    if ($this->request->isAJAX()) {
      $msg = [
        'multiple_tambah_ekskul' => view('Admin/data/multiple_tambah_ekskul')
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  // Simpan Multiple tambah ekskul
  public function multiple_tambah_ekskul()
  {
    if ($this->request->isAJAX()) {
      $foto_ekskul = $this->request->getVar('foto_ekskul');
      $nama_ekskul = $this->request->getVar('nama_ekskul');
      $pembina_ekskul = $this->request->getVar('pembina_ekskul');
      $pengikut_ekskul = $this->request->getVar('pengikut_ekskul');

      $jmlData = count($nama_ekskul);

      for ($i = 0; $i < $jmlData; $i++) {
        $this->EkskulModel->insert([
          'foto_ekskul' => $foto_ekskul[$i],
          'nama_ekskul' => $nama_ekskul[$i],
          'pembina_ekskul' => $pembina_ekskul[$i],
          'pengikut_ekskul' => $pengikut_ekskul[$i]
        ]);
      }


      $msg = [
        'success' => 'Data berhasil di tambahkan'
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }





  // Multiple Delete Data Ekskul
  public function multiple_hapus_ekskul()
  {
    if ($this->request->isAJAX()) {
      $id_ekskul = $this->request->getVar('id_ekskul');
      $jmlData = count($id_ekskul);
      for ($i = 0; $i < $jmlData; $i++) {
        $this->EkskulModel->delete($id_ekskul[$i]);
      };

      $msg = [
        $jmlData . ' Berhasil di hapus'
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }







  public function modal_edit_ekskul()
  {
    if ($this->request->isAJAX()) {
      $id_ekskul = $this->request->getVar('id_ekskul');


      $row = $this->EkskulModel->find($id_ekskul);
      $data = [
        'id_ekskul' => $row['id_ekskul'],
        'foto_ekskul' => $row['foto_ekskul'],
        'nama_ekskul' => $row['nama_ekskul'],
        'pembina_ekskul' => $row['pembina_ekskul'],
        'pengikut_ekskul' => $row['pengikut_ekskul'],
      ];

      $msg = [
        'success' => view('Admin/data/modal_edit_ekskul', $data)
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function update_data_ekskul()
  {
    if ($this->request->isAJAX()) {

      $id_ekskul = $_POST['id_ekskul'];


      $foto_ekskul = $_POST['foto_ekskul'];
      $nama_ekskul = $_POST['nama_ekskul'];
      $pembina_ekskul = $_POST['pembina_ekskul'];
      $pengikut_ekskul = $_POST['pengikut_ekskul'];



      $image_array_1 = explode(';', $foto_ekskul);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64_image = base64_decode($image_array_2[1]);
      $namaImage = time() . '.png';
      file_put_contents('Front/assets/img/team/ekskul/' . $namaImage, $base64_image);

      $fotoLama = $this->EkskulModel->where(['id_ekskul' => $id_ekskul])->first();


      $update_data = [
        'foto_ekskul' => $namaImage,
        'nama_ekskul' => $nama_ekskul,
        'pembina_ekskul' => $pembina_ekskul,
        'pengikut_ekskul' => $pengikut_ekskul,
      ];


      $send_ekskul = $this->EkskulModel->update($id_ekskul, $update_data);
      unlink('Front/assets/img/team/ekskul/' . $fotoLama['foto_ekskul']);
      $send_ekskul = [
        'success' => 'Data berhasil di update'
      ];
      echo json_encode($send_ekskul);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }




  public function hapus_data_ekskul()
  {
    if ($this->request->isAJAX()) {
      $id_ekskul = $this->request->getVar('id_ekskul');
      $file_foto_lama = $this->EkskulModel->find($id_ekskul);
      $nama_file = $file_foto_lama['foto_ekskul'];
      unlink('Front/assets/img/team/ekskul/' . $nama_file);

      $wakasek = $this->EkskulModel->delete($id_ekskul);
      $wakasek = [
        'success' => 'Data berhasil di hapus'
      ];

      echo json_encode($wakasek);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  // =======================================================
  //                DATA GALERRY
  // =======================================================
  public function gallery()
  {
    $data = [
      'title' => 'SMANAR - Gallery'
    ];
    return view('Admin/v_gallery', $data);
  }


  public function get_data_gallery()
  {
    if ($this->request->isAJAX()) {
      $data =  [
        'data_gallery' => $this->GalleryModel->findAll()
      ];

      $output = view('Admin/data/data_gallery', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function form_modal_tambah_gallery()
  {
    if ($this->request->isAJAX()) {
      $data = [
        'modal_tambah_gallery' => view('Admin/data/modal_tambah_gallery')
      ];

      echo json_encode($data);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function simpan_data_gallery()
  {
    if ($this->request->isAJAX()) {


      $thumb_gallery = $_POST['thumb_gallery'];
      $judul_gallery = $_POST['judul_gallery'];
      $kategori_gallery = $_POST['kategori_gallery'];


      $image_array_1 = explode(';', $thumb_gallery);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64_image = base64_decode($image_array_2[1]);
      $namaImage = time() . '.png';
      file_put_contents('Front/assets/img/portfolio/' . $namaImage, $base64_image);

      $data = [
        'judul_gallery' => $judul_gallery,
        'kategori_gallery' => $kategori_gallery,
        'thumb_gallery' => $namaImage,
      ];

      $msg = $this->GalleryModel->insert($data);
      $msg = [
        'success' => 'Data berhasil di tambahkan'
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }



  public function hapus_data_gallery()
  {
    if ($this->request->isAJAX()) {
      $id_gallery = $this->request->getVar('id_gallery');

      $file_foto_lama = $this->GalleryModel->find($id_gallery);
      $nama_foto_lama = $file_foto_lama['thumb_gallery'];
      unlink('Front/assets/img/portfolio/' . $nama_foto_lama);

      $gallery = $this->GalleryModel->delete($id_gallery);
      $gallery = [
        'success' => 'Data berhasi di hapus'
      ];

      echo json_encode($gallery);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
  // =======================================================
  //                DATA ALUMNI
  // =======================================================
  public function alumni()
  {
    $data = [
      'title' => 'SMANAR - Alumni'
    ];
    return view('Admin/v_alumni', $data);
  }


  public function data_alumni()
  {
    if ($this->request->isAJAX()) {
      $data = [
        'alumni' => $this->AlumniModel->findAll()
      ];
      $output = view('Admin/data/data_alumni', $data);

      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function modal_tambah_alumni()
  {
    if ($this->request->isAJAX()) {
      $msg = [
        'modal' => view('Admin/data/modal_tambah_alumni')
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function simpan_data_alumni()
  {
    if ($this->request->isAJAX()) {


      $fileFoto = $_POST['image'];
      $nama_alumni = $_POST['nama_alumni'];
      $jabatan_alumni = $_POST['jabatan_alumni'];
      $testimoni_alumni = $_POST['testimoni_alumni'];

      $image_array_1 = explode(';', $fileFoto);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64 = base64_decode($image_array_2[1]);
      $namaFoto = time() . '.png';
      file_put_contents('Front/assets/img/team/alumni/' . $namaFoto, $base64);


      $data = [
        'nama_alumni' => $nama_alumni,
        'jabatan_alumni' => $jabatan_alumni,
        'testimoni_alumni' => $testimoni_alumni,
        'foto_alumni' => $namaFoto,
      ];

      $msg = $this->AlumniModel->insert($data);
      $msg = [
        'success' => 'Data berhasil di tambahkan'
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }




  // View Data Multiple tambah Alumni
  public function form_multiple_tambah_alumni()
  {
    if ($this->request->isAJAX()) {
      $msg = [
        'success' => view('Admin/data/multiple_tambah_alumni')
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }



  // Add to database
  public function multiple_tambah_alumni()
  {
    if ($this->request->isAJAX()) {
      $foto_alumni = $this->request->getVar('foto_alumni');
      $nama_alumni = $this->request->getVar('nama_alumni');
      $jabatan_alumni = $this->request->getVar('jabatan_alumni');
      $testimoni_alumni = $this->request->getVar('testimoni_alumni');

      $jmlData = count($nama_alumni);

      for ($i = 0; $i < $jmlData; $i++) {
        $this->AlumniModel->insert([
          'foto_alumni' => $foto_alumni[$i],
          'nama_alumni' => $nama_alumni[$i],
          'jabatan_alumni' => $jabatan_alumni[$i],
          'testimoni_alumni' => $testimoni_alumni[$i],
        ]);
      };

      $msg = [
        'success' => 'Data berhasil di tambahkan'
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  // Multiple delete
  public function multiple_hapus_alumni()
  {
    if ($this->request->isAJAX()) {
      $id_alumni = $this->request->getVar('id_alumni');

      $jmlData = count($id_alumni);

      for ($i = 0; $i < $jmlData; $i++) {
        $this->AlumniModel->delete($id_alumni[$i]);
      };
      $msg = [$jmlData . ' Data berhasil di hapus'];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function modal_edit_alumni()
  {
    if ($this->request->isAJAX()) {
      $id_alumni = $this->request->getVar('id_alumni');
      $row = $this->AlumniModel->find($id_alumni);
      $data_alumni = [
        'id_alumni' => $row['id_alumni'],
        'foto_alumni' => $row['foto_alumni'],
        'nama_alumni' => $row['nama_alumni'],
        'jabatan_alumni' => $row['jabatan_alumni'],
        'testimoni_alumni' => $row['testimoni_alumni'],
      ];
      $msg = [
        'success' => view('Admin/data/modal_edit_alumni', $data_alumni)
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update_data_alumni()
  {
    if ($this->request->isAJAX()) {

      $id_alumni = $_POST['id_alumni'];

      $fileFoto = $_POST['image'];
      $nama_alumni = $_POST['nama_alumni'];
      $jabatan_alumni = $_POST['jabatan_alumni'];
      $testimoni_alumni = $_POST['testimoni_alumni'];

      $image_array_1 = explode(';', $fileFoto);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64 = base64_decode($image_array_2[1]);
      $namaFoto = time() . '.png';
      file_put_contents('Front/assets/img/team/alumni/' . $namaFoto, $base64);

      $fotoLama = $this->AlumniModel->where(['id_alumni' => $id_alumni])->first();


      $update_data = [
        'foto_alumni' => $namaFoto,
        'nama_alumni' => $nama_alumni,
        'jabatan_alumni' => $jabatan_alumni,
        'testimoni_alumni' => $testimoni_alumni

      ];

      $send_alumni = $this->AlumniModel->update($id_alumni, $update_data);

      unlink('Front/assets/img/team/alumni/' . $fotoLama['foto_alumni']);

      $send_alumni = [
        'success' => 'Data berhasil di update'
      ];
      echo json_encode($send_alumni);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function hapus_data_alumni()
  {
    if ($this->request->isAJAX()) {
      $id_alumni = $this->request->getVar('id_alumni');

      $file_foto_lama = $this->AlumniModel->find($id_alumni);
      $nama_foto_lama = $file_foto_lama['foto_alumni'];
      unlink('Front/assets/img/team/alumni/' . $nama_foto_lama);

      $alumni = $this->AlumniModel->delete($id_alumni);
      $alumni = [
        'success' => 'Data berhasi di hapus'
      ];

      echo json_encode($alumni);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
  // =======================================================
  //                DATA HUBUNGI KAMI
  // =======================================================
  public function hub_kam()
  {
    $data = [
      'title' => 'SMANAR - Hubungi Kami',

    ];
    return view('Admin/v_hubungi_kami', $data);
  }

  public function getDataHubkam()
  {
    if ($this->request->isAJAX()) {
      $data = [
        'hubkam' => $this->HubkamModel->findAll()
      ];
      $output = view('Admin/data/data_hubkam', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function update_hubkam()
  {
    if ($this->request->isAJAX()) {
      $id_hubkam = $this->request->getVar('id_hubkam');

      $validation = \Config\Services::validation();

      $valid = $this->validate([
        'email_hubkam' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Email wajib di isi',
          ]
        ],
        'kontak1_hubkam' => [
          'rules' => 'required|min_length[12]|max_length[12]',
          'errors' => [
            'required' => 'Kontak 1 wajib di isi',
            'min_length' => 'Minimal 12 karakter',
            'max_length' => 'Maksimal 12 karakter',
          ]
        ],
        'kontak2_hubkam' => [
          'rules' => 'required|min_length[12]|max_length[12]',
          'errors' => [
            'required' => 'Kontak 2 wajib di isi',
            'min_length' => 'Minimal 12 karakter',
            'max_length' => 'Maksimal 12 karakter',
          ]
        ],
        'alamat_hubkam' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Alamat wajib di isi'
          ]
        ],
        'dari_jam_hubkam' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'sampai_jam_hubkam' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'wa_hubkam' => [
          'rules' => 'required|min_length[12]|max_length[12]',
          'errors' => [
            'required' => 'Nomor WA wajib di isi',
            'min_length' => 'Minimal 12 karakter',
            'max_length' => 'Maksimal 12 karakter',
          ]
        ],

      ]);


      if (!$valid) {
        $msg = [
          'error' => [
            'email_hubkam' => $validation->getError('email_hubkam'),
            'kontak1_hubkam' => $validation->getError('kontak1_hubkam'),
            'kontak2_hubkam' => $validation->getError('kontak2_hubkam'),
            'alamat_hubkam' => $validation->getError('alamat_hubkam'),
            'dari_jam_hubkam' => $validation->getError('dari_jam_hubkam'),
            'sampai_jam_hubkam' => $validation->getError('sampai_jam_hubkam'),
            'wa_hubkam' => $validation->getError('wa_hubkam'),
          ]
        ];
      } else {

        $data = [
          'email_hubkam' => $this->request->getVar('email_hubkam'),
          'kontak1_hubkam' => $this->request->getVar('kontak1_hubkam'),
          'kontak2_hubkam' => $this->request->getVar('kontak2_hubkam'),
          'alamat_hubkam' => $this->request->getVar('alamat_hubkam'),
          'dari_jam_hubkam' => $this->request->getVar('dari_jam_hubkam'),
          'sampai_jam_hubkam' => $this->request->getVar('sampai_jam_hubkam'),
          'wa_hubkam' => $this->request->getVar('wa_hubkam'),
          'ig_hubkam' => $this->request->getVar('ig_hubkam'),
          'fb_hubkam' => $this->request->getVar('fb_hubkam'),
          'yt_hubkam' => $this->request->getVar('yt_hubkam'),
          'tw_hubkam' => $this->request->getVar('tw_hubkam'),
        ];

        $this->HubkamModel->update($id_hubkam, $data);

        $msg = [
          'success' => 'Data berhasil di update'
        ];
      }

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }


    // return redirect()->to('Admin_smanar/Tampilan/hub_kam');
  }
}
